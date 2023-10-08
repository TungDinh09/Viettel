<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

// Route::get('/city_export', [CityController::class, 'export']);
// Route::get('/city_import', [CityController::class, 'import']);