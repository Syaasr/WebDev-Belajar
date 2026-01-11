<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// 1. Route Home (/)
Route::get('/', function () {
    return "Halo! Ini halaman Home E-Commerce Saya";
});

// 2. Route Products (/products)
Route::get('/products', [ProductController::class, 'index']);

// 3. Route Cart (/cart)
Route::get('/cart', [CartController::class, 'index']);

// 4. Route Checkout (/checkout)
Route::get('/checkout', [OrderController::class, 'checkout']);