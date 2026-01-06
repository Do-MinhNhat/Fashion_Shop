<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'url'    => 'required|string|max:255',
        'status' => 'required|in:0,1',
        ];
    }
    public function messages(): array
    {
        return [
            'image.image'    => 'File tải lên phải là hình ảnh.',
        'image.max'      => 'Dung lượng ảnh không được vượt quá 2MB.',
        'url.required'   => 'Đường dẫn liên kết không được để trống.',
        'status.required'=> 'Vui lòng chọn trạng thái hiển thị.',
        'status.in'      => 'Trạng thái chọn không hợp lệ.',
        ];
    }
}
