<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        // Get current cart from session
        $cart = Session::get('cart', []);
        $cartCounter = cartCounter();
        $totalMoney = cartTotalMoney();
        $dataCart = [
            'cart' => $cart,
            'cartCounter' => $cartCounter,
            'totalMoney' => $totalMoney,
        ];
        // Render view to display cart
        return view('user.cart', $dataCart);
    }
    public function store(Request $request)
    {
        try {
            $inputs = $request->all();

            $product_id = isset($inputs['product_id']) ? $inputs['product_id'] : null;
            $name = isset($inputs['name']) ? $inputs['name'] : null;
            $price = isset($inputs['price']) ? $inputs['price'] : null;
            $image = isset($inputs['image']) ? $inputs['image'] : null;
            $category_name = isset($inputs['category_name']) ? $inputs['category_name'] : null;
            $quantity = isset($inputs['quantity']) ? $inputs['quantity'] : 1;

            // Get current cart from session
            $cart = Session::get('cart', []);

            // Check if item already exists in cart
            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] += $quantity;
            } else {
                // Add new item to cart
                $cart[$product_id] = [
                    'product_id' => $product_id,
                    'name' => $name,
                    'price' => $price,
                    'image' => $image,
                    'category_name' => $category_name,
                    'quantity' => $quantity,
                ];
            }

            // Save updated cart back to session
            Session::put('cart', $cart);

            // Get cart couter
            $cartCounter = cartCounter();
            $response = [
                'msg' => 'success',
                'cartCounter' => $cartCounter,
            ];
            // Return success response for ajax call
            return response()->json($response, 200);
        } catch (\Exception $e) {
            // Return error response for ajax call
            return response()->json($e->getMessage(), 400);
        }
    }

    public function update(Request $request)
    {   
        // Get current cart from session
        $cart = Session::get('cart', []);

        // Get the product ID and updated quantity from the request
        $inputs = $request->all();
        $product_id = isset($inputs['product_id']) ? $inputs['product_id'] : null;
        $quantity = isset($inputs['quantity']) ? $inputs['quantity'] : null;

        // Check if item already exists in cart
        if (isset($cart[$product_id])) {
            // Update the quantity
            $cart[$product_id]['quantity'] = $quantity;
            // Save updated cart back to session
            Session::put('cart', $cart);

            // Get cart couter
            $cartCounter = cartCounter();
            $totalMoney = cartTotalMoney();
            $response = [
                'msg' => 'success',
                'cartCounter' => $cartCounter,
                'totalMoney' => $totalMoney,
            ];

            // Return success response for ajax call
            return response()->json($response, 200);
        } else {
            // If item does not exist in cart, return error response
            return response()->json('error', 404);
        }
    }


    public function remove(Request $request)
    {   
        try {
            // Get current cart from session
            $cart = Session::get('cart', []);
            // Get the product ID and updated quantity from the request
            $inputs = $request->all();
            $product_id = isset($inputs['product_id']) ? $inputs['product_id'] : null;
            // Check if item exists in cart
            if (!isset($cart[$product_id])) {
                return response()->json(['error' => 'Item not found in cart'], 400);
            }

            // Remove item from cart
            unset($cart[$product_id]);

            // Save updated cart back to session
            Session::put('cart', $cart);

            // Get cart couter
            $cartCounter = cartCounter();
            $totalMoney = cartTotalMoney();
            $response = [
                'msg' => 'success',
                'cartCounter' => $cartCounter,
                'totalMoney' => $totalMoney,
            ];
            // Return success response for ajax call
            return response()->json($response, 200);
        } catch (\Exception $e) {
            // Return error response for ajax call
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
}
