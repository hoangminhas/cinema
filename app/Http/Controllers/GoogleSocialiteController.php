<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleCallBack()
    // {
    //     try {

    //         $user = Socialite::driver('google')->user();

    //         $finduser = User::where('social_id', $user->id)->first();

    //         if($finduser){

    //             Auth::login($finduser);

    //             return redirect()->back();

    //         }else{
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'role_id' => 2,
    //                 'social_id'=> $user->id,
    //                 'social_type'=> 'google',
    //                 'password' => encrypt('my-google')
    //             ]);

    //             Auth::login($newUser);

    //             return redirect()->route('user');
    //         }

    //     } catch (Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }

    public function redirectToGoogle($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {

        try {
            $user = Socialite::driver($provider)->user();

            $finduser = User::where('email', $user->email)->first();
            if($finduser){
                $finduser->name = $user->name;
                $finduser->social_type = $provider ;
                // $finduser->social_id = $user->id ;
                $finduser->save();
                Auth::login($finduser);

                return redirect()->route('user');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 2,
                    'social_id'=> $user->id,
                    'social_type'=> $provider,
                    'password' => encrypt('my-google')
                ]);

                Auth::login($newUser);

                return redirect()->route('user');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
