<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData["title"] = "Trang chủ - Fashion Shop";

        // 1. Sản phẩm mới
        $newProducts = Product::with('variants')
            ->where('status', 1)
            ->latest('id')
            ->take(10)
            ->get();

        // 2. Sản phẩm nổi bật (view cao)
        $bestSellerProducts = Product::with('variants')
            ->where('status', 1)
            ->where('view', '>=', 4)
            ->orderBy('view', 'desc')
            ->limit(10)
            ->get();

        // 3. Sản phẩm bán chạy
        $featuredProducts = Product::with('variants')
            ->where('status', 1)
            ->inRandomOrder() 
            ->take(10)
            ->get();

        // 4. Bộ sưu tập hot
        $collectionProducts = Product::with('variants')
            ->where('status', 1)
            ->where('category_id', 1)
            ->latest('id')
            ->take(10)
            ->get();

        $maxProductId = Product::max('id');

        return view('user.home.index', compact(
            'newProducts',
            'featuredProducts',
            'bestSellerProducts',
            'collectionProducts',
            'maxProductId'
        ));
    }
}