<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    //
    public function store(Request $request){

          $request->validate([
         "emailsub" => "required|email|unique:subscribers,email",
          ],[
            "emailsub.unique" =>" you hove a allready subscribe ",
          ]);

          Subscriber::create([
            "email" => $request->emailsub,
          ]);

          Mail::to($request->emailsub)->send( new SubscribeMail($request->emailsub));

          return back()->with('Subscribed',"Subscribed Now");



    }
}
