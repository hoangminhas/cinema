<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallBack()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return "login success";

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 2,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => encrypt('my-google')
                ]);

                Auth::login($newUser);

                return "success";
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
