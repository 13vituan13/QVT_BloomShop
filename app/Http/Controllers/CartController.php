<?php

namespace App\Http\Controllers;

use App\Providers\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Cart $cart)
    {
        $items = $cart->content();
        $total = $items->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('user.cart', compact('items', 'total'));
    }

    public function store(Request $request, Cart $cart)
    {
        $cart->add($request->input('id'), $request->input('name'), $request->input('price'), $request->input('quantity'));

        return redirect()->route('cart.index')->with('success', 'Item added to cart successfully!');
    }

    public function update(Request $request, Cart $cart)
    {
        foreach ($request->input('items') as $id => $quantity) {
            $cart->update($id, $quantity);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function destroy($id, Cart $cart)
    {
        $cart->remove($id);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully!');
    }
}
