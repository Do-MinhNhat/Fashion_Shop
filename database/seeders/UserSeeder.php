<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nguyen Hoang Huy',
                'email' => 'huy@gmail.com',
                'role_id' => 1,
                'phone' => '0123456789',
                'gender' => 'male',
                'address' => 'TP Hồ Chí Minh',
                'review' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Do Minh Nhat',
                'email' => 'nhat@gmail.com',
                'role_id' => 1,
                'phone' => '0912345678',
                'gender' => 'male',
                'address' => 'TP Hồ Chí Minh',
                'review' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Truong Manh Cuong',
                'email' => 'cuong@gmail.com',
                'role_id' => 1,
                'phone' => '0912345678',
                'gender' => 'male',
                'address' => 'TP Hồ Chí Minh',
                'review' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Nguyen Thanh Duong',
                'email' => 'duong@gmail.com',
                'role_id' => 1,
                'phone' => '0912345678',
                'gender' => 'male',
                'address' => 'TP Hồ Chí Minh',
                'review' => 1,
                'status' => 1,
            ],
        ];

        foreach ($users as $item) {
            User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('1'),
                'remember_token' => Str::random(10),
                'role_id' => $item['role_id'],
                'phone' => $item['phone'],
                'gender' => $item['gender'],
                'address' => $item['address'],
                'review' => $item['review'],
                'status' => $item['status'],
            ]);
        }
    }
}
