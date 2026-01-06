<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImportRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric|min:0',
            'details' => 'nullable|array',
            'details.*.variant_id' => 'required_with:details|exists:variants,id',
            'details.*.quantity' => 'required_with:details|integer|min:1',
            'details.*.price' => 'required_with:details|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'Người nhập hàng không được để trống.',
            'user_id.exists' => 'Người dùng không tồn tại trên hệ thống.',
            
            'total_price.required' => 'Tổng tiền không được để trống.',
            'total_price.numeric' => 'Tổng tiền phải là định dạng số.',
            'total_price.min' => 'Tổng tiền không được nhỏ hơn 0.',

            'details.array' => 'Dữ liệu chi tiết nhập hàng phải là một danh sách.',
            'details.*.variant_id.required_with' => 'Biến thể sản phẩm trong chi tiết không được để trống.',
            'details.*.variant_id.exists' => 'Biến thể sản phẩm không tồn tại.',
            
            'details.*.quantity.required_with' => 'Số lượng nhập không được để trống.',
            'details.*.quantity.integer' => 'Số lượng nhập phải là số nguyên.',
            'details.*.quantity.min' => 'Số lượng nhập ít nhất phải là 1.',
            
            'details.*.price.required_with' => 'Giá nhập không được để trống.',
            'details.*.price.numeric' => 'Giá nhập phải là định dạng số.',
        ];
    }
}
