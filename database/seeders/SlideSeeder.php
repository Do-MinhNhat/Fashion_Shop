<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'image' => 'slide-1.jpg',
                'url' => '/products',
                'status' => 1,
            ],
            [
                'image' => 'slide-2.jpg',
                'url' => '/category/tee',
                'status' => 1,
            ],
            [
                'image' => 'slide-3.jpg',
                'url' => '/category/shoes',
                'status' => 1,
            ],
        ];

        foreach ($slides as $slide) {
            Slide::create($slide);
        }
    }
}
