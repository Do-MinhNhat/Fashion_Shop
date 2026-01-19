<?php

use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ColorController as AdminColorController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\CartDetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SizeController as AdminSizeController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\ImportProductController as AdminImportProductController;
use App\Http\Controllers\Admin\ShipController as AdminShipController;
use App\Http\Controllers\Admin\SlideShowController as AdminSlideShowController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\VariantController as AdminVariantController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;
//User Checkout Route
//-----------------------------
//User Home Route
Route::get('/', [HomeController::class, 'index'])->name('user.home.index');
Route::get('/policy', function () {return view('user.pages.policy');})->name('policy');
Route::get('/terms', function () {return view('user.pages.terms');})->name('terms');
//-----------------------------
//User Product Route
Route::get('/san-pham', [ProductController::class, 'index'])->name('user.product.index');
Route::get('/san-pham/{product:slug}', [ProductController::class, 'show'])->name('user.product.show');

//-----------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
//User ^^^^^^^^^^^^^^^^^^^^^^^^^^
    // Profile 
    Route::get('/ho-so-ca-nhan', [UserProfileController::class, 'index'])->name('user.profile.index');
        // Route::get('/ho-so-ca-nhan', [UserProfileController::class, 'edit'])->name('user.profile.edit');
        // Route::get('/ho-so-ca-nhan', [UserProfileController::class, 'update'])->name('user.profile.update');
        // Route::get('/ho-so-ca-nhan', [UserProfileController::class, 'destroy'])->name('user.profile.destroy');
    // Order
    Route::get('/ho-so-ca-nhan/don-hang', [OrderController::class, 'index'])->name('user.profile.order.index');
    // Address
    Route::get('/ho-so-ca-nhan/dia-chi', [AddressController::class, 'index'])->name('user.profile.address.index');
    // Cart
    Route::get('/gio-hang', [CartDetailController::class, 'index'])->name('user.cart.index');
    Route::post('/gio-hang', [CartDetailController::class, 'store'])->name('user.cart.store');
    Route::delete('/gio-hang/xoa/{id}', [CartDetailController::class, 'destroy'])->name('user.cart.destroy');
    Route::patch('/gio-hang/cap-nhat/{id}', [CartDetailController::class, 'update'])->name('user.cart.update');
    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('user.profile.wishlist.index');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('user.wishlist.toggle');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('user.wishlist.destroy');
    Route::delete('/wishlist/clear', [WishlistController::class, 'clear'])->name('user.wishlist.clear');
    // Checkout
    Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('user.checkout.index');
    // Review
    Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('user.review.store');


//Admin vvvvvvvvvvvvvvvvvvvvvvvvv
    Route::middleware('is_admin')->prefix('quan-ly')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home.index');
        // Quan ly nguoi dung
        Route::middleware('role:admin-user,admin-head')->group(function () {
            Route::get('/nguoi-dung', [AdminUserController::class, 'index'])->name('admin.user.index');
        });
        // Giao hang
        Route::middleware('role:admin-shipper,admin-head')->group(function () {
            Route::get('/giao-hang', [AdminShipController::class, 'index'])->name('admin.ship.index');
        });
        // Quan ly san pham
        Route::middleware('role:admin-product,admin-head')->group(function () {
            //Product
            Route::get('/san-pham', [AdminProductController::class, 'index'])->name('admin.product.index');
            Route::get('/san-pham/thung-rac', [AdminProductController::class, 'trash'])->name('admin.product.trash');
            Route::post('/san-pham', [AdminProductController::class, 'store'])->name('admin.product.store');
            Route::delete('/san-pham/{product}/', [AdminProductController::class, 'delete'])->name('admin.product.delete');
            Route::put('san-pham/{product}/khoi-phuc', [AdminProductController::class, 'restore'])->name('admin.product.restore')->withTrashed();
            Route::delete('san-pham/{product}/force', [AdminProductController::class, 'forceDelete'])->name('admin.product.forceDelete')->withTrashed();
            Route::put('san-pham/{product}/cap-nhat', [AdminProductController::class, 'update'])->name('admin.product.update');

            //Variant Route
            Route::post('/san-pham/them-bien-the', [AdminVariantController::class, 'store'])->name('admin.variant.store');
            Route::delete('/san-pham/{variant}/xoa', [AdminVariantController::class, 'delete'])->name('admin.variant.delete');

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
            Route::get('/nhap-hang', [AdminImportProductController::class, 'index'])->name('admin.import.index');
        });
        // slideshow
        Route::middleware(['role:admin-head'])->group(function () {
            Route::resource('slideshow', AdminSlideShowController::class)->names('admin.slideshow');
        });
        // Cau hinh
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
