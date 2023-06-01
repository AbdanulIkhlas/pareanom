<?php 
include 'database.php';

//! Mengambil data dari database
$query = "SELECT DISTINCT nama_produk,harga,jumlah,foto FROM produk";
$result = mysqli_query($connect, $query);

//! menangkap data yang di kirim dari confirm pembelian 
$dataArray = $_POST['dataArray'];
$tanggal = $_POST['tanggal'];
$totalHarga = $_POST['total_harga'];

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

    //! jika queryProduk diatas gagal, berarti data adalah add ons dan masuk ke dalam if
    if(!$queryProduk || mysqli_num_rows($queryProduk) == 0){
        $queryProduk = mysqli_query($connect, "SELECT a.id_add_ons, a.nama_add_ons, b.id_bahan_baku, b.nama_bahan
        FROM add_ons a INNER JOIN bahan_baku b ON a.id_bahan_baku = b.id_bahan_baku
        WHERE a.nama_add_ons = '$nama_produk_terjual'");
    }

    while($row = mysqli_fetch_array($queryProduk)){
        $id_produk = $row['id_produk'];
        $id_bahan_baku = $row['id_bahan_baku'];

        //! memasukkan data produk terjual ke dalam tabel produk_terjual
        $queryInputDataProdukTerjual = mysqli_query($connect, "INSERT INTO produk_terjual VALUES
        ( '','$id_bahan_baku','$nama_produk_terjual', '$harga_satuan','$jumlah_produk_terjual', '$tanggal_terjual')")
        or die(mysqli_error($connect));

        if ($queryInputDataProdukTerjual) {
            $checked = true;
            //! menampilkan semua isi tabel bahan baku
            $queryBahanBaku = mysqli_query($connect, "SELECT stok_bahan FROM bahan_baku WHERE id_bahan_baku = '$id_bahan_baku'");
            
            //! menangkap data bahan baku
            $dataBahanBaku = mysqli_fetch_array($queryBahanBaku);

            //! update data bahan baku yang berkurang karena di beli
            $stokBahan = $dataBahanBaku['stok_bahan'] - $jumlah_produk_terjual;
            $queryUpdateBahanBaku = mysqli_query($connect, "UPDATE bahan_baku SET stok_bahan = '$stokBahan' WHERE id_bahan_baku = '$id_bahan_baku'");
        } else {
            $checked = false;
        }
        
    }
}

if ($checked) {
    //! menghapus semua isi tabel temp_produk
    $queryDeleteTempProduk = mysqli_query($connect, "DELETE FROM temp_produk");

    //! mengambil data total saldo dari database
    $querySaldo = mysqli_query($connect, "SELECT total_saldo FROM total_saldo");

    //! menangkap total saldo
    $totalSaldo = mysqli_fetch_array($querySaldo);

    //! update total saldo di database
    $saldo = $totalSaldo['total_saldo'] + $totalHarga;
    $queryUpdateSaldo = mysqli_query($connect, "UPDATE total_saldo set total_saldo = '$saldo'");

    header("location:index.php?pesan=pembelian_berhasil");
} else {
    header("location:index.php?pesan=pembelian_gagal");
}

//! Menutup connect ke database
mysqli_close($connect);

?>