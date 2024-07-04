<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PowerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // Add your data here from the spreadsheet
            ['time' => '2020-01-01 00:00:00', 'offshore_wind_electricity' => 3503.058, 'offshore_wind_speed' => 8.25, 'offshore_mwh' => 2072, 'onshore_wind_electricity' => 411.554, 'onshore_wind_speed' => 5.916, 'onshore_mwh' => 86, 'sun_electricity' => 0, 'irradiance_direct' => 0, 'irradiance_diffuse' => 0, 'temperature' => 2.692, 'sun_mwh' => 0, 'total_supply' => 2158, 'peak_demand' => 3500, 'load_percentage' => 20, 'demand_mwh' => 700, 'surplus_shortage' => 1458],
            // Add more rows here
        ];

        foreach ($data as $row) {
            \App\Models\PowerData::create($row);
        }
    }
}
