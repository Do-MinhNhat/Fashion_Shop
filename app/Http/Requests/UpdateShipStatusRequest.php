<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipStatusRequest extends FormRequest
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
        $id = $this->route('ship_status');
        return [
            'name' => 'required|string|max:100|unique:ship_statuses,name,' . $id
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên trạng thái giao hàng không được để trống.',
        'name.unique'   => 'Tên trạng thái giao hàng này đã tồn tại.',
        ];
    }
}
