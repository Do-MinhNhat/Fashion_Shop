<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            Image::create([
                'product_id' => $product->id,
                'url' => $product->slug . '-1.jpg',
            ]);

            Image::create([
                'product_id' => $product->id,
                'url' => $product->slug . '-2.jpg',
            ]);
        }
    }
}
