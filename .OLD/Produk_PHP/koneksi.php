<?php
// --- Konfigurasi Database ---
$db_host = 'localhost';      // Nama host, biasanya 'localhost'
$db_user = 'root';           // Username database, default XAMPP adalah 'root'
$db_pass = '';               // Password database, default XAMPP kosong
$db_name = 'nama_database_anda'; // Nama database yang ingin dihubungi

// --- Membuat Koneksi ---
$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

// --- Cek Koneksi ---
// Periksa apakah ada error saat koneksi
if ($koneksi->connect_error) {
    // Jika terjadi error, hentikan skrip dan tampilkan pesan error
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Jika ingin mengatur character set (disarankan)
$koneksi->set_charset("utf8mb4");

// Opesional: Tampilkan pesan jika berhasil terkoneksi
// echo "Koneksi ke database berhasil!";
?>