<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'toko_online'; 

$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}
$koneksi->set_charset("utf8mb4");
?>