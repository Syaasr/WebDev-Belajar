@extends('layouts.shop')

@section('content')
    <h2 class="mb-4">Keranjang Belanja</h2>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Laptop Gaming</td>
                                <td>Rp 15.000.000</td>
                                <td>1</td>
                                <td>Rp 15.000.000</td>
                            </tr>
                            <tr>
                                <td>Mouse Wireless</td>
                                <td>Rp 150.000</td>
                                <td>2</td>
                                <td>Rp 300.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Ringkasan Belanja</h5>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total Harga</span>
                        <span class="fw-bold">Rp 15.300.000</span>
                    </div>
                    <a href="{{ url('/checkout') }}" class="btn btn-success w-100">Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection