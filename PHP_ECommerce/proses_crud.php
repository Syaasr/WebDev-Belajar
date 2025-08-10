<?php
require_once 'koneksi.php';

$aksi = $_POST['aksi'];

if ($aksi == "tambah") {
    $nama = $_POST['nama_produk'];
    $desk = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kat = $_POST['kategori'];
    $gambar_url = $_POST['gambar_url']; 
    
    $stmt = $koneksi->prepare("INSERT INTO produk (nama_produk, deskripsi, harga, kategori, gambar_produk) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $nama, $desk, $harga, $kat, $gambar_url);
    $stmt->execute();

} elseif ($aksi == "edit") {
    $id = $_POST['id'];
    $nama = $_POST['nama_produk'];
    $desk = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kat = $_POST['kategori'];
    $gambar_url = $_POST['gambar_url'];

    $stmt = $koneksi->prepare("UPDATE produk SET nama_produk=?, deskripsi=?, harga=?, kategori=?, gambar_produk=? WHERE id=?");
    $stmt->bind_param("ssissi", $nama, $desk, $harga, $kat, $gambar_url, $id);
    $stmt->execute();
}

$stmt->close();
$koneksi->close();
header("Location: admin_dashboard.php");
exit();
?>