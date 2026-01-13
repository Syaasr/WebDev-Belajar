<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga       = $_POST['harga'];
    $deskripsi   = $_POST['deskripsi'];
    $stok        = $_POST['stok'];
    $kategori    = $_POST['kategori'];

    $nama_file   = $_FILES['gambar']['name'];
    $source      = $_FILES['gambar']['tmp_name'];
    $folder      = './gambar/';

    move_uploaded_file($source, $folder . $nama_file);

    $query = "INSERT INTO products (nama_produk, harga, deskripsi, stok, kategori, gambar) 
              VALUES ('$nama_produk', '$harga', '$deskripsi', '$stok', '$kategori', '$nama_file')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Tambah Produk Baru</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                <option value="elektronik">Elektronik</option>
                <option value="pakaian">Pakaian</option>
                <option value="olahraga">Olahraga</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Foto Produk</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>