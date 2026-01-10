<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
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
            Route::get('/nguoi-dung', [AdminHomeController::class, 'index'])->name('admin.user.index');
        });
        Route::middleware('role:admin-shipper,admin-head')->group(function () {
            Route::get('/giao-hang', [AdminOrderController::class, 'index'])->name('admin.ship.index');
        });
        Route::middleware('role:admin-product,admin-head')->group(function () {
            Route::get('/san-pham', [AdminProductController::class, 'index'])->name('admin.product.index');

            //Category Route
            Route::post('/danh-muc/them', [CategoryController::class, 'store'])->name('admin.category.store');

            //Brand Route
            Route::post('/nhan-hieu/them', [BrandController::class, 'store'])->name('admin.brand.store');

            Route::get('/don-hang', [AdminOrderController::class, 'index'])->name('admin.order.index');
            Route::get('/nhap-hang', [AdminOrderController::class, 'index'])->name('admin.import.index');
        });
        Route::middleware('role:admin-head')->group(function () {
            Route::get('/cau-hinh', [AdminHomeController::class, 'index'])->name('admin.setting.index');
        });
    });
});

Route::permanentRedirect('/admin', '/quan-ly');
Route::permanentRedirect('/product', '/san-pham');

require __DIR__ . '/auth.php';
