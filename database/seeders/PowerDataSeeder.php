<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PowerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function index(Request $request)
    {
        $query = PowerData::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('time', [$startDate, $endDate]);
        }

        return $query->get();
    }
}
