<?php

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

Route::get('/', [\App\Http\Controllers\PizzaController::class,'index']);

Route::get('/pizzas',[\App\Http\Controllers\PizzaController::class,'show']);
Route::get('/pizzas/create',[\App\Http\Controllers\PizzaController::class,'create']);
Route::post('/pizzas/create',[\App\Http\Controllers\PizzaController::class,'store']);
Route::get('/pizzas/orders',[\App\Http\Controllers\OrderController::class,'index']);
Route::get('/pizzas/{id}',[\App\Http\Controllers\PizzaController::class,'showOne']);
Route::get('pizzas/orders/noOrders',[\App\Http\Controllers\OrderController::class,'noOrder']);
Route::delete('/pizzas/orders/{id}', [\App\Http\Controllers\OrderController::class,'deleteOrder']);
Route::get('/pizzas/orders/{id}', [\App\Http\Controllers\OrderController::class,'changeOrderStatus']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
