<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
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

// Views
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/product/{product_id}', [ProductController::class, 'index']);
Route::get('/category/{category_name?}/{sub_category_name?}', [CategoryController::class, 'index']);
Route::get('/orders/{order_id?}', [OrderController::class, 'index']);
Route::get('/terms', [HomeController::class, 'terms']);
Route::get('/policy', [HomeController::class, 'policy']);

// Actions
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'update']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/login/redirect/{provider_name}', [LoginController::class, 'redirect']);
Route::post('/login/callback', [LoginController::class, 'callback']);
Route::post('/logout', [LoginController::class, 'logout']);
