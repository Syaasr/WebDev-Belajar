<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong, tidak bisa checkout'); location='index.php';</script>";
    exit();
}

$user_id = 1; 

foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

    $ambil = $koneksi->query("SELECT * FROM products WHERE id='$id_produk'");
    $detail_produk = $ambil->fetch_assoc();
    
    $harga = $detail_produk['harga'];
    $total_harga = $harga * $jumlah;

    $query_insert = "INSERT INTO orders (user_id, product_id, quantity, total) 
                     VALUES ('$user_id', '$id_produk', '$jumlah', '$total_harga')";
    
    $koneksi->query($query_insert);

    $stok_sekarang = $detail_produk['stok'];
    $sisa_stok = $stok_sekarang - $jumlah;
    
    $koneksi->query("UPDATE products SET stok = '$sisa_stok' WHERE id='$id_produk'");
}

unset($_SESSION['keranjang']);

echo "<script>alert('Checkout Sukses! Barang akan segera dikirim.'); location='index.php';</script>";

?>