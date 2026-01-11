<?php
session_start(); 

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aksi = $_POST['aksi'];
    $id_produk = $_POST['id_produk'];

    if ($aksi == 'tambah') {
        if (isset($_SESSION['keranjang'][$id_produk])) {
            $_SESSION['keranjang'][$id_produk]++;
        } else {
            $_SESSION['keranjang'][$id_produk] = 1;
        }
    } 
    elseif ($aksi == 'update') {
        $jumlah = (int)$_POST['jumlah'];
        
        if ($jumlah > 0) {
            $_SESSION['keranjang'][$id_produk] = $jumlah;
        } else {
            unset($_SESSION['keranjang'][$id_produk]);
        }
    } 
    elseif ($aksi == 'hapus') {
        unset($_SESSION['keranjang'][$id_produk]);
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>