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
        return view('/index');
    }

    public function map()
    {
        $buses = Bus::all(['x', 'y']);
        return view('map', compact('buses'));
    }

    public function dashboard(Request $request)
    {
        if ($request->expectsJson()) {
            $buses = Bus::all();
            foreach ($buses as $bus) {
                $bus->random_production = rand(15, 450);
            }
            return response()->json([
                'buses' => $buses,
                'offshore' => $this->generateRandomData(),
                'onshore' => $this->generateRandomData(),
                'pv' => $this->generateRandomData(),
                'unified' => $this->generateRandomData()
            ]);
        }

        return view('dashboard');
    }

    public function graph()
    {
        $offshore = $this->generateRandomData();
        $onshore = $this->generateRandomData();
        $pv = $this->generateRandomData();
        $unified = $this->generateRandomData();

        return view('graph', compact('offshore', 'onshore', 'pv', 'unified'));
    }

    public function about()
    {
        return view('about');
    }

    public function getOffshoreData()
    {
        return $this->generateRandomData();
    }

    public function getOnshoreData()
    {
        return $this->generateRandomData();
    }

    public function getPvData()
    {
        return $this->generateRandomData();
    }

    public function getUnifiedData()
    {
        return $this->generateRandomData();
    }

    private function generateRandomData()
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'id' => $i + 1,
                'production' => rand(1, 100000),
                'date' => now()->subDays($i)->toDateString()
            ];
        }
        return $data;
    }
}
