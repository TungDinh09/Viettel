<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CityController;
use App\Http\Controllers\Admin\AdminController;
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
Route::get('city/all',[CityController::class,'index']);
Route::get('/city_export', [CityController::class, 'export']);
Route::get('/import', [CityController::class, 'import']);
Route::get('/login', [AdminController::class, 'login']);
Route::post("/login-admin",[AdminController::class,'loginUser']);

