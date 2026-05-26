<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('perfume')->where('user_id',Auth::id())->get();
        return view('cart.index',['cartItems'=>$cartItems]);
    }

    // Añadir un perfume al carrito
    public function store(Request $request)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('perfume_id', $request->perfume_id)
                            ->first();

        if ($cartItem) {
            // Ya existe en el carrito → sumar 1 a la cantidad
            $cartItem->increment('quantity');
        } else {
            // No existe → crear nuevo item
            CartItem::create([
                'user_id'    => Auth::id(),
                'perfume_id' => $request->perfume_id,
                'quantity'   => 1,
            ]);
        }

        return redirect()->back();
    }

    // Actualizar cantidad de un item (AJAX)
    public function update(Request $request, CartItem $cartItem)
    {
        $newQuantity = max(1, (int) $request->quantity); // mínimo 1
        $cartItem->update(['quantity' => $newQuantity]);

        // Recalculamos el total completo del carrito
        $total = CartItem::with('perfume')
                        ->where('user_id', Auth::id())
                        ->get()
                        ->sum(fn($i) => $i->perfume->price * $i->quantity);

        return response()->json([
            'quantity' => $cartItem->quantity,
            'subtotal' => number_format($cartItem->perfume->price * $cartItem->quantity, 2),
            'total'    => number_format($total, 2),
        ]);
    }

    // Eliminar un item del carrito (AJAX)
    public function destroy(CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
