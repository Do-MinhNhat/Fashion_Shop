<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Admin',
            'User',
        ];

        foreach ($roles as $name) {
            Role::create([
                'name' => $name,
            ]);
        }
    }
}
