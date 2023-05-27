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
use App\Http\Controllers\AdminPanelController;

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

// Private Routes & Views
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin-panel');
    Route::get('/admin/add/product', [AdminPanelController::class, 'add_product'])->name('add-product');
    Route::get('/admin/edit/product/{product_id}', [AdminPanelController::class, 'edit_product'])->name('edit-product');
    Route::post('/admin/save/product', [AdminPanelController::class, 'save_product'])->name('save-product');

    Route::get('/admin/categories', [AdminPanelController::class, 'categories'])->name('admin-categories');
    Route::get('/admin/add/category', [AdminPanelController::class, 'add_category'])->name('add-category');
    Route::get('/admin/edit/category/{category_id}', [AdminPanelController::class, 'edit_category'])->name('edit-category');
    Route::post('/admin/save/category', [AdminPanelController::class, 'save_category'])->name('save-category');
    Route::get('/admin/delete/category/{category_id}', [AdminPanelController::class, 'delete_category'])->name('delete-category');

    Route::get('/admin/orders', [AdminPanelController::class, 'orders'])->name('admin-orders');
    Route::get('/admin/users', [AdminPanelController::class, 'users'])->name('admin-users');
    Route::get('/admin/site', [AdminPanelController::class, 'site'])->name('admin-site');

    Route::get('/orders/{id?}', [OrderController::class, 'index'])->name('order');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('post_checkout');
    
    Route::post('/cart', [CartController::class, 'update'])->name('cart');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Public Routes & Views
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'post'])->name('login_post');

Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
Route::post('/signup', [LoginController::class, 'signup_post'])->name('signup_post');

Route::get('/login/redirect/{provider_name}', [LoginController::class, 'redirect'])->name('third_party_login');
Route::get('/login/callback', [LoginController::class, 'callback']);

Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/policy', [HomeController::class, 'policy'])->name('policy');

Route::get('/product/{id}', [ProductController::class, 'index'])->name('product');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
Route::get('/{category?}/{sub_category?}', [HomeController::class, 'index'])->name('home');
