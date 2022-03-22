<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public C $ADMIN = '1';

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showFormLogin()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if ($this->userService->login($request)) {
            return redirect()->route('user');
        }
        return redirect()->back();
    }

    public function showFormRegister()
    {
        return view('backend.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // dd($request);
        $this->userService->register($request);
        toastr()->success("Register Success");
        return redirect()->route('login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('user');
    }

    public function password()
    {
        return view('frontend.user.password');
    }

    public function changePassword(Request $request)
    {
        dd($request);
    }
}
