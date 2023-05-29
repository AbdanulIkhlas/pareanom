<?php 
//! Memasukkan produk yang akan terjual ke tabel temp_produk di database

include "database.php";

$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$foto = $_POST['foto'];


$query = mysqli_query($connect, "INSERT INTO temp_produk VALUES
        ( '', '$nama_produk', '$jumlah', '$harga', '$foto')")
    or die(mysqli_error($connect));


if ($query) {
    header("location:index.php?pesan=input_pembelian_berhasil");
    echo "<script>alert('$message');</script>";
} else {
    header("location:index.php?pesan=input_pembelian_gagal");
}