<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $this->userRepository->createUser($data);
        return $this->sendRespone($data, "Create success");
    }

    public function login($request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return true;
        } else {
            return false;
        }
    }

}
