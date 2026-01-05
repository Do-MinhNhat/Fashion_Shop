<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use App\Models\ShipStatus;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'name' => 'Nguyễn Văn Hải',
                'phone' => '0905123456',
                'address' => '123 Lê Duẩn, Đà Nẵng',
                'admin_id' => 1,
                'shipper_id' => 2,
                'order_status_id' => 1,
                'ship_status_id' => 1,
                'total_price' => 499000
            ],
            [
                'user_id' => 1,
                'name' => 'Nguyễn Văn Hải',
                'phone' => '0905123456',
                'address' => '123 Lê Duẩn, Đà Nẵng',
                'admin_id' => 1,
                'shipper_id' => 2,
                'order_status_id' => 4,
                'ship_status_id' => 3,
                'total_price' => 998000
            ],
            [
                'user_id' => 3,
                'name' => 'Trần Thị Thu Thảo',
                'phone' => '0914888999',
                'address' => '456 Cách Mạng Tháng 8, TP HCM',
                'admin_id' => 1,
                'shipper_id' => 2,
                'order_status_id' => 2,
                'ship_status_id' => 2,
                'total_price' => 350000
            ],
            [
                'user_id' => 4,
                'name' => 'Lê Minh Tâm',
                'phone' => '0935111222',
                'address' => '78 Phan Chu Trinh, Hà Nội',
                'admin_id' => 1,
                'shipper_id' => 2,
                'order_status_id' => 1,
                'ship_status_id' => 1,
                'total_price' => 200000
            ],
        ];

        foreach ($data as $item) {
            Order::create($item);
        }
    }
}
