<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Facebook',
                'url' => 'FashionShop.facebook.com',
            ],
            [
                'name' => 'Zalo',
                'url' => '0123456789',
            ],
            [
                'name' => 'Gmail',
                'url' => 'FashionShop@gmail.com',
            ],
            [
                'name' => 'Youtube',
                'url' => 'FashionShop',
            ],
        ];

        foreach ($data as $item) {
            Contact::create($item);
        }
    }
}
