<?php 
//! menghapus card produk

include "database.php";

$namaProduk = $_GET['nama_produk'];
$tanda = $_GET['tanda'];

echo $namaProduk . "<br>";
echo $tanda;

if($tanda == 1){
    //! menghapus card produk berdasarkan nama produk
    $query = mysqli_query($connect, "DELETE FROM produk where nama_produk = '$namaProduk'");
}else{
    //! menghapus card add ons berdasarkan nama add ons
    $query = mysqli_query($connect, "DELETE FROM add_ons where nama_add_ons = '$namaProduk'");
}

if ($query) {
    header("location:index.php?pesan=hapus_card_berhasil");
} else {
    header("location:index.php?pesan=hapus_card_gagal");
}
?>