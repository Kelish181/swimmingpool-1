<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    // Display the cart page
    public function index()
    {
        // Get the cart from the session
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }
    
    
    public function addToCart(Request $request)
    {
        // Retrieve existing cart from session or initialize an empty array
        $cart = session()->get('cart', []);
        $productId = $request->id;
        $productName = $request->name;
        $unitPrice = $request->price;
        $quantity = (int) $request->qty;
    
        // Calculate total price for the specified quantity
        $totalPrice = $unitPrice * $quantity;
    
        // If the product is already in the cart, update its quantity and total price
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $unitPrice;
        } else {
            // Add new item to the cart with necessary details
            $cart[$productId] = [
                'name' => $productName,
                'unit_price' => $unitPrice,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'image' => $request->image
            ];
        }
    
        // Store updated cart in the session
        session()->put('cart', $cart);
    
        // Return response with updated cart item count
        return response()->json(['success' => true, 'cartItemCount' => count($cart)]);
    }
    
    

    public function showCart()
    {
        $cart = Session::get('cart', []);
        return view('cart.show', compact('cart'));
    }

    
    public function remove(Request $request, $id)
    {
        // Get the cart from session
        $cart = session()->get('cart', []);
        
        // If the item exists in the cart, remove it
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        // Redirect to the cart page after removal
        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }
    
    
        
}