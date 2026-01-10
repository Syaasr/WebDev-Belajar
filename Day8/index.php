<?php
include 'koneksi.php';

if (isset($_GET['kategori'])) {
    $kategori_dipilih = $_GET['kategori'];
    $query = "SELECT * FROM products WHERE kategori = '$kategori_dipilih'";
} else {
    $query = "SELECT * FROM products";
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Online Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">My Shop</a>
            <a href="tambah_produk.php" class="btn btn-success btn-sm">Tambah Produk +</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4">Katalog Produk</h2>

        <div class="text-center mb-5">
            <a href="index.php" class="btn btn-secondary">Semua</a>
            <a href="index.php?kategori=elektronik" class="btn btn-outline-primary">Elektronik</a>
            <a href="index.php?kategori=pakaian" class="btn btn-outline-primary">Pakaian</a>
            <a href="index.php?kategori=olahraga" class="btn btn-outline-primary">Olahraga</a>
        </div>

        <div class="row">
            <?php 
            while($row = mysqli_fetch_assoc($result)) { 
            ?>
                
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                            
                            <span class="badge bg-info text-dark mb-2"><?php echo $row['kategori']; ?></span>
                            
                            <p class="card-text text-muted small">
                                <?php echo $row['deskripsi']; ?>
                            </p>
                            
                            <h5 class="text-primary fw-bold">
                                Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                            </h5>
                            
                            <p class="text-muted">Stok: <?php echo $row['stok']; ?></p>
                            <a href="#" class="btn btn-primary w-100">Beli Sekarang</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
            
            <?php if(mysqli_num_rows($result) == 0): ?>
                <div class="col-12 text-center">
                    <div class="alert alert-warning">Tidak ada produk di kategori ini.</div>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>