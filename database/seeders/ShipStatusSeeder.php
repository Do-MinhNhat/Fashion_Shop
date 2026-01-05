<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipStatus;

class ShipStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Chưa giao',
            'Đang giao',
            'Đã giao',
            'Giao thất bại',
        ];

        foreach ($statuses as $name) {
            ShipStatus::create([
                'name' => $name,
            ]);
        }
    }
}
