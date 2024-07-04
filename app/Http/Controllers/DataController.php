<?php

namespace App\Http\Controllers;

use App\Models\OffshoreWind;
use App\Models\OnshoreWind;
use App\Models\Photovoltaic;
use App\Models\UnifiedGeneration;
use Illuminate\Http\Request;

class DataController extends Controller
{
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
