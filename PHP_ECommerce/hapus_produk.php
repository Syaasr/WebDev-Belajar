<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $res = $koneksi->query("SELECT gambar_produk FROM produk WHERE id = $id");
    if ($row = $res->fetch_assoc()) {
        $gambar_path = 'uploads/' . $row['gambar_produk'];
        if (file_exists($gambar_path) && !is_dir($gambar_path)) {
        }
    }

    $stmt = $koneksi->prepare("DELETE FROM produk WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: admin_dashboard.php");
exit();
?>