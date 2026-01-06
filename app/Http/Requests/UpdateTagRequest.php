<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
        $id = $this->route('tag')->id;
        return [
            'name' => 'required|string|max:255|unique:tags,name,' . $id,
            'slug' => 'required|string|max:255|unique:tags,slug,' . $id,
        ];
    }
    public function messages(): array
    {
        return [
            'name.max'      => 'Tên tag tối đa 255 ký tự',
            'name.unique'   => 'Tên tag đã tồn tại',
            'slug.max'      => 'Slug tối đa 255 ký tự',
            'slug.unique'   => 'Slug đã tồn tại',
        ];
    }
}
