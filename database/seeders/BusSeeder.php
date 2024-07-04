<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $csvPath = database_path('/csv/buses.csv');

        // Load the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0); // Set the header offset to 0 to use the first row as header

        // Iterate through the records
        foreach ($csv as $record) {
            // Insert data into the database (adjust table and fields as necessary)
            DB::table('buses')->insert([
                'name' => $record['name'],
                'v_nom' => $record['v_nom'],
                'x' => $record['x'],
                'y' => $record['y'],
            ]);
        }
    }
}
