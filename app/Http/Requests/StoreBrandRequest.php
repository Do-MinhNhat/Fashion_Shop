<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }
    //Tạo slug trước khi kiểm tra
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
    //Thêm thông báo lỗi của slug vào name
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $errors = $validator->errors();
            if ($errors->has('slug')) {
                $errors->add('name', $errors->first('slug'));
            }
        });
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:brands,name',
            'slug' => 'required|unique:brands,slug',
            'image' => 'required|shop_image',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.unique' => 'Tên thương hiệu đã tồn tại',
            'slug.unique' => 'Tên thương hiệu đã tồn tại',
            'image.required' => 'Hình ảnh không được để trống',
        ];
    }
}
