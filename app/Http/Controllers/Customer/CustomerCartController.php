<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CustomerCartController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $cart = $user->cart;

        if (!$cart) {
            $cartItems = collect();
        } else {
            $cartItems = $cart->items;
        }

        return view('customer.cart.index', compact('cartItems'));
    }
}
