<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'name'            => 'required|string|max:255',
        'phone'           => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'address'         => 'required|string|max:500',
        'order_status_id' => 'required|exists:order_statuses,id',
        'ship_status_id'  => 'required|exists:ship_statuses,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'    => 'Tên người nhận không được để trống.',
        'phone.required'   => 'Số điện thoại không được để trống.',
        'phone.regex'      => 'Số điện thoại không đúng định dạng.',
        'address.required' => 'Địa chỉ nhận hàng không được để trống.',
        'order_status_id.exists' => 'Trạng thái đơn hàng không hợp lệ.',
        'ship_status_id.exists'  => 'Trạng thái vận chuyển không hợp lệ.',
        ];
    }
}
