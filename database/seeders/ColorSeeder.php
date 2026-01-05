<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
use Carbon\Carbon;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Đen'],
            ['name' => 'Trắng'],
            ['name' => 'Đỏ'],
            ['name' => 'Xanh dương'],
        ];

        foreach ($data as $item) {
            Color::create($item);
        }
    }
}
