<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
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
        $orderStatusId = $this->route('order_status');
        return [
            'name' => 'required|string|max:255|unique:order_statuses,name,' . $orderStatusId,
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên trạng thái không được để trống.',
            'name.string'   => 'Tên trạng thái phải là chuỗi ký tự.',
            'name.max'      => 'Tên trạng thái không được vượt quá 255 ký tự.',
            'name.unique'   => 'Tên trạng thái này đã tồn tại.',
        ];
    }
}
