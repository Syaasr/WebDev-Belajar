<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Tambah Produk Baru</h2>
    <form action="proses_crud.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="tambah">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" required>
        </div>
        <div class="mb-3">
            <label for="gambar_url" class="form-label">Link/URL Gambar</label>
            <input type="url" class="form-control" id="gambar_url" name="gambar_url" placeholder="https://example.com/gambar.jpg" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Produk</button>
        <a href="admin_dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>