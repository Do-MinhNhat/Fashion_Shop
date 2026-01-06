<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ];
    }
    public function messages(): array
    {
        return [
            'rating.required' => 'Vui lòng chọn số sao đánh giá.',
            'rating.integer'  => 'Đánh giá phải là số nguyên.',
            'rating.min'      => 'Đánh giá thấp nhất là 1 sao.',
            'rating.max'      => 'Đánh giá cao nhất là 5 sao.',
            'comment.string'  => 'Nội dung bình luận phải là chuỗi ký tự.',
            'comment.max'     => 'Nội dung bình luận không được vượt quá 1000 ký tự.',
        ];
    }
}
