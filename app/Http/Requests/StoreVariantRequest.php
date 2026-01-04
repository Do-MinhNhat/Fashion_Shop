<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id'   => 'required|exists:products,id',
            'color_id'     => 'required|exists:colors,id',
            'size_id'      => 'required|exists:sizes,id',
            'price'        => 'required|numeric|min:0',
            'sale_price'   => 'nullable|numeric|min:0|lte:price',
            'quantity'     => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Sản phẩm không được để trống',
            'color_id.required'   => 'Màu sắc không được để trống',
            'size_id.required'    => 'Size không được để trống',
            'sale_price.lte'      => 'Giá khuyến mãi phải nhỏ hơn hoặc bằng giá gốc',
            'quantity.min'        => 'Số lượng không hợp lệ',
        ];
    }
}
