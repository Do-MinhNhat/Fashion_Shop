<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
use Carbon\Carbon;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            'Đen',
            'Trắng',
            'Đỏ',
            'Xanh dương',
        ];

        foreach ($colors as $name) {
            Color::create([
                'name' => $name,
            ]);
        }
    }
}
