<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Campus;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'SuperAdmin')->first();
        $campusAdminRole = Role::where('name', 'CampusAdmin')->first();
        $staffRole = Role::where('name', 'Staff')->first();
        $fieldTechRole = Role::where('name', 'FieldTechnician')->first();

        $loboCampus = Campus::where('name', 'Lobo')->first();

        User::updateOrCreate(
            ['email' => 'superadmin@test.com'],
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'role_id' => $superAdminRole?->id,
                'campus_id' => null,
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Campus Admin',
                'username' => 'campusadmin',
                'role_id' => $campusAdminRole?->id,
                'campus_id' => $loboCampus?->id,
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@test.com'],
            [
                'name' => 'Staff User',
                'username' => 'staff',
                'role_id' => $staffRole?->id,
                'campus_id' => $loboCampus?->id,
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'tech@test.com'],
            [
                'name' => 'Field Technician',
                'username' => 'tech',
                'role_id' => $fieldTechRole?->id,
                'campus_id' => $loboCampus?->id,
                'password' => Hash::make('password'),
            ]
        );
    }
}