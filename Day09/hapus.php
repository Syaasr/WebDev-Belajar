<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM products WHERE id = '$id'";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus!";
}
?>