<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;


Route::get('/', [DataController::class, 'index']);

Route::get('/data/offshore', [DataController::class, 'getOffshoreData']);
Route::get('/data/onshore', [DataController::class, 'getOnshoreData']);
Route::get('/data/pv', [DataController::class, 'getPvData']);
Route::get('/data/unified', [DataController::class, 'getUnifiedData']);


Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.us');
