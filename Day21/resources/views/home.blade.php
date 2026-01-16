@extends('layouts.shop')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Laravel Shop!</h1>
        <p class="fs-4">Temukan produk terbaik dengan harga terjangkau.</p>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Produk Terbaru</h2>
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    {{-- LOOPING MULAI DISINI --}}
                    @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            
                            {{-- Gambar Produk --}}
                            {{-- Kita pakai asset('storage/...') untuk mengambil gambar dari folder public --}}
                            <img class="card-img-top" 
                                src="{{ asset('storage/' . $product->image) }}" 
                                alt="{{ $product->name }}" 
                                style="height: 200px; object-fit: cover;" />
                            
                            {{-- Detail Produk --}}
                            <div class="card-body p-4">
                                <div class="text-center">
                                    {{-- Nama Produk --}}
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    
                                    {{-- Harga (Format Rupiah) --}}
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                            
                            {{-- Tombol Aksi --}}
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('product.show', $product->id) }}">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- LOOPING SELESAI --}}

                    {{-- Jika tidak ada produk --}}
                    @if($products->isEmpty())
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum ada produk yang tersedia.</p>
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Belanja Sekarang</a>
    </div>
@endsection