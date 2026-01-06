<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
          'name' => 'required|string|max:255|unique:tags,name',
            'slug' => 'required|string|max:255|unique:tags,slug',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên tag không được để trống',
            'name.max'      => 'Tên tag tối đa 255 ký tự',
            'name.unique'   => 'Tên tag đã tồn tại',

            'slug.required' => 'Slug không được để trống',
            'slug.max'      => 'Slug tối đa 255 ký tự',
            'slug.unique'   => 'Slug đã tồn tại',
        ];
    }
}
