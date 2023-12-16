<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/Service/create', [ServiceController::class,"store"])->middleware('auth:admin');
Route::PATCH('/Service/update/{id}', [ServiceController::class,"update"])->middleware('auth:admin');
Route::delete('/Service/destroy/{id}', [ServiceController::class,"destroy"])->middleware('auth:admin');

Route::post('/product/insert', [ProductController::class,"store"]);
Route::PATCH('/product/update/{id}', [ProductController::class,"update"])->middleware('auth:admin');
Route::delete('/product/destroy/{id}', [ProductController::class,"destroy"])->middleware('auth:admin');

Route::post('/Payment/create', [PaymentController::class,"store"])->middleware('auth:admin');
Route::PATCH('/Payment/update/{id}', [PaymentController::class,"update"])->middleware('auth:admin');
Route::delete('/Payment/delete/{id}', [PaymentController::class,"destroy"])->middleware('auth:admin');

// Route::post('/Order/create', [OrderController::class,"store"]);
Route::PATCH('/Order/update/{id}', [OrderController::class,"update"])->middleware('auth:admin');
Route::delete('/Order/destroy/{id}', [OrderController::class,"destroy"])->middleware('auth:admin');
Route::get('/Order/accept/{id}', [OrderController::class,"Accept"])->middleware('auth:admin');
Route::get('/Order/unaccept/{id}', [OrderController::class,"UnAccept"])->middleware('auth:admin');

Route::post('/Channel/create', [ChannelController::class,"store"])->middleware('auth:admin');
Route::PATCH('/Channel/update/{id}', [ChannelController::class,"update"])->middleware('auth:admin');
Route::delete('/Channel/destroy/{id}', [ChannelController::class,"destroy"])->middleware('auth:admin');

Route::post('/Blog/create', [BlogController::class,"store"])->middleware('auth:admin');
Route::PATCH('/Blog/update/{id}', [BlogController::class,"update"])->middleware('auth:admin');
Route::delete('/Blog/destroy/{id}', [BlogController::class,"destroy"])->middleware('auth:admin');


Route::get('/category/{id}', [CategoryController::class,"show"]);
Route::post('/category/insert', [CategoryController::class,"store"])->middleware('auth:admin');
Route::PATCH('/category/update/{id}', [CategoryController::class,"update"])->middleware('auth:admin');
Route::delete('/category/destroy/{id}', [CategoryController::class,"destroy"])->middleware('auth:admin');

Route::post('/distric/create', [DistrictController::class,"store"])->middleware('auth:admin');
Route::PATCH('/distric/update/{id}', [DistrictController::class,"update"])->middleware('auth:admin');
Route::delete('/distric/destroy/{id}', [DistrictController::class,"destroy"])->middleware('auth:admin');


Route::post('/city/create', [CityController::class,"store"])->middleware('auth:admin');
Route::PATCH('/city/update/{id}', [CityController::class,"update"])->middleware('auth:admin');
Route::delete('/city/destroy/{id}', [CityController::class,"destroy"])->middleware('auth:admin');

Route::get('/admins', [AdminController::class,"index"])->middleware('auth:admin');