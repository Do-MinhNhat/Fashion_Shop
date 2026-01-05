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
        $data = [
            ['product_id' => 1, 'url' => 'product-1.png'],
            ['product_id' => 2, 'url' => 'product-2.png'],
            ['product_id' => 3, 'url' => 'product-3.png'],
            ['product_id' => 4, 'url' => 'product-4.png'],
        ];

        foreach ($data as $item) {
            Image::create($item);
        }
    }
}
