<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PowerDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/data/offshore', [DataController::class, 'getOffshoreData']);
Route::get('/data/onshore', [DataController::class, 'getOnshoreData']);
Route::get('/data/pv', [DataController::class, 'getPvData']);
Route::get('/data/unified', [DataController::class, 'getUnifiedData']);

Route::get('/power-data', [PowerDataController::class, 'index']);
