<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,
            UserSeeder::class,

            CategorySeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,

            ProductSeeder::class,
            VariantSeeder::class,
            ImageSeeder::class,

            SlideSeeder::class,

            OrderStatusSeeder::class,
            ShipStatusSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
        ]);
    }
}
