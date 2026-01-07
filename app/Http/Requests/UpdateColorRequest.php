<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        $id = $this->route('color')->id;
        return [
            'name' => 'required|string|max:255|unique:colors,name,' . $id,
            'status' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên màu sắc giao hàng không được để trống.',
            'name.unique' => 'Tên màu sắc giao hàng này đã tồn tại.',
            'status.required' => 'Trạng thái không được để trống',
            'status.boolean' => 'Trạng thái không hợp lệ',
        ];
    }
}
