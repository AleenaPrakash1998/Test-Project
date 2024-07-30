<?php

namespace App\Http\Controllers\Customer;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;


class CustomerProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        $products = Product::query()
            ->where('quantity', '>', 0)
            ->get();

        return $dataTable->render('customer.products.index', compact('products'));
    }

    public function update(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $user = auth()->user();

        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);

        $cartItemExists = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->exists();

        if (!$cartItemExists) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('customer-products.index')
            ->with('success', 'Product added cart successfully.');

    }
}
