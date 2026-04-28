<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@campusflow.com'],
            [
                'name' => 'Super Admin',
                'role' => 'Superadmin',
                'campus' => 'All',
                'password' => Hash::make('password123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@campusflow.com'],
            [
                'name' => 'Campus Admin',
                'role' => 'Admin',
                'campus' => 'Main Campus',
                'password' => Hash::make('password123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@campusflow.com'],
            [
                'name' => 'Staff User',
                'role' => 'Staff',
                'campus' => 'Main Campus',
                'password' => Hash::make('password123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'tech@campusflow.com'],
            [
                'name' => 'Tech User',
                'role' => 'Tech',
                'campus' => 'Main Campus',
                'password' => Hash::make('password123'),
            ]
        );
    }
}