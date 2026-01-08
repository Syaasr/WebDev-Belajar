<?php
require_once 'koneksi.php';

$kategori_filter = $_GET['kategori'] ?? '';
$min_harga_filter = $_GET['min_harga'] ?? '';
$max_harga_filter = $_GET['max_harga'] ?? '';

$kategori_result = $koneksi->query("SELECT DISTINCT kategori FROM produk ORDER BY kategori ASC");

$sql = "SELECT * FROM produk";
$conditions = [];
$params = [];
$types = '';

if (!empty($kategori_filter)) {
    $conditions[] = "kategori = ?";
    $params[] = $kategori_filter;
    $types .= 's';
}
if (!empty($min_harga_filter)) {
    $conditions[] = "harga >= ?";
    $params[] = $min_harga_filter;
    $types .= 'i';
}
if (!empty($max_harga_filter)) {
    $conditions[] = "harga <= ?";
    $params[] = $max_harga_filter;
    $types .= 'i';
}

if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$sql .= " ORDER BY id ASC";

$stmt = $koneksi->prepare($sql);
if (count($params) > 0) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Manajemen Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Manajemen Produk</h1>
    <a href="tambah_produk.php" class="btn btn-primary mb-3">Tambah Produk Baru</a>

    <div class="card card-body mb-4">
        <h5 class="card-title">Filter Produk</h5>
        <form action="admin_dashboard.php" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    <?php while ($kat = $kategori_result->fetch_assoc()): ?>
                        <option value="<?php echo htmlspecialchars($kat['kategori']); ?>" <?php if ($kategori_filter == $kat['kategori']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($kat['kategori']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="min_harga" class="form-label">Harga Minimum</label>
                <input type="number" name="min_harga" id="min_harga" class="form-control" placeholder="Rp 0" value="<?php echo htmlspecialchars($min_harga_filter); ?>">
            </div>
            <div class="col-md-3">
                <label for="max_harga" class="form-label">Harga Maksimum</label>
                <input type="number" name="max_harga" id="max_harga" class="form-control" placeholder="Rp 10.000.000" value="<?php echo htmlspecialchars($max_harga_filter); ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info w-100">Filter</button>
                <a href="admin_dashboard.php" class="btn btn-outline-secondary w-100 mt-1">Reset</a>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                    <td>Rp <?php echo number_format($row['harga']); ?></td>
                    <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                    <td>
                        <?php if (!empty($row['gambar_produk'])): ?>
                            <img src="<?php echo htmlspecialchars($row['gambar_produk']); ?>" alt="Gambar Produk" width="100">
                        <?php else: ?>
                            <small>Tidak ada gambar</small>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit_produk.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_produk.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Produk tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php 
$stmt->close();
$koneksi->close(); 
?>