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

        // Sản phẩm mới 
        $newProducts = Product::where('status', 1)
            ->latest('id')
            ->take(10)
            ->get();

        // Sản phẩm nổi bật (rating cao)
        $featuredProducts = Product::where('status', 1)
            ->where('rating', '>=', 4)
            ->orderByDesc('rating')
            ->take(10)
            ->get();

        // Sản phẩm bán chạy (view nhiều)
        $bestSellerProducts = Product::where('status', 1)
            ->orderByDesc('view')
            ->take(10)
            ->get();

        // Bộ sưu tập hot (ví dụ category_id = 1)
        $collectionProducts = Product::where('status', 1)
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
