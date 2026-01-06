<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
        'name'     => 'nullable|string|max:255',
        'url'      => 'nullable|string|max:255',
        'status'   => 'nullable|boolean',
        ];
    }
     public function messages(): array
     {
        return[
        'name.max' => 'Tên liên hệ không được vượt quá 255 ký tự',
        'url.max' => 'Đường dẫn không được vượt quá 255 ký tự',
        'status.boolean' => 'Trạng thái không hợp lệ',
        ];
     }

}
