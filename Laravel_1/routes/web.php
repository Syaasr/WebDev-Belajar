<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController; 
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return 'Selamat Datang di Toko Online Kami!';
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/cart', function () {
    return 'Ini adalah halaman keranjang belanja.';
});

Route::get('/checkout', function () {
    return 'Ini adalah halaman checkout.';
});