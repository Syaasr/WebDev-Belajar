<?php
require_once 'koneksi.php';


$kategori_result = $koneksi->query("SELECT DISTINCT kategori FROM produk ORDER BY kategori ASC");

$kategori_filter = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';

$sql = "SELECT * FROM produk";
if ($kategori_filter != 'semua') {
    $sql .= " WHERE kategori = ?";
}
$sql .= " ORDER BY nama_produk ASC";

$stmt = $koneksi->prepare($sql);
if ($kategori_filter != 'semua') {
    $stmt->bind_param("s", $kategori_filter);
}
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sedikit style tambahan */
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card.h-100 {
            display: flex;
            flex-direction: column;
        }
        .card-body {
            flex-grow: 1;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Katalog Produk Kami</h1>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center">Katalog Produk Kami</h1>
            <a href="keranjang.php" class="btn btn-info">Lihat Keranjang</a>
        </div>

        <div class="text-center mb-5">
            <a href="index.php" class="btn <?php echo ($kategori_filter == 'semua') ? 'btn-primary' : 'btn-outline-primary'; ?>">Semua Produk</a>
            <?php while ($kategori_row = $kategori_result->fetch_assoc()): ?>
                <a href="index.php?kategori=<?php echo urlencode($kategori_row['kategori']); ?>" 
                   class="btn <?php echo ($kategori_filter == $kategori_row['kategori']) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                    <?php echo htmlspecialchars($kategori_row['kategori']); ?>
                </a>
            <?php endwhile; ?>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($produk = $result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo htmlspecialchars($produk['gambar_produk']); ?>" alt="<?php echo htmlspecialchars($produk['nama_produk']); ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($produk['nama_produk']); ?></h5>
                                <p class="card-text text-muted small"><?php echo htmlspecialchars($produk['deskripsi']); ?></p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong class="text-primary fs-5">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></strong>
                                    <span class="badge bg-secondary"><?php echo htmlspecialchars($produk['kategori']); ?></span>
                                </div>
                                <form action="proses_keranjang.php" method="post" class="mt-2">
                                    <input type="hidden" name="id_produk" value="<?php echo $produk['id']; ?>">
                                    <input type="hidden" name="aksi" value="tambah">
                                    <button type="submit" class="btn btn-success w-100">Tambah ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Tidak ada produk yang ditemukan untuk kategori ini.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php

$stmt->close();
$koneksi->close();
?>