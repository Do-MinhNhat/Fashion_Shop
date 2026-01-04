<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;
use App\Models\Category;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        // Size cho ÁO, QUẦN
        $clothingSizes = ['S', 'M', 'L', 'XL'];

        // Size cho GIÀY
        $shoeSizes = ['38', '39', '40', '41', '42'];

        $categories = Category::all()->keyBy('slug');

        // Áo thun, Áo khoác, Quần
        foreach (['tee', 'jacket', 'pants'] as $slug) {
            if (!isset($categories[$slug])) continue;

            foreach ($clothingSizes as $size) {
                Size::create([
                    'name' => $size,
                    'category_id' => $categories[$slug]->id,
                ]);
            }
        }

        // Giày
        if (isset($categories['shoes'])) {
            foreach ($shoeSizes as $size) {
                Size::create([
                    'name' => $size,
                    'category_id' => $categories['shoes']->id,
                ]);
            }
        }
    }
}
