<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resource_types')->insert([
            [
                'name' => 'Water',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Electric',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Waste',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}