<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variant;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;

class VariantSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();

        foreach ($products as $product) {
            foreach ($colors as $color) {
                foreach ($sizes as $size) {
                    Variant::create([
                        'product_id' => $product->id,
                        'color_id' => $color->id,
                        'size_id' => $size->id,
                        'price' => rand(200000, 800000),
                        'sale_price' => rand(150000, 600000),
                        'quantity' => rand(5, 50),
                    ]);
                }
            }
        }
    }
}
