@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Laravel Shop!</h1>
        <p class="fs-4">Temukan produk terbaik dengan harga terjangkau.</p>
        <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Belanja Sekarang</a>
    </div>
@endsection