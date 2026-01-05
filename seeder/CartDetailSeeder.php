<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $cartIds = Cart::pluck('id')->toArray();
        $variantIds = Variant::pluck('id')->toArray();

        $data = [
            ['cart_id' => $cartIds[0], 'variant_id' => $variantIds[0], 'quantity' => 2],
            ['cart_id' => $cartIds[0], 'variant_id' => $variantIds[1], 'quantity' => 1],
            ['cart_id' => $cartIds[1], 'variant_id' => $variantIds[2], 'quantity' => 3],
            ['cart_id' => $cartIds[1], 'variant_id' => $variantIds[3], 'quantity' => 1],
        ];

        foreach ($data as $item) {
            CartDetail::create($item);
        }
    
    }
}
