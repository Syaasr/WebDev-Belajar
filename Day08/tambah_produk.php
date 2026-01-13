<?php
    include 'koneksi.php';
    $pesan = "";

    if (isset($_POST['simpan'])) {
        $nama_produk = $_POST['nama_produk']; 
        $harga       = $_POST['harga'];
        $deskripsi   = $_POST['deskripsi'];
        $stok        = $_POST['stok'];
        $kategori    = $_POST['kategori'];

        if (empty($nama_produk) || empty($harga) || empty($stok) || empty($kategori)) {
            $pesan = "<div class='alert alert-danger'>Nama, Harga, Stok, dan Kategori wajib diisi.</div>";
        } elseif ($kategori != 'elektronik' && $kategori != 'pakaian' && $kategori != 'olahraga') {
            $pesan = "<div class='alert alert-danger'>Kategori harus elektronik, pakaian, atau olahraga.</div>";
        } else {
            $query = "INSERT INTO products (nama_produk, harga, deskripsi, stok, kategori) 
                    VALUES ('$nama_produk', '$harga', '$deskripsi', '$stok', '$kategori')";
            
            if (mysqli_query($koneksi, $query)) {
                $pesan = "<div class='alert alert-success'>Berhasil! Produk sudah masuk ke gudang.</div>";
            } else {
                $pesan = "<div class='alert alert-danger'>Gagal: " . mysqli_error($koneksi) . "</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Tambah Produk Baru</h3>
        </div>
        <div class="card-body">
            
            <?php echo $pesan; ?>

            <form action="" method="POST">
                
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Laptop Gaming">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" placeholder="10000">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="10">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Contoh: Elektronik/Pakaian/Olahraga">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">Simpan Produk</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>