<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'SuperAdmin',
            'CampusAdmin',
            'Staff',
            'FieldTechnician',
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role
            ]);
        }
    }
}