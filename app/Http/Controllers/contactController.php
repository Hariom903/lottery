<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function contactUs(){
        return view('contact');
    }
    public function contactSubmit(Request $request){
       $data =  $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
             'Topic'=> ['required','string','max:255'],
             "subTopic" => ['string','max:255'],
            'message' => ['required','string','max:255'],
        ]);
        //send Email to admin with the form data
        //...
        Log::info('Contact form submitted', $data);
        Mail::to('admin@example.com')->send( new ContactMessage($data) );

        return back()->with('success', 'Your message has been sent successfully!');
    }
}

