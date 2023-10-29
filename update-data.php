<?php
//include koneksi database
include('koneksi.php');


//get data dari form
$id_barang      = $_POST['id_barang'];
$nama_barang    = $_POST['nama_barang'];
$stok           = $_POST['stok'];
$harga          = $_POST['harga'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE barang SET nama_barang = '$nama_barang', stok = '$stok', harga = '$harga' WHERE id_barang = '$id_barang'";


//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}
?>