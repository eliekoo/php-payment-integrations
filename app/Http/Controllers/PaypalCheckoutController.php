<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaypalCheckoutController extends Controller
{
    public function index(){
        // Access configuration from config/paypal.php
        $gateway = new Gateway([
            'environment' => config('paypal.environment'),
            'merchantId' => config('paypal.merchant_id'),
            'publicKey' => config('paypal.public_key'),
            'privateKey' => config('paypal.private_key')
        ]);

        // Use the gateway object to perform Braintree actions, e.g., generating a client token
        $clientToken = $gateway->clientToken()->generate();

        return view('paypal/index', compact('clientToken'));
    }
    
    public function success(){
        return view('paypal/success');
    }

    public function fail(){
        return view('stripe/canceled');
    }

    public function checkout(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('paypal.environment'),
            'merchantId' => config('paypal.merchant_id'),
            'publicKey' => config('paypal.public_key'),
            'privateKey' => config('paypal.private_key')
        ]);

        // Retrieve nonce from the frontend
        $nonce = $request->input('payment_nonce');

        // Create a transaction using the nonce
        $result = $gateway->transaction()->sale([
            'amount' => '99.90',//$request->input('amount'), // Example amount; should be dynamic based on your checkout
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Check the result of the transaction
        if ($result->success) {
            return redirect()->route('payment.success')->with('message', 'Payment successful!');
        } else {
            return redirect()->route('payment.failure')->with('message', 'Payment failed: ' . $result->message);
        }
    }
}