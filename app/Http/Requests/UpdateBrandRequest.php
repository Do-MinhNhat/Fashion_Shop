<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        $id = $this->route('brand')->id;

        return [
            'name'  => 'required|string|max:255|unique:brands,name,' . $id,
            'slug'  => 'required|string|max:255|unique:brands,slug,' . $id,
            'image' => 'nullable|shop_image',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.unique' => 'Tên thương hiệu đã tồn tại',
            'slug.required' => 'Slug không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
        ];
    }
}
