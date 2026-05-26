<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function index(Request $request)
    {
        $selectedIds = $request->input('items', []);

        if (empty($selectedIds)) {
            return redirect()->route('cart.index')->with('error', 'Debes seleccionar al menos un artículo para realizar el pago.');
        }

        $cartItems = CartItem::with('perfume')
                            ->where('user_id', Auth::id())
                            ->whereIn('id', $selectedIds)
                            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Debes seleccionar al menos un artículo válido para realizar el pago.');
        }

        $total = $cartItems->sum(fn($item) => $item->perfume->price * $item->quantity);

        return view('checkout.payment', compact('cartItems', 'total'));
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