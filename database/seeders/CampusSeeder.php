<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campus;

class CampusSeeder extends Seeder
{
    public function run(): void
    {
        $campuses = [
            'Lobo',
            'Balayan',
            'Mabini',
            'Alangilan',
        ];

        foreach ($campuses as $campus) {
            Campus::updateOrCreate([
                'name' => $campus
            ]);
        }
    }
}