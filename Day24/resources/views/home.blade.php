@extends('layouts.shop')

@section('content')
    <!-- Hero Section -->
    <section class="bg-white border-bottom mb-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-3">Temukan Kebutuhan Anda <br>di Satu Tempat.</h1>
                    <p class="lead text-muted mb-4">Kami menyediakan berbagai produk berkualitas untuk segala kebutuhan harian Anda. Belanja mudah, cepat, dan terpercaya.</p>
                    <a href="#products" class="btn btn-dark btn-lg px-4 rounded-pill">Mulai Belanja</a>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <!-- Universal Banner Image -->
                    <img src="{{ asset('hero.png') }}" class="img-fluid rounded-3 shadow-sm" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mb-5" id="products">
        <div class="row">
            <!-- Sidebar Filter (Dynamic) -->
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm sticky-top" style="top: 80px; z-index: 100;">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Kategori</h5>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('home') }}" class="list-group-item list-group-item-action border-0 px-0 fw-bold {{ request('category_id') ? 'text-muted' : 'text-dark' }}">Semua Produk</a>
                            
                            @foreach($categories as $category)
                                <a href="{{ route('home', ['category_id' => $category->id]) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0 {{ request('category_id') == $category->id ? 'fw-bold text-dark' : 'text-muted' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach

                            @if($categories->isEmpty())
                                <small class="text-muted fst-italic">Belum ada kategori.</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold m-0">Produk Terbaru</h4>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Urutkan
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                            <li><a class="dropdown-item" href="#">Harga Terendah</a></li>
                            <li><a class="dropdown-item" href="#">Harga Tertinggi</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                    @foreach($products as $product)
                    <div class="col">
                        <div class="card h-100 overflow-hidden">
                            <!-- Image -->
                            <div class="position-relative overflow-hidden aspect-ratio-16-9">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                    class="card-img-top w-100" 
                                    alt="{{ $product->name }}" 
                                    style="height: 250px; object-fit: cover; object-position: center;">
                                
                                <!-- Hover Action (Optional overlay) -->
                            </div>
                            
                            <!-- Body -->
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-light text-dark border">Baru</span>
                                </div>
                                <h5 class="card-title fw-bold fs-6 mb-1">
                                    <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark stretched-link">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted small mb-3">Kualitas terbaik untuk anda.</p> 
                                
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <button class="btn btn-sm btn-outline-dark rounded-circle" style="width: 32px; height: 32px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if($products->isEmpty())
                        <div class="col-12 text-center py-5">
                            <h5 class="text-muted">Belum ada produk.</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection