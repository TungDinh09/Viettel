<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;

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
// require __DIR__.'/auth.php';

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
require __DIR__.'/adminauth.php';
require __DIR__.'/apirouter.php';


//-------------------- get ---------------- 
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/city', [CityController::class, 'index']);
Route::get('/district', [DistrictController::class, 'index']);
Route::get('/payment',[PaymentController::class,'index']);
Route::get('/category',[CategoryController::class,'index']);