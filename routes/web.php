<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\OrderController;

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

//blog controller
Route::get('/blogs', [BlogController::class, 'index']);
// Route cho hiển thị danh sách danh mục (action index)
Route::get('/categories', [CategoryController::class, 'index']);

// Route cho hiển thị form tạo mới danh mục (action create)


// Route cho hiển thị danh sách kênh (action index)
Route::get('/channels', [ChannelController::class, 'index']);

// Route cho hiển thị form tạo mới kênh (action create)

// city controller

// Route cho hiển thị danh sách thành phố (action index)
Route::get('/cities', [CityController::class, 'index']);

// Route cho hiển thị form tạo mới thành phố (action create)


// district controller
Route::get('/districts', [DistrictController::class, 'index']);

//payment controller

// Display all payments
Route::get('/payments', [PaymentController::class, 'index']);



// product controller
//service controller

Route::get('/services', [ServiceController::class, 'index']);