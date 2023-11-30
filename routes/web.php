<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
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
// Route::get('/product', [ProductController::class, 'index']);
// Route::get('/product/{id}', [ProductController::class, 'show']);
// Route::get('/city', [CityController::class, 'index']);
// Route::get('/district', [DistrictController::class, 'index']);
// Route::get('/payment',[PaymentController::class,'index']);

//blog controller
Route::get('/blogs', [BlogController::class, 'index']);

// Route cho hiển thị form tạo mới blog (action create)
Route::get('/blogs/create', [BlogController::class, 'create']);

// Route để xử lý tạo mới blog (action store)
Route::post('/blogs', [BlogController::class, 'store']);

// Route để hiển thị thông tin của một blog (action show)
Route::get('/blogs/{id}', [BlogController::class, 'show']);

// Route để hiển thị form chỉnh sửa blog (action edit)
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);

// Route để xử lý cập nhật blog (action update)
Route::put('/blogs/{id}', [BlogController::class, 'update']);

// Route để xử lý xóa blog (action destroy)
Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);

// Route để xử lý export blog (action export)
Route::get('/blogs/export', [BlogController::class, 'export']);

//category controller


// Route cho hiển thị danh sách danh mục (action index)
Route::get('/categories', [CategoryController::class, 'index']);

// Route cho hiển thị form tạo mới danh mục (action create)
Route::get('/categories/create', [CategoryController::class, 'create']);

// Route để xử lý tạo mới danh mục (action store)
Route::post('/categories', [CategoryController::class, 'store']);

// Route để hiển thị thông tin của một danh mục (action show)
Route::get('/categories/{id}', [CategoryController::class, 'show']);

// Route để hiển thị form chỉnh sửa danh mục (action edit)
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);

// Route để xử lý cập nhật danh mục (action update)
Route::put('/categories/{id}', [CategoryController::class, 'update']);

// Route để xử lý xóa danh mục (action destroy)
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Route để xử lý xuất danh sách danh mục (action export)
Route::get('/categories/export', [CategoryController::class, 'export']);

// Route để xử lý nhập danh sách danh mục từ file (action import)
Route::post('/categories/import', [CategoryController::class, 'import']);

// channel controller

// Route cho hiển thị danh sách kênh (action index)
Route::get('/channels', [ChannelController::class, 'index']);

// Route cho hiển thị form tạo mới kênh (action create)
Route::get('/channels/create', [ChannelController::class, 'create']);

// Route để xử lý tạo mới kênh (action store)
Route::post('/channels', [ChannelController::class, 'store']);

// Route để hiển thị thông tin của một kênh (action show)
Route::get('/channels/{id}', [ChannelController::class, 'show']);

// Route để hiển thị form chỉnh sửa kênh (action edit)
Route::get('/channels/{id}/edit', [ChannelController::class, 'edit']);

// Route để xử lý cập nhật kênh (action update)
Route::put('/channels/{id}', [ChannelController::class, 'update']);

// Route để xử lý xóa kênh (action destroy)
Route::delete('/channels/{id}', [ChannelController::class, 'destroy']);

// Route để xử lý xuất danh sách kênh (action export)
Route::get('/channels/export', [ChannelController::class, 'export']);

// Route để xử lý nhập danh sách kênh từ file (action import)
Route::post('/channels/import', [ChannelController::class, 'import']);

// city controller

// Route cho hiển thị danh sách thành phố (action index)
Route::get('/cities', [CityController::class, 'index']);

// Route cho hiển thị form tạo mới thành phố (action create)
Route::get('/cities/create', [CityController::class, 'create']);

// Route để xử lý tạo mới thành phố (action store)
Route::post('/cities', [CityController::class, 'store']);

// Route để hiển thị thông tin của một thành phố (action show)
Route::get('/cities/{id}', [CityController::class, 'show']);

// Route để hiển thị form chỉnh sửa thành phố (action edit)
Route::get('/cities/{id}/edit', [CityController::class, 'edit']);

// Route để xử lý cập nhật thành phố (action update)
Route::put('/cities/{id}', [CityController::class, 'update']);

// Route để xử lý xóa thành phố (action destroy)
Route::delete('/cities/{id}', [CityController::class, 'destroy']);

// Route để xử lý xuất danh sách thành phố (action export)
Route::get('/cities/export', [CityController::class, 'export']);

// Route để xử lý nhập danh sách thành phố từ file (action import)
Route::post('/cities/import', [CityController::class, 'import']);

// district controller
Route::get('/districts', [DistrictController::class, 'index']);

// Route cho hiển thị form tạo mới quận huyện (action create)
Route::get('/districts/create', [DistrictController::class, 'create']);

// Route để xử lý tạo mới quận huyện (action store)
Route::post('/districts', [DistrictController::class, 'store']);

// Route để hiển thị thông tin của một quận huyện (action show)
Route::get('/districts/{id}', [DistrictController::class, 'show']);

// Route để hiển thị form chỉnh sửa quận huyện (action edit)
Route::get('/districts/{id}/edit', [DistrictController::class, 'edit']);

// Route để xử lý cập nhật quận huyện (action update)
Route::put('/districts/{id}', [DistrictController::class, 'update']);

// Route để xử lý xóa quận huyện (action destroy)
Route::delete('/districts/{id}', [DistrictController::class, 'destroy']);

// Route để xử lý xuất danh sách quận huyện (action export)
Route::get('/districts/export', [DistrictController::class, 'export']);

// Route để xử lý nhập danh sách quận huyện từ file (action import)
Route::post('/districts/import', [DistrictController::class, 'import']);

//order controller
Route::get('/order-form', [OrderController::class, 'showOrderForm'])->name('order.form');

// Route for processing the order form submission
Route::post('/order-form', [OrderController::class, 'submitOrderForm'])->name('order.submit-form');

// Example routes for other OrderController methods
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Routes for exporting orders
Route::get('/orders/export-backup', [OrderController::class, 'exportBackUp'])->name('orders.export-backup');
Route::get('/orders/export', [OrderController::class, 'export'])->name('orders.export');
Route::get('/orders/export-non-accept', [OrderController::class, 'exportActiveFalse'])->name('orders.export-non-accept');

// Route for importing orders
Route::post('/orders/import', [OrderController::class, 'import'])->name('orders.import');

//payment controller

// Display all payments
Route::get('/payments', [PaymentController::class, 'index']);

// Store a new payment
Route::post('/payments/store', [PaymentController::class, 'store']);

// Update an existing payment
Route::put('/payments/update/{id}', [PaymentController::class, 'update']);

// Delete a payment
Route::delete('/payments/delete/{id}', [PaymentController::class, 'destroy']);

// Export payments to Excel
Route::get('/payments/export', [PaymentController::class, 'export']);

// Import payments from Excel
Route::post('/payments/import', [PaymentController::class, 'import']);

// product controller
Route::get('/products', [ProductController::class, 'index']);

// Store a new product
Route::post('/products/store', [ProductController::class, 'store']);

// Display a specific product
Route::get('/products/show/{id}', [ProductController::class, 'show']);

// Update an existing product
Route::put('/products/update/{id}', [ProductController::class, 'update']);

// Delete a product
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);

// Export products and related data to Excel
Route::get('/products/export_backup', [ProductController::class, 'export_backup']);

// Import products from Excel
Route::post('/products/import_product', [ProductController::class, 'import_product']);

// Import payment products from Excel
Route::post('/products/import_payment_product', [ProductController::class, 'import_payment_product']);

// Import product channels from Excel
Route::post('/products/import_product_channel', [ProductController::class, 'import_product_channel']);

//service controller

Route::get('/services', [ServiceController::class, 'index']);

// Store a new service
Route::post('/services/store', [ServiceController::class, 'store']);

// Update an existing service
Route::put('/services/update/{id}', [ServiceController::class, 'update']);

// Delete a service
Route::delete('/services/delete/{id}', [ServiceController::class, 'destroy']);

// Export services to Excel
Route::get('/services/export', [ServiceController::class, 'export']);

// Import services from Excel
Route::post('/services/import', [ServiceController::class, 'import']);
