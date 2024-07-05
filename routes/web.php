<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DataController::class, 'index'])->name('home');
Route::get('/map', [DataController::class, 'map'])->name('map');
Route::get('/dashboard', [DataController::class, 'dashboard'])->name('dashboard');
Route::get('/graph', [DataController::class, 'graph'])->name('graph');

Route::get('/data/offshore', [DataController::class, 'getOffshoreData']);
Route::get('/data/onshore', [DataController::class, 'getOnshoreData']);
Route::get('/data/pv', [DataController::class, 'getPvData']);
Route::get('/data/unified', [DataController::class, 'getUnifiedData']);


