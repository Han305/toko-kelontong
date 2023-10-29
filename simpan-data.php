<?php
//include koneksi database
include('koneksi.php');

//get data dari form
$nama_barang    = $_POST['nama_barang'];
$stok           = $_POST['stok'];
$harga          = $_POST['harga'];
//query insert data ke dalam database
$query = "INSERT INTO barang (nama_barang, stok, harga) VALUES ('$nama_barang', '$stok', '$harga')";
    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
    } else {
        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
    }
?>
