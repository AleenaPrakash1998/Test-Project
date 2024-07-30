<?php

namespace App\Http\Controllers;

use App\DataTables\StockDataTable;
use App\Http\Requests\StoreProductStockRequest;
use App\Http\Requests\UpdateVendorProductStockRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StockController extends Controller
{
    public function index(StockDataTable $dataTable)
    {
        return $dataTable->render('pages.stocks.index');
    }

    public function create(): View
    {
        $products = Product::query()->get();

        return view('pages.stocks.create', compact('products'));
    }

    public function store(StoreProductStockRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($request->product_id);

        $product->update($validatedData);

        return response()->json(['success' => true]);

    }

    public function edit($id): View
    {
        $product = Product::query()->findOrFail($id);

        return view('pages.stocks.edit', compact('product'));
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
            return redirect()->route('stocks.index')
                ->with('success', 'Product stock updated successfully.');
        } else {
            return redirect()->route('stocks.index')
                ->with('error', 'Failed to update product stock.');
        }
    }
}
