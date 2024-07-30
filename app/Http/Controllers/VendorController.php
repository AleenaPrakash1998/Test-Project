<?php

namespace App\Http\Controllers;

use App\DataTables\VendorUserDataTable;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function index(VendorUserDataTable $dataTable)
    {
        return $dataTable->render('pages.vendors.index');
    }

    public function create(): View
    {
        return view('pages.vendors.create');
    }

    public function store(StoreVendorRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $vendor = User::create($validatedData);

        $vendor->assignRole('vendor');

        return response()->json(['success' => true]);

    }

    public function edit($id): View
    {
        $vendor = User::query()->findOrFail($id);

        return view('pages.vendors.edit', compact('vendor'));
    }

    public function update(UpdateVendorRequest $request, string $id): JsonResponse
    {
        $validatedData = $request->validated();

        $vendor = User::findOrFail($id);

        $vendor->name = $validatedData['name'];
        $vendor->email = $validatedData['email'];

        if (isset($validatedData['password']) && !empty($validatedData['password'])) {
            $vendor->password = Hash::make($validatedData['password']);
        }

        $vendor->save();

        return response()->json(['success' => true]);

    }

    public function destroy(string $id): RedirectResponse
    {
        $vendor = User::findOrFail($id);

        $vendor->delete();

        return redirect()->route('vendors.index')
            ->with('success', 'Vendor deleted successfully.');    }
}
