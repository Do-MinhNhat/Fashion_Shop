<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'image' => 'slide-1.jpg',
                'url' => '/products',
            ],
            [
                'image' => 'slide-2.jpg',
                'url' => '/category/tee',
            ],
            [
                'image' => 'slide-3.jpg',
                'url' => '/category/shoes',
            ],
            [
                'image' => 'slide-4.jpg',
                'url' => '/category/stuff',
            ],
        ];

        foreach ($data as $item) {
            Slide::create($item);
        }
    }
}
