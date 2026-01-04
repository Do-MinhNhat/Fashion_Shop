<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;
use App\Models\Category;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $clothingSizes = ['S', 'M', 'L', 'XL'];
        $shoeSizes = ['38', '39', '40', '41', '42'];

        $categories = Category::all()->keyBy('slug');

        foreach (['tee', 'jacket', 'pants'] as $slug) {
            if (!isset($categories[$slug])) continue;

            foreach ($clothingSizes as $size) {
                Size::firstOrCreate([
                    'name' => $size,
                    'category_id' => $categories[$slug]->id,
                ]);
            }
        }

        if (isset($categories['shoes'])) {
            foreach ($shoeSizes as $size) {
                Size::firstOrCreate([
                    'name' => $size,
                    'category_id' => $categories['shoes']->id,
                ]);
            }
        }
    }
}
