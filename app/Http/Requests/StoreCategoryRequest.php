<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'   => 'required|string|max:255',
            'slug'   => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'Tên danh mục không được để trống',
            'slug.required'   => 'Slug không được để trống',
            'slug.unique'     => 'Slug đã tồn tại',
            'status.required' => 'Trạng thái không được để trống',
            'status.in'       => 'Trạng thái không hợp lệ',
        ];
    }
}
