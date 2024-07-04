<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Generator;
use App\Models\OffshoreWind;
use App\Models\OnshoreWind;
use App\Models\Photovoltaic;
use App\Models\Transformer;
use App\Models\UnifiedGeneration;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        // Fetch all buses' coordinates
        $buses = Bus::all(['x', 'y']);

        // Fetch all generators' coordinates
        $generators = Generator::all();

        // Fetch all transformers' coordinates
        $transformers = Transformer::alL();

        // Pass data to the view
        return view('index', compact('buses', 'generators', 'transformers'));
    }

    public function getOffshoreData()
    {
        return OffshoreWind::all();
    }

    public function getOnshoreData()
    {
        return OnshoreWind::all();
    }

    public function getPvData()
    {
        return Photovoltaic::all();
    }

    public function getUnifiedData()
    {
        return UnifiedGeneration::all();
    }
}
