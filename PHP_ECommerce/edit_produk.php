<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM produk WHERE id = $id");
$produk = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Edit Produk: <?php echo htmlspecialchars($produk['nama_produk']); ?></h2>
    <form action="proses_crud.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="id" value="<?php echo $produk['id']; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $produk['gambar_produk']; ?>">
        
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo htmlspecialchars($produk['nama_produk']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo htmlspecialchars($produk['deskripsi']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $produk['harga']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo htmlspecialchars($produk['kategori']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gambar_url" class="form-label">Link/URL Gambar</label>
            <input type="url" class="form-control" id="gambar_url" name="gambar_url" value="<?php echo htmlspecialchars($produk['gambar_produk']); ?>" required>
            <small class="form-text text-muted">Preview:</small><br>
            <img src="<?php echo htmlspecialchars($produk['gambar_produk']); ?>" width="100" class="mt-2" alt="Preview">
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
        <a href="admin_dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>