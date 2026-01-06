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
       'name'     => 'required|string|max:255',
       'phone'     => 'required|digits:10',
       'address'     => 'required|string|max:255',
       'total_price'     => 'required|numeric|min:0',
       'user_id' => 'required|exists:users,id',
       'admin_id' => 'exists:users,id',
       'shipper_id'=>'exists:users,id',
       'order_status_id'=> 'required|exists:orderstatus',
       'ship_status_id'=> 'required|exists:shipstatus',
        ];
    }
    public function messages(): array
    {
           return [
        'name.required' => 'Tên không được để trống',
        'name.max' => 'Tên không được vượt quá 255 ký tự',
        'phone.required' => 'Số điện thoại không được để trống',
        'phone.digits' => 'Số điện thoại phải gồm đúng 10 chữ số',
        'address.required' => 'Địa chỉ không được để trống',
        'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
        'total_price.required' => 'Tổng tiền không được để trống',
        'total_price.numeric' => 'Tổng tiền phải là số',
        'total_price.min' => 'Tổng tiền phải lớn hơn hoặc bằng 0',
        'user_id.required' => 'Người dùng không được để trống',
        'user_id.exists' => 'Người dùng không tồn tại',
        'admin_id.exists' => 'Admin không tồn tại',
        'shipper_id.exists' => 'Shipper không tồn tại',
        'order_status_id.required' => 'Trạng thái đơn hàng không được để trống',
        'order_status_id.exists' => 'Trạng thái đơn hàng không hợp lệ',
        'ship_status_id.required' => 'Trạng thái giao hàng không được để trống',
        'ship_status_id.exists' => 'Trạng thái giao hàng không hợp lệ',

        ];
    }
}
