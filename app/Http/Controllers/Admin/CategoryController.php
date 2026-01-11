<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $category,
            ], 201);
        }
        return redirect()->back()->with('success', 'Đã thêm danh mục:' . $category->name . '!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function getSizes(Request $request)
    {
        $sizes = Size::where('category_id', $request->id)->where('status', true)->get(['id', 'name']);
        if ($sizes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Danh mục chưa có kích thước!',
                'data' => [],
            ], 404); // Trả về mảng rỗng và mã lỗi 404 (tùy chọn)
        }
        return response()->json($sizes);
    }
}
