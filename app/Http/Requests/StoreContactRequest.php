<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
        'name'     => 'required|string|max:255',
        'url'=> 'required|string|max:255',
        'status' => 'required|boolean',
        ];
    }
     public function messages(): array
     {
        return [
        'name.required' => 'Tên liên hệ không được để trống',
        'name.max' => 'Tên liên hệ không được vượt quá 255 ký tự',

        'url.required' => 'Tên đường dẫn không được để trống',
        'url.max' => 'Đường dẫn không được vượt quá 255 ký tự',

        'status.required' => 'Trạng thái không được để trống',
        'status.boolean' => 'Trạng thái không hợp lệ',
        ];
     }
}
