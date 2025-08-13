@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h1>Daftar Produk</h1>
    <ul class="list-group">
        @foreach ($products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                <span>Rp {{ number_format($product->price) }}</span>
            </li>
        @endforeach
    </ul>
@endsection