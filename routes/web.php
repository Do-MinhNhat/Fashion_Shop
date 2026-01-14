<?php

use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ColorController as AdminColorController;
use App\Http\Controllers\User\CartDetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SizeController as AdminSizeController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
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
            //Product
            Route::get('/san-pham', [AdminProductController::class, 'index'])->name('admin.product.index');
            Route::get('/san-pham/thung-rac', [AdminProductController::class, 'trash'])->name('admin.product.trash');
            Route::post('/san-pham', [AdminProductController::class, 'store'])->name('admin.product.store');
            Route::delete('/san-pham/{product}/', [AdminProductController::class, 'delete'])->name('admin.product.delete');
            Route::put('san-pham/{product}/khoi-phuc', [AdminProductController::class, 'restore'])->name('admin.product.restore')->withTrashed();
            Route::delete('san-pham/{product}/force', [AdminProductController::class, 'forceDelete'])->name('admin.product.forceDelete')->withTrashed();

            //Category Route
            Route::post('/danh-muc/them', [AdminCategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/danh-muc/kich-co', [AdminCategoryController::class, 'getSizes'])->name('admin.category.size');

            //Brand Route
            Route::post('/nhan-hieu/them', [AdminBrandController::class, 'store'])->name('admin.brand.store');

            //Color
            Route::post('/mau-sac/them', [AdminColorController::class, 'store'])->name('admin.color.store');

            //Size
            Route::post('/kich-co/them', [AdminSizeController::class, 'store'])->name('admin.size.store');

            //Tag
            Route::post('/nhan/them', [AdminTagController::class, 'store'])->name('admin.tag.store');

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
Route::permanentRedirect('/quanly', '/quan-ly');
Route::permanentRedirect('/sanpham', '/san-pham');



require __DIR__ . '/auth.php';
