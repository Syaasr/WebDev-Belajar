<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong, yuk belanja dulu!'); location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">My Shop</a>
    </div>
</nav>

<div class="container">
    <h3>Keranjang Belanja Anda</h3>
    <hr>
    
    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $total_belanja = 0;
            
            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): 
                
                $ambil = $koneksi->query("SELECT * FROM products WHERE id='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                
                $subtotal = $pecah['harga'] * $jumlah;
            ?>
            
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp <?php echo number_format($pecah['harga']); ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>Rp <?php echo number_format($subtotal); ?></td>
                <td>
                    <a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>

            <?php 
                $nomor++;
                $total_belanja += $subtotal;
            endforeach; 
            ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total Belanja</th>
                <th colspan="2">Rp <?php echo number_format($total_belanja); ?></th>
            </tr>
        </tfoot>
    </table>

    <a href="index.php" class="btn btn-secondary">Lanjut Belanja</a>
    <a href="checkout.php" class="btn btn-primary">Checkout (Bayar)</a>

</div>

</body>
</html>