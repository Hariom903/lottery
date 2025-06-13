<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
            Log::info('New ticket purchase', $request->all());

         $quantity = $request->quantity;

        $lottery = Lottery::find($request->lottery_id);
        $lottery->sold_tickets += $quantity;
        $lottery->save();

        // Save ticket(s)
        for ($i = 0; $i < $quantity; $i++) {
            $ticket = new Ticket();
            $ticket->user_id = Auth::user()->id;
            $ticket->lottery_id = $request->lottery_id;
            $ticket->ticket_number = 'TKT-' . now()->format('YmdHis') . '-' . Str::random(4);
            $ticket->save();
        }
        Log::info('Tickets saved successfully', ['lottery_id' => $request->lottery_id, 'quantity' => $quantity]);
        return redirect()->route('mytickets')->with('success', 'Tickets purchased successfully!');

        }


}
