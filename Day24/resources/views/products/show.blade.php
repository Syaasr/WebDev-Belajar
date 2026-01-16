@extends('layouts.shop')

@section('content')
<div class="container py-5">
    
    <!-- Breadcrumb or Back Button -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Toko
        </a>
    </div>

    <div class="row align-items-start">
        
        <!-- Product Image -->
        <div class="col-md-6 mb-4 mb-md-0_">
            <div class="bg-white rounded-3 shadow-sm overflow-hidden p-3">
                <img src="{{ asset('storage/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="img-fluid w-100 rounded-3" 
                     style="object-fit: cover; max-height: 500px;">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6 ps-md-5">
            <span class="badge bg-light text-dark border mb-3">
                {{ $product->category->name ?? 'Umum' }}
            </span>
            
            <h1 class="display-5 fw-bold mb-3">{{ $product->name }}</h1>
            
            <div class="mb-4">
                <span class="fs-2 fw-bold text-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                @if(rand(0,1)) 
                    <span class="text-decoration-line-through text-muted ms-2 fs-5">Rp {{ number_format($product->price * 1.2, 0, ',', '.') }}</span>
                @endif
            </div>
            
            <p class="lead text-muted mb-5">{{ $product->description }}</p>
            
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <span class="text-secondary small d-block mb-1">Stok Tersedia</span>
                    <span class="fw-bold">{{ $product->stock }} item</span>
                </div>
            </div>

            <!-- Action -->
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark btn-lg px-5 rounded-pill shadow-sm">
                    Masukkan Keranjang
                </a>
            </div>
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success mt-4 d-flex align-items-center rounded-3 bg-success-subtle text-success-emphasis border-success-subtle" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>
                        {{ session('success') }} <a href="{{ route('cart.index') }}" class="fw-bold text-decoration-underline ms-1">Lihat Keranjang</a>
                    </div>
                </div>
            @endif

            <!-- Additional Info (Static for now) -->
            <div class="mt-5 pt-4 border-top">
                <div class="row text-center text-muted small">
                    <div class="col-4">
                        <i class="bi bi-truck fs-4 mb-2 d-block"></i>
                        <span>Pengiriman Cepat</span>
                    </div>
                    <div class="col-4">
                        <i class="bi bi-shield-check fs-4 mb-2 d-block"></i>
                        <span>Garansi Asli</span>
                    </div>
                    <div class="col-4">
                        <i class="bi bi-arrow-repeat fs-4 mb-2 d-block"></i>
                        <span>Bebas Retur</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection