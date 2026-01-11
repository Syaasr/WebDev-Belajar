<?php
include 'koneksi.php';

$id = $_GET['id'];
$query_ambil = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($koneksi, $query_ambil);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    if ($_FILES['gambar']['name'] != "") {
        $nama_file = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], './gambar/' . $nama_file);
        $query = "UPDATE products SET nama_produk='$nama_produk', harga='$harga', stok='$stok', kategori='$kategori', deskripsi='$deskripsi', gambar='$nama_file' WHERE id='$id'";
    } else {
        $query = "UPDATE products SET nama_produk='$nama_produk', harga='$harga', stok='$stok', kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="container mt-5">
    <h3>Edit Produk</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>">
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?php echo $data['stok']; ?>">
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
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Ganti Foto (Biarkan kosong jika tidak ingin mengganti)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
    </form>
</div>
</body>
</html>