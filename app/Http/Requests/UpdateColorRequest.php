<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $colorId = $this->route('color');

        return [
            'name' => 'required|string|max:50|unique:colors,name,' . $colorId,
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
