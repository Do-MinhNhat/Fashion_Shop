<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name'    => 'required|string|max:255',
             'phone'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
             'address' => 'required|string|max:500',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'    => 'Vui lòng nhập tên người nhận.',
            'phone.required'   => 'Vui lòng nhập số điện thoại.',
            'phone.regex'      => 'Số điện thoại không đúng định dạng.',
            'phone.min'        => 'Số điện thoại phải có ít nhất 10 chữ số.',
             'address.required' => 'Vui lòng nhập địa chỉ giao hàng.',
        ];
    }
}
