<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LoyaltysController;

Route::get('/', function () {
    return view('index');
});

Route::post('/', [CustomersController::class, 'authenticate']);
Route::get('/home', [CustomersController::class, 'home']);
Route::get('/logout', [CustomersController::class, 'logout']);
Route::post('/loginPost', [CustomersController::class, 'authenticate']);

Route::get('/orders_user', [OrdersController::class, 'orders_user']);
Route::post('/products_add', [OrdersController::class, 'products_add']);
Route::post('/orders_delete', [OrdersController::class, 'orders_delete']);
Route::get('/orders_store', [OrdersController::class, 'orders_store']);
Route::get('/orders_cancel', [OrdersController::class, 'orders_cancel']);


Route::resource('customers', CustomersController::class);
Route::resource('products', ProductsController::class);
Route::resource('orders', OrdersController::class);
Route::resource('loyaltys', LoyaltysController::class);



