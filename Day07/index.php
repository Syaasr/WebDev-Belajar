<?php include 'tambah_produk.php'; ?>
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
            
            <?php if ($pesan != ""): ?>
                <div class="alert alert-info">
                    <?php echo $pesan; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Laptop Gaming" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" placeholder="10000" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="10" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">Simpan Produk</button>
                <a href="index.php" class="btn btn-secondary">Refresh</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>
