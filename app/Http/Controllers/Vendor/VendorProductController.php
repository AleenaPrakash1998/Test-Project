<?php

namespace App\Http\Controllers\Vendor;

use App\DataTables\vendor\VendorProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorProductRequest;
use App\Http\Requests\UpdateVendorProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VendorProductController extends Controller
{
    public function index(VendorProductDataTable $dataTable)
    {
        return $dataTable->render('vendors.products.index');
    }

    public function create(): View
    {
        return view('vendors.products.create');
    }

    public function store(StoreVendorProductRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::id();

        $product = Product::create($validatedData);

        if ($request->hasFile('banner_image')) {
            $product->addMediaFromRequest('banner_image')
                ->toMediaCollection('banners');
        }

        return response()->json(['success' => true]);

    }

    public function edit($id): View
    {
        $product = Product::query()->findOrFail($id);

        return view('vendors.products.edit', compact('product'));
    }

    public function update(UpdateVendorProductRequest $request, string $id): JsonResponse
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);

        $product->update($validatedData);

        if ($request->hasFile('banner_image')) {
            $product->clearMediaCollection('banners');
            $product->addMediaFromRequest('banner_image')->toMediaCollection('banners');
        }

        return response()->json(['success' => true]);

    }

    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('vendor-products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
