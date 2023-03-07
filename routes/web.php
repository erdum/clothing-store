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

// Public Routes & Views
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{name?}/{sub_name?}', [CategoryController::class, 'index'])->name('category');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product');
Route::get('/featured', [ProductController::class, 'index'])->name('featured');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/login/redirect/{provider_name}', [LoginController::class, 'redirect'])->name('third_party_login');
Route::get('/login/callback', [LoginController::class, 'callback']);

Route::get('/contactus', [HomeController::class, 'terms'])->name('contact-us');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/policy', [HomeController::class, 'policy'])->name('policy');


// Private Routes & Views
Route::middleware('auth')->group(function () {
    Route::get('/orders/{id?}', [OrderController::class, 'index'])->name('order');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('post_checkout');
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart', [CartController::class, 'update']);
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
