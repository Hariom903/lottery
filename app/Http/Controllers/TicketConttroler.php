<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use Illuminate\Http\Request;

class TicketConttroler extends Controller
{
    public function index($tid)
        {

            $ticket = Lottery::where('tid', $tid)->first();
     if($ticket){
        return view('card', compact('ticket'));
     }
     else{
        return redirect()->route('home');

        }
    }
        public function store(Request $request)
        {
            dd($request->all());
            
        }


}
