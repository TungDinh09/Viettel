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
Route::post('/Service/create', [ServiceController::class,"store"]);
Route::PATCH('/Service/update/{id}', [ServiceController::class,"update"]);
Route::delete('/Service/destroy/{id}', [ServiceController::class,"destroy"]);

Route::post('/Product/create', [ProductController::class,"store"]);
Route::PATCH('/Product/update/{id}', [ProductController::class,"update"]);
Route::delete('/Product/destroy/{id}', [ProductController::class,"destroy"]);

Route::post('/Payment/create', [PaymentController::class,"store"]);
Route::PATCH('/Payment/update/{id}', [PaymentController::class,"update"]);
Route::delete('/Payment/destroy/{id}', [PaymentController::class,"destroy"]);

// Route::post('/Order/create', [OrderController::class,"store"]);
Route::PATCH('/Order/update/{id}', [OrderController::class,"update"]);
Route::delete('/Order/destroy/{id}', [OrderController::class,"destroy"]);
Route::get('/Order/accept/{id}', [OrderController::class,"Accept"]);
Route::get('/Order/unaccept/{id}', [OrderController::class,"UnAccept"]);

Route::post('/Channel/create', [ChannelController::class,"store"]);
Route::PATCH('/Channel/update/{id}', [ChannelController::class,"update"]);
Route::delete('/Channel/destroy/{id}', [ChannelController::class,"destroy"]);

Route::post('/Blog/create', [BlogController::class,"store"]);
Route::PATCH('/Blog/update/{id}', [BlogController::class,"update"]);
Route::delete('/Blog/destroy/{id}', [BlogController::class,"destroy"]);



Route::post('/category/create', [CategoryController::class,"store"]);
Route::PATCH('/category/update/{id}', [CategoryController::class,"update"]);
Route::delete('/category/destroy/{id}', [CategoryController::class,"destroy"]);

Route::post('/distric/create', [DistrictController::class,"store"]);
Route::PATCH('/distric/update/{id}', [DistrictController::class,"update"]);
Route::delete('/distric/destroy/{id}', [DistrictController::class,"destroy"]);

Route::post('/city/create', [CityController::class,"store"]);
Route::PATCH('/city/update/{id}', [CityController::class,"update"]);
Route::delete('/city/destroy/{id}', [CityController::class,"destroy"]);