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
          'user_id'     => 'required|exists:users,id',
            'total_price' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'Người tạo phiếu nhập không được để trống',
            'user_id.exists'   => 'Người dùng không tồn tại',

            'total_price.required' => 'Tổng tiền không được để trống',
            'total_price.numeric'  => 'Tổng tiền phải là số',
            'total_price.min'      => 'Tổng tiền phải lớn hơn hoặc bằng 0',
        ];
    }
}
