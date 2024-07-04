<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class GeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $csvPath = database_path('/csv/generators.csv');

        // Load the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0); // Set the header offset to 0 to use the first row as header

        // Iterate through the records
        foreach ($csv as $record) {
            // Insert data into the database (adjust table and fields as necessary)
            DB::table('generators')->insert([
                'name' => $record['name'],
                'bus' => $record['bus'],
                'p_nom' => $record['p_nom'],
                'carrier' => $record['carrier'],
                'build_year' => $record['build_year'],
                'min_up_time' => $record['min_up_time'],
                'min_down_time' => $record['min_down_time'],
                'up_time_before' => $record['up_time_before'],
                'down_time_before' => $record['down_time_before'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
