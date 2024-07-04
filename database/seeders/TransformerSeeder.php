<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class TransformerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $csvPath = database_path('/csv/transformers.csv');

        // Load the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0); // Set the header offset to 0 to use the first row as header

        // Iterate through the records
        foreach ($csv as $record) {
            // Insert data into the database (adjust table and fields as necessary)
            DB::table('transformers')->insert([
                'name' => $record['name'],
                'bus0' => $record['bus0'],
                'bus1' => $record['bus1'],
                'tap_side' => $record['tap_side'],
                'tap_position' => $record['tap_position'],
                'build_year' => $record['build_year'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
