@extends('layouts.shop')

@section('content')
<div class="container px-4 px-lg-5 my-5">
    
    {{-- TAMBAHAN: Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            &laquo; Kembali ke Toko
        </a>
    </div>

    <div class="row gx-4 gx-lg-5 align-items-center">
        
        {{-- Kolom Kiri: Gambar Produk --}}
        <div class="col-md-6">
            <img class="card-img-top mb-5 mb-md-0" 
                 src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 style="object-fit: cover; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);" />
        </div>

        {{-- Kolom Kanan: Informasi Produk --}}
        <div class="col-md-6">
            {{-- Kategori (Kecil di atas) --}}
            <div class="small mb-1 text-muted">Kategori: {{ $product->category->name ?? 'Umum' }}</div>
            
            {{-- Judul Produk --}}
            <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
            
            {{-- Harga --}}
            <div class="fs-5 mb-5">
                <span class="text-decoration-line-through text-muted me-2">Rp {{ number_format($product->price * 1.2, 0, ',', '.') }}</span> {{-- Coret harga (marketing trick) --}}
                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>
            
            {{-- Deskripsi --}}
            <p class="lead">{{ $product->description }}</p>
            
            {{-- Info Stok --}}
            <p class="text-secondary">Stok Tersedia: <strong>{{ $product->stock }}</strong> item</p>

            {{-- Form Tambah ke Keranjang --}}
            <div class="d-flex">
                {{-- Kita gunakan tag <a> yang mengarah ke route 'cart.add' --}}
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-outline-dark flex-shrink-0">
                    <i class="bi-cart-fill me-1"></i>
                    Masukkan Keranjang
                </a>
            </div>
            
            {{-- Menampilkan Pesan Sukses jika berhasil masuk keranjang --}}
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }} <br>
                    <a href="{{ route('cart.index') }}" class="fw-bold text-success">Lihat Keranjang &raquo;</a>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection