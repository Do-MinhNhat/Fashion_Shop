<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
=======
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Variant;

class OrderDetailSeeder extends Seeder
{
    public function run(): void
    {
       $data = [
            ['order_id' => 1, 'variant_id' => 1, 'quantity' => 1, 'price' => 499000],
            ['order_id' => 2, 'variant_id' => 1, 'quantity' => 2, 'price' => 499000],
            ['order_id' => 3, 'variant_id' => 3, 'quantity' => 1, 'price' => 350000],
            ['order_id' => 4, 'variant_id' => 4, 'quantity' => 1, 'price' => 200000],
        ];

        foreach ($data as $item) {
            OrderDetail::create($item);
        }
>>>>>>> 8f1f8c4ee490de5ca1b4469fa863122e3f1bce93
    }
}
