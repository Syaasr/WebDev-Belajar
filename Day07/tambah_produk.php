<?php
    include 'koneksi.php';
    
    $pesan = "";

    if(isset($_POST['simpan'])){
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];

        if (empty($nama) || empty($harga) || empty($deskripsi) || empty($stok)){
            $pesan = "Data tidak boleh kosong";
        }else{
            $sql = "INSERT INTO products (nama_produk, harga, deskripsi, stok) VALUES ('$nama', '$harga', '$deskripsi', '$stok')";
            if (mysqli_query($koneksi, $sql)){
                $pesan = "Data berhasil disimpan";
            }else{
                $pesan = "Data gagal disimpan";
            }
        }
    }
?>
