<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 1, 'product_id' => 1, 'rating' => 5, 'comment' => 'Sản phẩm rất tốt', 'replier' => 1, 'reply' => 'Cảm ơn bạn đã mua hàng!'],
            ['user_id' => 2, 'product_id' => 2, 'rating' => 4, 'comment' => 'Chất lượng ổn', 'replier' => 1, 'reply' => 'Cảm ơn bạn đã mua hàng!'],
            ['user_id' => 3, 'product_id' => 3, 'rating' => 5, 'comment' => 'Đáng tiền', 'replier' => 1, 'reply' => 'Cảm ơn bạn đã mua hàng!'],
            ['user_id' => 4, 'product_id' => 4, 'rating' => 3, 'comment' => 'Tạm ổn', 'replier' => 1, 'reply' => 'Cảm ơn bạn đã mua hàng!'],
        ];

        foreach ($data as $item) {
            Review::create($item);
        }
    }
}
