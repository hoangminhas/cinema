<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showFormLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return 'nice';
        } else {
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        $user = $request->except('_token');
        $user['password'] = Hash::make($user['password']);
        User::create($user);
        return redirect()->route('login');
    }
}
