<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product'); 
        // hoặc: $this->product->id nếu dùng route model binding

        return [
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:products,slug,' . $productId,
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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
            'name.required' => 'Tên sản phẩm không được để trống',
            'slug.unique'   => 'Slug đã tồn tại',
        ];
    }
}
