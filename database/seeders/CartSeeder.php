<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $carts = [
            [
                'user_id' => 1,
                'total_price' => 500000,
            ],
            [
                'user_id' => 2,
                'total_price' => 750000,
            ],
            [
                'user_id' => 3,
                'total_price' => 320000,
            ],
            [
                'user_id' => 4,
                'total_price' => 900000,
            ],
        ];

        foreach ($carts as $item) {
            Cart::create([
                'user_id' => $item['user_id'],
                'total_price' => $item['total_price'],
            ]);
        }
    
    }
}
