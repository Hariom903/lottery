<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{

    //
    public function googleRedirect(){
         return Socialite::driver('google')->redirect();
    }
    public function googleCallback(){
         $user = Socialite::driver('google')->user();

        //  $token = $user->token;
        //  $user = Socialite::driver('google')->userFromToken($token);
        //  dd($user);

         // Store user data in your database
         if(!User::where('google_id', $user->id)->first() && $user->email== ''  ){
           $user1 =    User::create([
                 'name' => $user->name,
                 'email' => $user->email,
                 'google_id' => $user->id,
                 'password' => bcrypt('password'), // You can set your own password
             ]);
             if($user1){
                Auth::login($user1);
                 
                     return redirect()->intended();
            }



    }
    else{

            $userlogin = User::where('google_id', $user->id)
            ->orWhere('email', $user->email)
            ->first();
            $userlogin->google_id = $user->id;
            $userlogin->save();
            Auth::login($userlogin);
              return redirect()->intended('/');

         }
}

}


