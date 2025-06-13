<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RazorpayController extends Controller
{
        function payment(Request $request)
    {
        $data = $request->all();
     Log::info('Razorpay Payment Request Data:', $data);
        $api = new \Razorpay\Api\Api(config('services.Razorpay.key'), config('services.Razorpay.key_secret'));
        $orderData = [
            'receipt'         => 'receipt#1',
            'amount'          => $data['price'] * 100, // Amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // Auto capture
        ];
        $order = $api->order->create($orderData);
        Log::info('Razorpay Order Data:', $order->toArray());
        Log::channel('database')->info('Razorpay Order Created:', [
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'currency' => $order['currency']
        ]);
        // Redirect to Razorpay payment page
        //save pyment in data base
         $payment  = new Payment();
        $payment->r_payment_id = $order['id'];
        $payment->method = 'razorpay';
        $payment->currency = 'INR';
        $payment->email = Auth::user()->email;
        $payment->phone = $data['phone']?? 112122112;
        $payment->amount = $data['price'];
        $payment->json_response = json_encode($order->toArray());
        $payment->status = 'pending';
        $payment->save();

        Log::info('Razorpay Payment Saved:', $payment->toArray());

        return response()->json(['success' => true]);
    }
    function  success(Request $request){

        $data = $request->all();
        Log::info('Razorpay Payment Data:', $data);
        dd($data);
        $api = new \Razorpay\Api\Api(config('services.Razorpay.key'), config('services.Razorpay.key_secret'));

        $payment = $data['razorpay_payment_id'];


        $payment = $order->payments()->create(['amount' => $order['amount_due'], 'currency' => $order['currency']]);
        // dd($data);
        // return view('razorpay.success', ['order' => $order, 'payment' => $payment]);
    }
}
