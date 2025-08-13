@extends('layouts.app')

@section('title', 'Detail: ' . $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p class="lead">{{ $product->description }}</p>
    <div class="fs-4 fw-bold mb-3">Harga: Rp {{ number_format($product->price) }}</div>
    <a href="/products" class="btn btn-primary"> &laquo; Kembali ke Daftar Produk</a>
@endsection