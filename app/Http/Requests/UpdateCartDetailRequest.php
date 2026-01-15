<?php

namespace App\Http\Requests;

use App\Models\CartDetail; // Nhớ import model này
use App\Models\Variant;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // 1. Lấy ID của chi tiết giỏ hàng đang sửa từ URL
        $cartDetailId = $this->route('id'); 
        
        // 2. Tìm chi tiết giỏ hàng trong DB
        $cartDetail = CartDetail::find($cartDetailId);

        $stock = 0;

        // 3. Xác định biến thể nào cần check tồn kho
        if ($this->has('new_variant_id')) {
            // Trường hợp A: Đổi sang biến thể mới (Màu/Size khác)
            $variantId = $this->input('new_variant_id');
            $stock = Variant::find($variantId)?->quantity ?? 0;
        } elseif ($cartDetail) {
            // Trường hợp B: Chỉ tăng giảm số lượng của biến thể hiện tại
            // Lấy tồn kho của biến thể đang nằm trong CartDetail
            $stock = $cartDetail->variant->quantity ?? 0;
        }

        return [
            'user_id' => 'prohibited',
            // Chỉ validate tồn tại nếu người dùng gửi lên (để đổi màu/size)
            'new_variant_id' => 'sometimes|exists:variants,id',
            
            // Validate số lượng:
            // - min:1 (tối thiểu 1)
            // - max:$stock (không được vượt quá tồn kho)
            'quantity' => 'required|integer|min:1|max:' . $stock,
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.prohibited' => 'Bạn không được phép thay đổi chủ giỏ hàng',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng sản phẩm tối thiểu phải là 1.',
            // Custom câu thông báo lỗi khi vượt quá tồn kho
            'quantity.max' => 'Số lượng vượt quá tồn kho (Hiện chỉ còn :max sản phẩm).', 
        ];
    }
}