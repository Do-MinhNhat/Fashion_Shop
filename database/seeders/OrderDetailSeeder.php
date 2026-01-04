<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Variant;

class OrderDetailSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::first();
        $variants = Variant::take(3)->get();

        if (!$order || $variants->isEmpty()) {
            return;
        }

        $total = 0;

        foreach ($variants as $variant) {
            $quantity = rand(1, 3);
            $price = $variant->sale_price ?? $variant->price;

            OrderDetail::create([
                'order_id' => $order->id,
                'variant_id' => $variant->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            $total += $quantity * $price;
        }

        $order->update([
            'total_price' => $total,
        ]);
    }
}
