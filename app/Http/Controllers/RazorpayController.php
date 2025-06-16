<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\Payment;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

class RazorpayController extends Controller
{

      public function createOrder(Request $request){
     $data = $request->all();
     Log::info('Razorpay Order Request Data:', $data);

      // Validate the request data


      // Calculate total price based on quantity
     $quantity = $data['quantity'] ?? 1; // Default to 1 if not provided
      $price = $data['price'] ?? 0; // Default to 0 if not provided
      $data['price'] = $price * $quantity; // Calculate total price based on quantity

     $amount = $data['price'] * 100; // Convert to paise

      $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));

        $orderData = [
            'receipt'         => 'order_rcptid_' . uniqid(),
            'amount'          =>  $amount,  // amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1
        ];

        $razorpayOrder = $api->order->create($orderData);

        // Log the order creation for debugging
        Log::info('Razorpay Order Created:', [
            'id' => $razorpayOrder['id'],
            'amount' => $razorpayOrder['amount'],
            'currency' => $razorpayOrder['currency']
        ]);
        return response()->json([
            'id' => $razorpayOrder['id'],
            'amount' => $razorpayOrder['amount']
        ]);
      }

    public function verifyPayment(Request $request){

        //  $api  = new api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        // $data = $request->all();
        // Log::info('Razorpay Payment Verification Request Data:', $data);
        // $attributes = [
        //     'razorpay_order_id' => $request->razorpay_order_id,
        //     'razorpay_payment_id' => $request->razorpay_payment_id,
        //     'razorpay_signature' => $request->razorpay_signature
        // ];
        // $signature = $api->utility->verifyPaymentSignature($attributes);
        // if ($signature) {
        //     // Payment is verified, save the payment details


        //     return response()->json(['status' => 'success', 'message' => 'Payment verified successfully']);
        // } else {
        //     return response()->json(['status' => 'error', 'message' => 'Payment verification failed'], 400);
        // }
    }
    function store(Request $request)
    {
        $data = $request->all();
        Log::info('Razorpay Payment Store Request Data:', $data);

        // Validate the request data
        $request->validate([
            'razorpay_order_id' => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'email' => 'required|email',

            "user_id" => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'lottery_id' => 'required|exists:lotteries,id'

        ]);




         $quantity = $request->quantity;
        $lottery = Lottery::find($request->lottery_id);
        $lottery->sold_tickets += $quantity;
        $lottery->save();
        Log::info('Lottery updated successfully', ['lottery_id' => $request->lottery_id, 'sold_tickets' => $lottery->sold_tickets]);
        // Save ticket(s)
        $ar=[];
        for ($i = 0; $i < $quantity; $i++) {
            $ticket = new Ticket();
            $ticket->user_id = Auth::user()->id;
            $ticket->lottery_id = $request->lottery_id;
            $ticket->ticket_number = 'TKT-' . now()->format('YmdHis') . '-' . Str::random(4);
            $ticket->save();
            $ar[] = $ticket->id; // Collect ticket numbers

        }
        Log::info('Tickets saved successfully', ['lottery_id' => $request->lottery_id, 'quantity' => $quantity]);
        Log::channel('database')->info('Tickets purchased', [
            'user_id' => Auth::user()->id,
            'lottery_id' => $request->lottery_id,
            'quantity' => $quantity,
            'ticket_numbers' => $ticket->ticket_number
        ]);


        array_push($data, ['ticket_id' => $ar]);
        // Create a new payment record
        $payment = new Payment();
        $payment->razorpay_order_id = $data['razorpay_order_id'];
        $payment->r_payment_id = $data['razorpay_payment_id'];
        $payment->razorpay_signature = $data['razorpay_signature'];
        $payment->amount = $data['amount'];
        $payment->method = 'Razorpay'; // Assuming the method is always Razorpay
        $payment->currency = $data['currency'];
        $payment->email = $data['email'];
        $payment->phone = $data['phone'];
        // $payment->ticket_id = $data['ticket_id'];
        $payment->user_id = Auth::user()->id; // Assuming the user is authenticated
        $payment->status = $data['status'];
        $payment->json_response	 = json_encode($data);
        $payment->save();
        Log::info('Razorpay Payment Stored Successfully:', ['id' => $payment->id]);






        return response()->json(['status' => 'success', 'message' => 'Payment stored successfully']);
    }
     public function success(){
         return   redirect()->route('mytickets')->with('success', 'Payment successful! Tickets purchased successfully!');
     }


}
