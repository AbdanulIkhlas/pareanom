<?php 
//! menghapus produk yang akan terjual dari tabel temp_produk di database

include "database.php";

$id_temp_produk = $_GET['id_temp_produk'];

//! menghapus produk yang akan di beli berdasarkan ID 
$query = mysqli_query($connect, "DELETE FROM temp_produk where id_temp_produk = $id_temp_produk");

if ($query) {
    header("location:index.php?pesan=hapusProdukYangAkanDiBeliBerhasil");
} else {
    header("location:index.php?pesan=hapusProdukYangAkanDiBeliGagal");
}

?>