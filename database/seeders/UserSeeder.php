<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin DMS',
            'email' => 'admin@dynamics-ms.com',
            'password' => Hash::make('password'),
        ]);

        // Staff user
        User::create([
            'name' => 'Staff DMS',
            'email' => 'staff@dynamics-ms.com',
            'password' => Hash::make('password'),
        ]);
    }
}