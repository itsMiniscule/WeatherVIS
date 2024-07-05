<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producers = [
            [
                'energy_type' => 'wind',
                'generated_energy' => 300,
                'y' => 51.716075,
                'x' => 2.985109,
            ],
            [
                'energy_type' => 'solar',
                'generated_energy' => 200,
                'y' => 51.441069,
                'x' => 3.700762,
            ],
            [
                'energy_type' => 'hydro',
                'generated_energy' => 300,
                'y' => 51.368113,
                'x' => 3.789581,
            ],
        ];

        foreach ($producers as $producer) {
            \App\Models\Producer::create($producer);
        }
    }
}
