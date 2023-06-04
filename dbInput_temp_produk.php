<?php 
//! Memasukkan produk yang akan terjual ke tabel temp_produk di database

include "database.php";

$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$foto = $_POST['foto'];
$checked = true;

$queryBahan = mysqli_query($connect, "SELECT p.nama_produk, b.id_bahan_baku, b.stok_bahan FROM produk p 
INNER JOIN bahan_baku b ON b.id_bahan_baku = p.id_bahan_baku WHERE p.nama_produk = '$nama_produk'"); 

if(!$queryBahan || mysqli_num_rows($queryBahan) == 0){
    $queryBahan = mysqli_query($connect, "SELECT a.nama_add_ons, b.id_bahan_baku, b.stok_bahan FROM add_ons a 
    INNER JOIN bahan_baku b ON b.id_bahan_baku = a.id_bahan_baku WHERE a.nama_add_ons = '$nama_produk'"); 
}

while($dataBahan = mysqli_fetch_array($queryBahan)){
    $stok_bahan = $dataBahan['stok_bahan'];
    echo "stok dalaam while : " . $stok_bahan . "<br>";
    echo "nama produk dalaam while : " . $dataBahan['nama_produk'] . "<br>";
    if ($stok_bahan < $jumlah){
        $checked = false;
        echo "masuk false";
        break;
    }
}

echo "stok luar while : " . $stok_bahan . "<br>";
echo "nama luar  while : " . $dataBahan['nama_produk'] . "<br>";

if($checked){
    $query = mysqli_query($connect, "INSERT INTO temp_produk VALUES
    ( '', '$nama_produk', '$jumlah', '$harga', '$foto')")
    or die(mysqli_error($connect));


    if ($query) {
        header("location:index.php?pesan=input_pembelian_berhasil");
    } else {
        header("location:index.php?pesan=input_pembelian_gagal");
    }
}else{
    header("location:index.php?pesanGagal=jumlah_overflow");
}