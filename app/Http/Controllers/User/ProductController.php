<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)
            ->with('variants')
            ->latest()
            ->paginate(12) 
            ->withQueryString();

        return view('user.product.index', compact('products'));
    }

    // Hiển thị chi tiết sản phẩm
    public function show($slug)
    {
        // 1. Lấy sản phẩm, kèm theo Variants VÀ thông tin chi tiết Color/Size
        $product = Product::where('slug', $slug)
            ->where('status', true)
            ->with(['variants.color', 'variants.size']) 
            ->firstOrFail();

        // 2. Lấy danh sách Màu (Object) duy nhất
        $colors = $product->variants->map(function ($variant) {
            return $variant->color;
        })->filter()->unique('id')->values();

        // 3. Lấy danh sách Size (Object) duy nhất
        $sizes = $product->variants->map(function ($variant) {
            return $variant->size;
        })->filter()->unique('id')->values();

        // 4. Logic khác giữ nguyên...
        $product->increment('view');
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('variants')
            ->inRandomOrder()->take(4)->get();

        return view('user.product.show', compact('product', 'relatedProducts', 'colors', 'sizes'));
    }
}