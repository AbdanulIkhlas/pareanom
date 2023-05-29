<?php 
include 'database.php';

//! Mengambil data dari database
$query = "SELECT DISTINCT nama_produk,harga,jumlah,foto FROM produk";
$result = mysqli_query($connect, $query);

//! menangkap data yang di kirim dari confirm pembelian 
$dataArray = $_POST['dataArray'];
$tanggal = $_POST['tanggal'];

//! Memproses nilai array
foreach ($dataArray as $data) {
    $data = json_decode($data, true);

    $nama_produk_terjual = $data['nama_produk'];
    $harga_satuan = $data['harga'];
    $jumlah_produk_terjual = $data['jumlah'];
    $tanggal_terjual = $tanggal;

    //! menangkap isi tabel produk dan bahan baku
    $queryProduk = mysqli_query($connect, "SELECT p.id_produk, p.nama_produk, b.id_bahan_baku, b.nama_bahan
    FROM produk p INNER JOIN bahan_baku b ON p.id_bahan_baku = b.id_bahan_baku
    WHERE p.nama_produk = '$nama_produk_terjual'");

    while($row = mysqli_fetch_array($queryProduk)){
        $id_produk = $row['id_produk'];
        $id_bahan_baku = $row['id_bahan_baku'];

        //! memasukkan data produk terjual ke dalam tabel produk_terjual
        $queryInputDataProdukTerjual = mysqli_query($connect, "INSERT INTO produk_terjual VALUES
        ( '', '$id_produk', '$id_bahan_baku', '$nama_produk_terjual', '$harga_satuan','$jumlah_produk_terjual', '$tanggal_terjual')")
        or die(mysqli_error($connect));

        if ($queryInputDataProdukTerjual) {
            $checked = true;
        } else {
            $checked = false;
        }

        
    }
}

if ($checked) {
    //! menghapus semua isi tabel temp_produk
    $queryDeleteTempProduk = mysqli_query($connect, "DELETE FROM temp_produk");
    header("location:index.php?pesan=pembelian_berhasil");
} else {
    header("location:index.php?pesan=pembelian_gagal");
}

//! Menutup connect ke database
mysqli_close($connect);

?>