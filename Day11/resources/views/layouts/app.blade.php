<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Laravel Shop</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Produk</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/cart') }}">Keranjang</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-center py-4 text-muted mt-5">
        &copy; 2026 Toko Laravel Saya
    </footer>

  </body>
</html>