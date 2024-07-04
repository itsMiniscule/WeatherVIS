<?php

namespace App\Http\Controllers;

use App\Models\PowerData;
use Illuminate\Http\Request;

class PowerDataController extends Controller
{
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

