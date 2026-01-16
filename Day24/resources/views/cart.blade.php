@extends('layouts.shop')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Keranjang Belanja</h2>

    @if(session('cart'))
        <div class="row">
            <!-- Product List -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="bg-light text-secondary small text-uppercase">
                                <tr>
                                    <th scope="col" class="py-3 ps-4">Produk</th>
                                    <th scope="col" class="py-3">Harga</th>
                                    <th scope="col" class="py-3">Jumlah</th>
                                    <th scope="col" class="py-3">Total</th>
                                    <th scope="col" class="py-3 text-end pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach(session('cart') as $id => $details)
                                    @php $subtotal = $details['price'] * $details['quantity'] @endphp
                                    @php $total += $subtotal @endphp
                                    <tr class="border-bottom">
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $details['image']) }}" 
                                                     alt="{{ $details['name'] }}" 
                                                     class="rounded-3 me-3" 
                                                     style="width: 64px; height: 64px; object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-0 fw-semibold text-dark">{{ $details['name'] }}</h6>
                                                    <small class="text-muted">ID: {{ $id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            Rp {{ number_format($details['price'], 0, ',', '.') }}
                                        </td>
                                        <td class="py-3">
                                            <input type="number" 
                                                   value="{{ $details['quantity'] }}" 
                                                   class="form-control form-control-sm text-center bg-light border-0" 
                                                   style="width: 60px;" 
                                                   readonly>
                                        </td>
                                        <td class="py-3 fw-semibold">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </td>
                                        <td class="text-end pe-4 py-3">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-link text-danger p-0 text-decoration-none" 
                                                        onclick="return confirm('Hapus item ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> Lanjut Belanja
                    </a>
                </div>
            </div>

            <!-- Summary -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-muted">Pajak (0%)</span>
                            <span>Rp 0</span>
                        </div>
                        
                        <hr class="my-4 dotted">
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">Total</span>
                            <span class="fw-bold fs-5 text-primary">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        @auth
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-dark w-100 py-3 rounded-pill fw-bold shadow">
                                    Checkout Sekarang
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-warning w-100 py-2 rounded-pill fw-bold">
                                Login untuk Checkout
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-cart-x display-1 text-muted"></i>
            </div>
            <h3 class="fw-bold">Keranjangmu kosong</h3>
            <p class="text-muted mb-4">Sepertinya kamu belum menambahkan apapun ke keranjang.</p>
            <a href="{{ route('home') }}" class="btn btn-dark btn-lg px-5 rounded-pill shadow-sm">
                Mulai Belanja
            </a>
        </div>
    @endif
</div>
@endsection