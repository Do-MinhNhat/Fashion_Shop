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
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|string|max:255',
            'rating'      => 'nullable|numeric|min:0|max:5',
            'status'      => 'required|in:0,1',
            'view'        => 'nullable|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id'    => 'required|exists:brands,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'Tên sản phẩm không được để trống',
            'slug.required'      => 'Slug không được để trống',
            'slug.unique'        => 'Slug đã tồn tại',
            'thumbnail.string'   => 'Thumbnail phải là chuỗi (URL hoặc path)',
            'rating.max'         => 'Rating tối đa là 5',
            'status.in'          => 'Trạng thái không hợp lệ',
            'category_id.exists' => 'Danh mục không tồn tại',
            'brand_id.exists'    => 'Thương hiệu không tồn tại',
        ];
    }
}
