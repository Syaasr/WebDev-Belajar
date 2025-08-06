<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Proses Form</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .success { color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; }
        .error { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; }
        .product-info { margin-top: 20px; }
        .product-info h3 { margin-top: 0; }
        a { color: #007BFF; }
    </style>
</head>
<body>

<div class="container">
    <h2>Status Penyimpanan Produk</h2>

    <?php
    $nama_produk = trim($_POST['nama_produk']);
    $harga = trim($_POST['harga']);
    $deskripsi = trim($_POST['deskripsi']);

    if (empty($nama_produk) || empty($harga) || empty($deskripsi)) {
        echo '<div class="error">';
        echo '<h4>Gagal!</h4>';
        echo 'Semua field (Nama Produk, Harga, dan Deskripsi) harus diisi.';
        echo '</div>';
    } else {
        $ppn = $harga * 0.11;
        $harga_total = $harga + $ppn;

        echo '<div class="success">';
        echo '<h4>Berhasil!</h4>';
        echo 'Produk baru berhasil ditambahkan (simulasi).';
        echo '</div>';

        echo '<div class="product-info">';
        echo '<h3>Detail Produk yang Diinput:</h3>';
        echo '<p><strong>Nama Produk:</strong> ' . htmlspecialchars($nama_produk) . '</p>';
        echo '<p><strong>Harga Awal:</strong> Rp ' . number_format($harga, 0, ',', '.') . '</p>';
        echo '<p><strong>Deskripsi:</strong> ' . htmlspecialchars($deskripsi) . '</p>';
        echo '<hr>';
        echo '<p><strong>PPN (11%):</strong> Rp ' . number_format($ppn, 0, ',', '.') . '</p>';
        echo '<p><strong>Harga Total (termasuk PPN):</strong> Rp ' . number_format($harga_total, 0, ',', '.') . '</p>';
        echo '</div>';
    }
    ?>

    <br>
    <a href="produk.html">Kembali ke Form</a>
</div>

</body>
</html>