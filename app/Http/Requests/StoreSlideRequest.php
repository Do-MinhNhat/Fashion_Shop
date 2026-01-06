<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
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
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url'    => 'required|url',
            'status' => 'required|boolean',
            //
        ];
    }
    public function messages(): array
    {
        return [
            'image.required' => 'Vui lòng chọn ảnh cho slide.',
             'image.image'    => 'Định dạng tệp phải là hình ảnh.',
             'url.required'   => 'Đường dẫn liên kết không được để trống.',
                'url.url'        => 'Đường dẫn không đúng định dạng (ví dụ: https://...).',
                'status.required' => 'Vui lòng chọn trạng thái hiển thị.',
        ];
    }
}
