@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Produk Kami</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            
                            <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}</p>
                            
                            <div class="mt-auto">
                                <p class="card-text fs-5 fw-bold text-primary">Rp {{ number_format($product->price) }}</p>
                                
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-success w-100">
                                        Tambah ke Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection