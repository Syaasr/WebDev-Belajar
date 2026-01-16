<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart');
        if(!$cart) {
            return redirect()->route('home')->with('error', 'Keranjang kosong!');
        }

        $totalPrice = 0;
        foreach($cart as $id => $details) {
            $totalPrice += $details['price'] * $details['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        foreach($cart as $id => $details) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Checkout berhasil! Pesananmu sedang diproses.');
    }
}