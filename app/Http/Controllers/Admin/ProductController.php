<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Traits\ImageTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Sản phẩm';
        $viewData['subtitle'] = 'Quản lý sản phẩm';

        $products = Product::with(['variants','tags','images'])->Paginate(5)->withQueryString();

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
        $imgMsg = "";
        $product = Product::create($request->validated());
        $baseName =  $product->id . "_" . $product->slug;
        if ($request->hasFile('cropped-thumbnail')) {
            $thumbnail = $baseName . "." . $request->file('cropped-thumbnail')->extension();
            $thumbPath = $this->uploadImage($thumbnail, $request->file('cropped-thumbnail'), 'product/thumbnail');
            $product->update(['thumbnail' => $thumbPath]);
            $imgMsg = $imgMsg . " Ảnh chính: 1 hình";
        } else {
            $imgMsg = $imgMsg . " Ảnh chính rỗng";
        }
        if ($request->hasFile('cropped-images')) {
            foreach ($request->file('cropped-images') as $index => $file) {
                $imagesName = $baseName . "_" . ($index + 1) . "." . $file->extension();
                $imagePath = $this->uploadImage($imagesName, $file, 'product/image');
                $product->images()->create(['url' => $imagePath]);
            }
            $imgMsg = $imgMsg . ", Ảnh phụ: " . count($request->file('cropped-images')) . " hình";
        } else {
            $imgMsg = $imgMsg . ", ảnh phụ rỗng";
        }
        foreach ($request->variants as $variant) {
            $product->variants()->create($variant);
        }
        $product->tags()->sync($request->tags);
        return redirect()->back()->with('success', 'Đã thêm sản phẩm "' . $product->name . '" cùng các biến thể!' . $imgMsg);
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
        $imgMsg = "";
        $product->update($request->validated());
        $baseName =  $product->id . "_" . $product->slug;
        if ($request->hasFile('cropped-thumbnail')) {
            $this->deleteImage($product->thumbnail);
            $thumbnail = $baseName . "." . $request->file('cropped-thumbnail')->extension();
            $thumbPath = $this->uploadImage($thumbnail, $request->file('cropped-thumbnail'), 'product/thumbnail');
            $product->update(['thumbnail' => $thumbPath]);
            $imgMsg = $imgMsg . "Cập nhật ảnh chính";
        } else {
            $imgMsg = $imgMsg . " Ảnh chính rỗng";
        }
        if ($request->hasFile('cropped-images')) {
            foreach ($request->file('cropped-images') as $index => $file) {
                $imagesName = $baseName . "_" . ($index + 1) . "." . $file->extension();
                $imagePath = $this->uploadImage($imagesName, $file, 'product/image');
                $product->images()->create(['url' => $imagePath]);
            }
            $imgMsg = $imgMsg . ", Ảnh phụ: " . count($request->file('cropped-images')) . " hình";
        } else {
            $imgMsg = $imgMsg . ", ảnh phụ rỗng";
        }
        foreach ($request->variants as $variant) {
            $cleanDate = array_diff_key($variant, array_flip(['id','size_id','color_id','product_id','created_at', 'updated_at', 'deleted_at']));
            $product->variants()->where('id',$variant['id'])->update($cleanDate);
        }
        $product->tags()->sync($request->tags);
        return redirect()->back()->with('success', 'Đã sửa sản phẩm "' . $product->name . '" cùng các biến thể!' . $imgMsg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Đã xóa sản phẩm "' . $product->name . '" ID: ' . $product->id);
    }
    public function restore(Product $product)
    {
        $product->restore();
        return back()->with('success', 'Khôi phục sản phẩm "' . $product->name . '" ID: ' . $product->id);
    }
    public function forceDelete(Product $product)
    {
        $name = $product->name;
        $id = $product->id;
        $thumbnail = $product->thumbnail;
        $images = $product->images->pluck('url')->all();
        try {
            $product->forceDelete();
        } catch (QueryException $error) {
            if ($error->getCode() == "23000") { //Kiểm tra khóa ngoại
                return back()->with('error', 'Dữ liệu này đang được sử dụng ở nơi khác, không thể xóa vĩnh viễn!');
            }
            return back()->with('error', 'Lỗi hệ thống: Không thể thực hiện lệnh xóa.');
        }
        $this->deleteImage($thumbnail);
        foreach ($images as $img) {
            $this->deleteImage($img);
        }
        return back()->with('success', 'Đã xóa vĩnh viễn sản phẩm "' . $name . 'ID: "' . $id);
    }
    public function trash()
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Sản phẩm';
        $viewData['subtitle'] = 'Thùng rác sản phẩm';
        $products = Product::onlyTrashed()->with('variants')->paginate(10);
        return view('admin.product.trash', compact('products', 'viewData'));
    }
}
