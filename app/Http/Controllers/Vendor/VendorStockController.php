<?php

namespace App\Http\Controllers\Vendor;

use App\DataTables\vendor\VendorStockDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductStockRequest;
use App\Http\Requests\StoreVendorProductStockRequest;
use App\Http\Requests\UpdateVendorProductStockRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VendorStockController extends Controller
{
    public function index(VendorStockDataTable $dataTable)
    {
        return $dataTable->render('vendors.stocks.index');
    }

    public function create(): View
    {
        $products = Product::query()->where('user_id', Auth::id())->get();

        return view('vendors.stocks.create', compact('products'));
    }

    public function store(StoreVendorProductStockRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($request->product_id);

        $product->update($validatedData);

        return response()->json(['success' => true]);

    }

    public function edit($id): View
    {
        $product = Product::query()->findOrFail($id);

        return view('vendors.stocks.edit', compact('product'));
    }

    public function update(UpdateVendorProductStockRequest $request, string $id): JsonResponse
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);

        $product->update($validatedData);

        return response()->json(['success' => true]);

    }

    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->quantity = 0;

        if ($product->save()) {
            return redirect()->route('vendor-stocks.index')
                ->with('success', 'Product stock updated successfully.');
        } else {
            return redirect()->route('vendor-stocks.index')
                ->with('error', 'Failed to update product stock.');
        }
    }
}
