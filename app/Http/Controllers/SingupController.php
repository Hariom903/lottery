<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SingupController extends Controller
{
    //

    public function signupform(){
          return view('signup');
    }
    public function signup(Request $request){
     // Validate the form data
      $request->validate([
         'First_name' =>'required|max:255',
         'Last_name' =>'nullable|max:255',
         'email' =>'required|email|unique:users',
         'password' => 'required|min:8|confirmed',
     ]);
      $name = $request->First_name.' '.$request->Last_name;
     // Create a new user
     $user = new User();
     $user->name = $name;
     $user->email = $request->email;
     $user->password =  bcrypt($request->password);
     $user->save();

     // Redirect to the login page
     return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function loginForm(){
          return view('login');
    }
    public function login(Request $request){
        // Validate the form data
        $request->validate([
           'email' =>'required|email',
           'password' => 'required|min:8',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, redirect to the dashboard
            return redirect()->route('home');
        } else {
            // If authentication fails, redirect back to the login page with an error message
             return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login')->with('success', 'Logout successful!');
    }



}
