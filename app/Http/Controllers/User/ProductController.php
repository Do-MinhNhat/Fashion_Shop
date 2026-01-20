<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\OrderDetail;
use App\Models\Review;

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
        $product = Product::where('slug', $slug)
            ->where('status', 1)
            ->with([
                'variants.color',
                'variants.size',
                'reviews.user'
            ])
            ->withCount([
                'wishlists as wishlist_count' => function ($q) {
                    $q->whereNull('variant_id');
                }
            ])
            ->firstOrFail();

        // Lấy Color duy nhất & active
        $colors = $product->variants
            ->pluck('color')
            ->filter(fn($c) => $c && $c->status == 1)
            ->unique('id')
            ->values();

        // Lấy Size duy nhất & active
        $sizes = $product->variants
            ->pluck('size')
            ->filter(fn($s) => $s && $s->status == 1)
            ->unique('id')
            ->values();

        // Tăng lượt xem
        $product->increment('view');

        // Sản phẩm liên quan
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where('status', 1)
            ->with('variants')
            ->orderByDesc('view')
            ->take(4)
            ->get();

        // Reviews (paginate riêng)
        $reviews = $product->reviews()
            ->orderByDesc('created_at')
            ->paginate(5);

        $totalRating = $reviews->total();

        // Phân bố sao
        $starCounts = $product->reviews()
            ->selectRaw('rating, COUNT(*) as total')
            ->groupBy('rating')
            ->pluck('total', 'rating')
            ->toArray();

        $ratingDist = [];
        for ($i = 5; $i >= 1; $i--) {
            $ratingDist[$i] = $starCounts[$i] ?? 0;
        }

        $averageRating = $totalRating > 0
            ? round($product->reviews()->avg('rating'), 1)
            : 0;

        return view('user.product.show', compact(
            'product',
            'relatedProducts',
            'colors',
            'sizes',
            'reviews',
            'ratingDist',
            'starCounts',
            'averageRating',
            'totalRating'
        ));
    }
}
