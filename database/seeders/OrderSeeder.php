<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use App\Models\ShipStatus;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role_id', 2)->first();
        $admin = User::where('role_id', 1)->first();

        $orderStatus = OrderStatus::first();
        $shipStatus = ShipStatus::first();

        if (!$user || !$admin || !$orderStatus || !$shipStatus) {
            return;
        }

        Order::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'address' => $user->address,
            'admin_id' => $admin->id,
            'shipper_id' => null,
            'order_status_id' => $orderStatus->id,
            'ship_status_id' => $shipStatus->id,
            'total_price' => 0,
        ]);
    }
}
