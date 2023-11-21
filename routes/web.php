<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';

//-------------------- get ---------------- 
Route::get('/product', [ProductController::class, 'index']);
Route::get('/city', [CityController::class, 'index']);
Route::get('/district', [DistrictController::class, 'index']);
Route::get('/payment',[PaymentController::class,'index']);