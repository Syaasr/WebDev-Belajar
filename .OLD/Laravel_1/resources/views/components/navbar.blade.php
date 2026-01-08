<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Toko Asril</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- Menu di sisi kiri --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Kontak</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        Keranjang
                        @if(count(session('cart', [])) > 0)
                            <span class="badge bg-danger ms-1">
                                {{ count(session('cart', [])) }}
                            </span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>