<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;


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
//order
Route::get('/orders/{id}',[OrderController::class,'show'])->name('orders.show');
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');

//product
Route::get('/', function () {
    return redirect('products');
});
Route::resource('products',ProductController::class);
Route::post('/products/{product}', 'ProductController@update')->name('product.update');

//login
use App\Http\Controllers\AuthController;

// ...

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//// Route cho trang đăng ký
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'processRegistration']);

// Route cho trang đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);

// Route cho trang chủ sau khi đăng nhập thành công
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');