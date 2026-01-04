<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        $data = [
            ['user_id' => $userIds[0], 'product_id' => $productIds[0], 'rating' => 5, 'comment' => 'Sản phẩm rất tốt'],
            ['user_id' => $userIds[1], 'product_id' => $productIds[1], 'rating' => 4, 'comment' => 'Chất lượng ổn'],
            ['user_id' => $userIds[2], 'product_id' => $productIds[2], 'rating' => 5, 'comment' => 'Đáng tiền'],
            ['user_id' => $userIds[3], 'product_id' => $productIds[3], 'rating' => 3, 'comment' => 'Tạm ổn'],
        ];

        foreach ($data as $item) {
            Review::create($item);
        }
    }
}
