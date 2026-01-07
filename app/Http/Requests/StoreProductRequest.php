<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products,slug',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string|max:10000',
            'thumbnail' => 'nullable|shop_image',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'slug.required' => 'Slug không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
            'description.max' => 'mô tả sản phẩm không quá 10000 ký tự',
            'status.required' => 'Trạng thái không được để trống',
            'status.boolean' => 'Trạng thái không hợp lệ',
            'category_id.exists' => 'Danh mục không tồn tại',
            'brand_id.exists' => 'Thương hiệu không tồn tại',
            'category_id.exists' => 'Danh mục không tồn tại',
            'brand_id.exists' => 'Thương hiệu không tồn tại',
        ];
    }
}
