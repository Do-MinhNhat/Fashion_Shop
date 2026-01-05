<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $userIds = User::pluck('id')->toArray();

        $data = [
            ['user_id' => $userIds[0], 'total_price' => 15000000],
            ['user_id' => $userIds[1], 'total_price' => 12000000],
            ['user_id' => $userIds[2], 'total_price' => 18000000],
            ['user_id' => $userIds[3], 'total_price' => 10000000],
        ];

        foreach ($data as $item) {
            Import::create($item);
        }
    }
}
