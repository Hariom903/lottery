<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\RedirectResponse;

class StripePaymentController extends Controller
{
    //


    public function stripePost(Request $request): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'lottery_id' => 'required|exists:lotteries,id',
            'user_id' => 'required|exists:users,id',
            'payment_method' => 'required|string',
        ]);

        $quantity = $request->quantity;
        $price = $request->price;
        $amount = $quantity * $price * 100; // convert to cents

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd',
            'payment_method' => $request->payment_method,
            'confirm' => true,
            'description' => 'Ticket purchase for lottery #' . $quantity,
             'automatic_payment_methods' => [
            'enabled' => true,
              'allow_redirects' => 'never', // prevents redirect-based methods
    ],
        ]);


        // Save ticket(s)
        for ($i = 0; $i < $quantity; $i++) {
            $ticket = new Ticket();
            $ticket->user_id = $request->user_id;
            $ticket->lottery_id = $request->lottery_id;
            $ticket->ticket_number = 'TKT-' . now()->format('YmdHis') . '-' . Str::random(4);
            $ticket->save();
        }

        return redirect()->route('mytickets')->with('success', 'Payment and ticket purchase successful!');
    }
}
