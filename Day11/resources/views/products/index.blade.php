@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Daftar Produk</h2>

    <div class="row">
        @foreach($products as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Gambar">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text text-muted">Rp {{ number_format($item->price) }}</p>
                        <a href="#" class="btn btn-primary w-100">Beli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection