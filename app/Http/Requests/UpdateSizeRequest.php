<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        $id = $this->route('size')->id;
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên kích cỡ không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'category_id.exists' => 'Danh mục không tồn tại',
            'status.required' => 'Vui lòng chọn trạng thái hiển thị.',
            'status.boolean' => 'Trạng thái chọn không hợp lệ.',
        ];
    }
}
