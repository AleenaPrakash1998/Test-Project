<?php

use App\Http\Controllers\Customer\CustomerCartController;
use App\Http\Controllers\Customer\CustomerProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorStockController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('vendors', VendorController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stocks', StockController::class);
});

Route::middleware(['auth', 'vendor'])->group(function () {
    Route::resource('vendor-products', VendorProductController::class);
    Route::resource('vendor-stocks', VendorStockController::class);
});

Route::middleware(['auth', 'customer'])->group(function () {
    Route::resource('customer-products', CustomerProductController::class);
    Route::resource('customer-carts', CustomerCartController::class);
});


require __DIR__ . '/auth.php';
