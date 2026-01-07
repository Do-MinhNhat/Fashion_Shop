<?php

namespace App\Http\Requests;

use App\Models\Variant;
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
        $stock = Variant::find($this->variant_id)?->quantity ?? 0;
        return [
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1|max:' . $stock,
        ];
    }
    public function messages(): array
    {
        return [
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng sản phẩm tối thiểu phải là 1.',
            'quantity.max' => 'Số lượng sản phẩm không được vượt số lượng tồn kho',
        ];
    }
}
