<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(Request $request)
    {
        return view('checkout.payment');
    }

    public function payment(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $charge = $stripe->charges->create([
            'amount' => $request->price * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,

        ]);
        return view('checkout.success');
        // return view('checkout.payment');
    }

    public function success()
    {
        return view('checkout.success');
    }
}