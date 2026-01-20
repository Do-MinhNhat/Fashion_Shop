<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipStatus;

class ShipStatusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name'=>'Chưa có Shipper'],
            ['name'=>'Đang giao'],
            ['name'=>'Đã giao'],
            ['name'=>'Giao thất bại'],
        ];

        foreach ($data as $item) {
            ShipStatus::create($item);
        }
    }
}
