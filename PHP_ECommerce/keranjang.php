<?php
session_start();
require_once 'koneksi.php';

$keranjang = $_SESSION['keranjang'] ?? [];
$total_harga = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Keranjang Belanja Anda</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Lanjut Belanja</a>
    </div>

    <?php if (empty($keranjang)): ?>
        <div class="alert alert-warning">Keranjang belanja Anda masih kosong.</div>
    <?php else: ?>
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th style="width: 150px;">Jumlah</th>
                    <th class="text-end">Subtotal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($keranjang as $id_produk => $jumlah): 
                    $result = $koneksi->query("SELECT * FROM produk WHERE id = $id_produk");
                    if($produk = $result->fetch_assoc()): 
                        $subtotal = $produk['harga'] * $jumlah;
                        $total_harga += $subtotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($produk['nama_produk']); ?></td>
                    <td>Rp <?php echo number_format($produk['harga']); ?></td>
                    <td>
                        <form action="proses_keranjang.php" method="post" class="d-flex">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                            <input type="hidden" name="aksi" value="update">
                            <input type="number" name="jumlah" class="form-control form-control-sm" value="<?php echo $jumlah; ?>" min="1">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Update</button>
                        </form>
                    </td>
                    <td class="text-end">Rp <?php echo number_format($subtotal); ?></td>
                    <td class="text-center">
                        <form action="proses_keranjang.php" method="post" style="display:inline;">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                            <input type="hidden" name="aksi" value="hapus">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endif; endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end fs-4">Total Harga</th>
                    <th colspan="2" class="text-end fs-4">Rp <?php echo number_format($total_harga); ?></th>
                </tr>
                <tr>
                    <td colspan="5" class="text-end">
                        <a href="#" class="btn btn-success btn-lg" onclick="alert('Fitur Checkout belum diimplementasikan.')">
                            Lanjut ke Checkout
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>
</div>
</body>
</html>