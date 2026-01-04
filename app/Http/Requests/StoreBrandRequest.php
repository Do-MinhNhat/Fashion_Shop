<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'slug'  => 'required|string|max:255|unique:brands,slug',
            'image' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'slug.required' => 'Slug không được để trống',
            'slug.unique'   => 'Slug đã tồn tại',
            'image.string'  => 'Image phải là chuỗi (URL hoặc path)',
        ];
    }
}
