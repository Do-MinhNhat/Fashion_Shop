<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:colors,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên màu không được để trống',
            'name.unique'   => 'Màu này đã tồn tại',
        ];
    }
}
