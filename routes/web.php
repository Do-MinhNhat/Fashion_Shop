<?php

use App\Http\Controllers\User\CartDetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//User Checkout Route
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('user.checkout.index');
//-----------------------------
//User Home Route
Route::get('/', [HomeController::class, 'index'])->name('user.home.index');
//-----------------------------
//User Product Route
Route::get('/san-pham', [ProductController::class, 'index'])->name('user.product.index');
Route::get('/san-pham/{product}', [ProductController::class, 'show'])->name('user.product.show');
//-----------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/gio-hang', [CartDetailController::class, 'index'])->name('user.cart.index');

    //User ^^^^^^^^^^^^^^^^^^^^^^^^^^
    //Admin vvvvvvvvvvvvvvvvvvvvvvvvv
    Route::middleware('is_admin')->prefix('quan-ly')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home.index');
        Route::middleware('role:admin-user,admin-head')->group(function () {
            Route::get('/nguoi-dung', [AdminProductController::class, 'index'])->name('admin.product.index');
        });
        Route::middleware('role:admin-shipper,admin-head')->group(function () {
            Route::get('/don-hang', [AdminOrderController::class, 'index'])->name('admin.order.index');
        });
        Route::middleware('role:admin-product,admin-head')->group(function () {
            Route::get('/san-pham', [AdminProductController::class, 'index'])->name('admin.product.index');
        });
    });
});

require __DIR__ . '/auth.php';
