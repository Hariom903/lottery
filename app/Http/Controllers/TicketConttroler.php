<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\admin\WinnerPrice;
use Illuminate\Http\Request;

class TicketConttroler extends Controller
{
    public function index($tid)
        {

     $ticket = Lottery::with('prizes')->where('tid', $tid)->first();

    //  $winning_price = WinnerPrice::where('lottery_id', $ticket_id)->get();

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
