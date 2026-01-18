<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
            ->with(['variants.color', 'variants.size'])
            ->firstOrFail();

        $viewData = [];
        $viewData['title'] = $product->name;
        $viewData['subtitle'] = $product->name;

        // Lấy Color duy nhất và đang active
        $colors = $product->variants
            ->pluck('color')
            ->filter(fn($c) => $c && $c->status == 1)
            ->unique('id')
            ->values();

        // Lấy Size duy nhất và đang active
        $sizes = $product->variants
            ->pluck('size')
            ->filter(fn($s) => $s && $s->status == 1)
            ->unique('id')
            ->values();

        $product->increment('view');

        $relatedProducts = Product::where('id', '!=', $product->id)
            ->with(['variants', 'category'])
            ->orderByDesc('view')
            ->take(4)
            ->get();

        $reviews = $product->reviews()
            ->with(['user'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $totalRating = $product->reviews()->count();

        $starCounts = $product->reviews()
            ->select('rating', Review::raw('count(*) as total'))
            ->groupBy('rating')
            ->pluck('total', 'rating')
            ->toArray();

        $ratingDist = [];
        for ($i = 5; $i >= 1; $i--) {
            $ratingDist[$i] = $starCounts[$i] ?? 0;
        }

        $averageRating = $totalRating > 0 ? round($product->reviews()->avg('rating'), 1) : 0;

        return view('user.product.show', compact(
            'product', 'relatedProducts', 'colors', 'sizes', 'reviews', 'ratingDist', 'starCounts', 'averageRating', 'totalRating'
        ));
    }
}
