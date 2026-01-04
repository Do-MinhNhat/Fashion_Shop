<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariantRequest extends FormRequest
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
}
