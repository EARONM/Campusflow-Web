<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@campusflow.com',
            'role' => 'SuperAdmin',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Campus Admin',
            'email' => 'admin@campusflow.com',
            'role' => 'CampusAdmin',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Staff User',
            'email' => 'staff@campusflow.com',
            'role' => 'Staff',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Field Tech',
            'email' => 'tech@campusflow.com',
            'role' => 'FieldTechnician',
            'password' => Hash::make('password123'),
        ]);
    }
}