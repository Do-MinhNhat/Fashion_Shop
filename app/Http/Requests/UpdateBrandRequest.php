<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('brand');
        // hoặc: $this->brand->id (Route Model Binding)

        return [
            'name'  => 'required|string|max:255',
            'slug'  => 'required|string|max:255|unique:brands,slug,' . $brandId,
            'image' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'slug.unique'   => 'Slug đã tồn tại',
            'image.string'  => 'Image phải là chuỗi (URL hoặc path)',
        ];
    }
}
