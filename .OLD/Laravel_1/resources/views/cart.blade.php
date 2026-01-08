@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Keranjang Belanja Anda</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (empty($cartItems))
        <div class="alert alert-info">
            Keranjang belanja Anda masih kosong. <a href="{{ route('products.index') }}">Mulai belanja sekarang!</a>
        </div>
    @else
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th style="width: 150px;">Jumlah</th>
                    <th class="text-end">Subtotal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item['product']->name }}</td>
                    <td>Rp {{ number_format($item['product']->price) }}</td>
                    <td>
                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                            <input type="number" name="quantity" class="form-control form-control-sm" value="{{ $item['quantity'] }}" min="1">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Update</button>
                        </form>
                    </td>
                    <td class="text-end">Rp {{ number_format($item['subtotal']) }}</td>
                    <td class="text-center">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end fs-4">Total Harga</th>
                    <th colspan="2" class="text-end fs-4">Rp {{ number_format($grandTotal) }}</th>
                </tr>
            </tfoot>
        </table>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Lanjut Belanja</a>
            <a href="#" class="btn btn-success btn-lg">Lanjut ke Checkout</a>
        </div>
    @endif
</div>
@endsection