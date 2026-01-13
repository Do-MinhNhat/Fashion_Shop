<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Variant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Sản phẩm';
        $viewData['subtitle'] = 'Quản lý sản phẩm';

        $products = Product::where('status', true)->with('variants')->Paginate(5)->withQueryString();

        $brands = Brand::where('status', true)->get();

        $categories = Category::where('status', true)->with('sizes')->get();

        $colors = Color::where('status', true)->get();

        $tags = Tag::where('status', true)->get();

        $sizes = Size::where('status', true)->get();

        return view('admin.product.index', compact('products', 'viewData', 'brands', 'categories', 'colors', 'tags', 'sizes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->safe()->except('variants'));
        foreach ($request->variants as $variant) {
            $product->variants()->create($variant);
        }
        return redirect()->back()->with('success', 'Đã thêm sản phẩm "' . $product->name . '" cùng các biến thể!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
