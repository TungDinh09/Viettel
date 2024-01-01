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



Route::get('/product/detail/{id}', [ProductController::class, 'show']);
Route::post('/product/insert', [ProductController::class,"store"])->middleware('auth:admin');
Route::PATCH('/product/update/{id}',[ProductController::class, "update"])->middleware('auth:admin');

Route::delete('/product/delete/{id}', [ProductController::class,"destroy"])->middleware('auth:admin');

Route::post('/Payment/create', [PaymentController::class,"store"])->middleware('auth:admin');
Route::PATCH('/Payment/update/{id}', [PaymentController::class,"update"])->middleware('auth:admin');
Route::delete('/Payment/delete/{id}', [PaymentController::class,"destroy"])->middleware('auth:admin');

// Route::post('/Order/create', [OrderController::class,"store"]);
// Route::PATCH('/Order/update/{id}', [OrderController::class,"update"])->middleware('auth:admin');
Route::post('/order/insert', [OrderController::class, 'store']);
Route::delete('/Order/destroy/{id}', [OrderController::class,"destroy"])->middleware('auth:admin');
Route::get('/Order/accept/{id}', [OrderController::class,"Accept"])->middleware('auth:admin');
Route::get('/Order/unaccept/{id}', [OrderController::class,"UnAccept"])->middleware('auth:admin');

Route::post('/Channel/create', [ChannelController::class,"store"])->middleware('auth:admin');
Route::PATCH('/Channel/update/{id}', [ChannelController::class,"update"])->middleware('auth:admin');
Route::delete('/Channel/destroy/{id}', [ChannelController::class,"destroy"])->middleware('auth:admin');

Route::get('/blog/detail/{id}', [BlogController::class,"show"]);
Route::post('/blog/insert', [BlogController::class,"store"])->middleware('auth:admin');
Route::PATCH('/blog/update/{id}', [BlogController::class,"update"])->middleware('auth:admin');
Route::delete('/blog/destroy/{id}', [BlogController::class,"destroy"])->middleware('auth:admin');


Route::get('/category/detail/{id}', [CategoryController::class,"show"]);
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

Route::delete('/admin/delete/{id}', [AdminController::class,"destroy"])->middleware('auth:admin');

Route::get('/city/export',[CityController::class,"export"])->middleware('auth:admin');
Route::get('/district/export',[DistrictController::class,"export"])->middleware('auth:admin');
Route::get('/categories/export',[CategoryController::class,"export"])->middleware('auth:admin');
Route::get('/order/export/UnAccept',[OrderController::class,"exportUnAccept"])->middleware('auth:admin');
Route::get('/order/export/Accept',[OrderController::class,"exportAccept"])->middleware('auth:admin');
Route::get('/product/export',[ProductController::class,"export"])->middleware('auth:admin');

