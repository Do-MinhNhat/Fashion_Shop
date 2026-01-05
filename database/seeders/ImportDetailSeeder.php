<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $importIds = Import::pluck('id')->toArray();
        $variantIds = Variant::pluck('id')->toArray();

        $data = [
            ['import_id' => $importIds[0], 'variant_id' => $variantIds[0], 'quantity' => 50, 'price' => 200000],
            ['import_id' => $importIds[0], 'variant_id' => $variantIds[1], 'quantity' => 30, 'price' => 250000],
            ['import_id' => $importIds[1], 'variant_id' => $variantIds[2], 'quantity' => 40, 'price' => 220000],
            ['import_id' => $importIds[1], 'variant_id' => $variantIds[3], 'quantity' => 20, 'price' => 270000],
        ];

        foreach ($data as $item) {
            ImportDetail::create($item);
        }
    
    }
}
