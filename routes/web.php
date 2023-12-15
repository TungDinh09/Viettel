<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;

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
Route::post('/product/filter',[ProductController::class, 'filter']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/channel', [ChannelController::class, 'index']);
Route::get('/service', [ServiceController::class, 'index']);
Route::post('/order/insert', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);