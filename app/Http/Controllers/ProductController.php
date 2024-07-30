<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('pages.products.index');
    }

    public function create(): View
    {
        return view('pages.products.create');
    }

    public function store(StoreProductRequest $request): JsonResponse
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

        return view('pages.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, string $id): JsonResponse
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

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
