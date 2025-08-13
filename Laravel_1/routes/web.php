<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController; 
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/cart', function () {
    return 'Ini adalah halaman keranjang belanja.';
});

Route::get('/checkout', function () {
    return 'Ini adalah halaman checkout.';
});