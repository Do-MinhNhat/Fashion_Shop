<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Áo thun', 'slug' => Str::slug('Áo thun')],
            ['name' => 'Quần jeans', 'slug' => Str::slug('Quần jeans')],
            ['name' => 'Thời trang nam', 'slug' => Str::slug('Thời trang nam')],
            ['name' => 'Thời trang nữ', 'slug' => Str::slug('Thời trang nữ')],
        ];

        foreach ($data as $item) {
            Tag::create($item);
        }
    }
}
