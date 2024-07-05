<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\OffshoreWind;
use App\Models\OnshoreWind;
use App\Models\Photovoltaic;
use App\Models\UnifiedGeneration;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function map()
    {
        $buses = Bus::all(['x', 'y']);
        return view('index', compact('buses'));
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
