@extends('layouts.shop')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Keranjang Belanja</h1>

    @if(session('cart'))
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $subtotal = $details['price'] * $details['quantity'] @endphp
                        @php $total += $subtotal @endphp
                        <tr>
                            <td style="width: 100px;">
                                <img src="{{ asset('storage/' . $details['image']) }}" alt="" class="img-fluid rounded">
                            </td>
                            <td>{{ $details['name'] }}</td>
                            <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                            <td>
                                {{-- Input jumlah (sementara read-only dulu) --}}
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control text-center" style="width: 70px;" readonly>
                            </td>
                            <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            {{-- Ganti bagian tombol Hapus --}}
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Total Belanja:</td>
                        <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        {{-- Ganti tombol Checkout di bawah tabel --}}
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">&laquo; Lanjut Belanja</a>
            
            {{-- Form Checkout --}}
            @auth
                {{-- Jika user SUDAH login --}}
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Checkout Sekarang &raquo;</button>
                </form>
            @else
                {{-- Jika user BELUM login, arahkan ke halaman login --}}
                <a href="{{ route('login') }}" class="btn btn-warning">Login untuk Checkout</a>
            @endauth
        </div>
    @else
        <div class="text-center py-5">
            <h3>Keranjangmu masih kosong 😢</h3>
            <p>Yuk, mulai belanja produk-produk keren kami!</p>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Mulai Belanja</a>
        </div>
    @endif
</div>
@endsection