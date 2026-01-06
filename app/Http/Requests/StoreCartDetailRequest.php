<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartDetailRequest extends FormRequest
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
             'cart_id'    => 'required|exists:carts,id',
            'variant_id' => 'required|exists:variants,id',
            'quantity'   => 'required|integer|min:1',
        ];
    }
    public function messages(): array
    {
        return [
           'cart_id.required'    => 'Giỏ hàng không được để trống',
            'cart_id.exists'      => 'Giỏ hàng không tồn tại',

            'variant_id.required' => 'Biến thể sản phẩm không được để trống',
            'variant_id.exists'   => 'Biến thể sản phẩm không tồn tại',

            'quantity.required'   => 'Số lượng không được để trống',
            'quantity.integer'    => 'Số lượng phải là số nguyên',
            'quantity.min'        => 'Số lượng phải lớn hơn hoặc bằng 1',
        ];
    }
}
