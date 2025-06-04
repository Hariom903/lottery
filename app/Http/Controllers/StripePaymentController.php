<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe;

use Illuminate\Http\RedirectResponse;

class StripePaymentController extends Controller
{
    //
     public function stripePost(Request $request): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         $quantity = $request->quantity;
        $price = $request->price; // assuming in dollars
        $amount = $quantity * $price * 100; // convert to cents


        // dd($request->all(),$price, $quantity , $amount, $number);
        Stripe\Charge::create ([
                "amount" => $amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => " Test payment 123"
        ]);

        // save ticakt  details in your database
        while ($quantity > 0) {
        $number = 'TKT-' . now()->format('YmdHis') . '-' . Str::random(4);
         $user_id = $request->user_id;
         $ticket = new Ticket();
         $ticket->user_id = $user_id;
         $ticket->lottery_id = $request->lottery_id; // assuming lottery_id in your database
         $ticket->ticket_number	 = $number;
         $ticket->save();
         $quantity--;
        }
        // redirect to success page
        // return redirect()->route('success');



        return back()
                ->with('success', 'Payment successful!');
    }

}
