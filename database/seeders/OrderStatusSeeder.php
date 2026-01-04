<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Chờ xác nhận',
            'Đã xác nhận',
            'Đang xử lý',
            'Hoàn thành',
            'Đã hủy',
        ];

        foreach ($statuses as $name) {
            OrderStatus::create([
                'name' => $name,
            ]);
        }
    }
}
