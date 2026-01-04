<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Áo thun nam basic',
                'description' => 'Áo thun cotton 100%, thoáng mát, dễ phối đồ.',
                'thumbnail' => 'tee.jpg',
                'rating' => 4.5,
                'view' => 120,
                'category_slug' => 'tee',
                'brand_slug' => 'canifa',
            ],
            [
                'name' => 'Quần jean slimfit',
                'description' => 'Quần jean dáng slimfit, co giãn nhẹ.',
                'thumbnail' => 'jean.jpg',
                'rating' => 4.3,
                'view' => 90,
                'category_slug' => 'pants',
                'brand_slug' => 'ivy-moda',
            ],
            [
                'name' => 'Áo khoác hoodie',
                'description' => 'Áo khoác hoodie trẻ trung, giữ ấm tốt.',
                'thumbnail' => 'hoodie.jpg',
                'rating' => 4.7,
                'view' => 150,
                'category_slug' => 'jacket',
                'brand_slug' => 'gucci',
            ],
            [
                'name' => 'Giày sneaker thể thao',
                'description' => 'Giày sneaker năng động, phù hợp đi học và đi chơi.',
                'thumbnail' => 'sneaker.jpg',
                'rating' => 4.6,
                'view' => 200,
                'category_slug' => 'shoes',
                'brand_slug' => 'chanel',
            ],
        ];

        foreach ($products as $item) {
            $category = Category::where('slug', $item['category_slug'])->first();
            $brand = Brand::where('slug', $item['brand_slug'])->first();

            if (!$category || !$brand) {
                continue;
            }

            Product::create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => $item['description'],
                'thumbnail' => $item['thumbnail'],
                'rating' => $item['rating'],
                'status' => 1,
                'view' => $item['view'],
                'category_id' => $category->id,
                'brand_id' => $brand->id,
            ]);
        }
    }
}
