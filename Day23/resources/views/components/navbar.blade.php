<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Laravel Shop</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            
            {{-- MENU KERANJANG (Selalu Muncul) --}}
            <li class="nav-item me-3">
                <a class="nav-link" href="{{ route('cart.index') }}">
                    <i class="bi-cart-fill"></i> Keranjang
                    @if(session('cart'))
                        <span class="badge bg-danger rounded-pill">{{ count(session('cart')) }}</span>
                    @endif
                </a>
            </li>

            {{-- LOGIKA AUTH: Cek apakah user sudah login? --}}
            @guest
                {{-- JIKA BELUM LOGIN (Tamu) --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                {{-- JIKA SUDAH LOGIN (User/Admin) --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        {{-- Menu khusus Admin --}}
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Ke Dashboard Admin</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                        @endif

                        {{-- Menu Umum --}}
                        {{-- <li><a class="dropdown-item" href="#">Riwayat Pesanan</a></li> --}}
                        
                        {{-- Tombol Logout --}}
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest

        </ul>
    </div>
    </div>
</nav>