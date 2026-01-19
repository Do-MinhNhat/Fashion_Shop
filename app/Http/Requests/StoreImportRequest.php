<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'products' => 'required|array|min:1',
            'status' => 'nullable|boolean',
            'products.*.variant_id' => 'required|distinct|exists:variants,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'products.required' => 'Danh sách sản phẩm không được để trống',
            'products.array' => 'Danh sách sản phẩm phải là 1 mảng',
            'products.min' => 'Danh sách sản phẩm phải có ít nhất 1 sản phẩm',
            'products.*.variant_id.required' => 'Sản phẩm không được để trống',
            'products.*.variant_id.exists' => 'Sản phẩm không tồn tại',
            'products.*.quantity.required' => 'Số lượng không được để trống.',
            'products.*.quantity.integer' => 'Số lượng phải là số nguyên.',
            'products.*.quantity.min' => 'Số lượng sản phẩm tối thiểu phải là 1.',
            'products.*.price.numeric' => 'Giá nhập phải là số',
            'products.*.price.min' => 'Giá nhập phải lớn hơn hoặc bằng 0',
        ];
    }
}
