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

    $nama_produk_reject = $data['nama_produk'];
    $harga_satuan = $data['harga'];
    $jumlah_produk_reject = $data['jumlah'];
    $tanggal_reject = $tanggal;

    //! menangkap isi tabel produk terjual
    $queryReject = mysqli_query($connect, "SELECT id_produk_terjual FROM produk_terjual WHERE nama_produk_terjual = '$nama_produk_reject' 
    AND harga_satuan = $harga_satuan AND jumlah_produk_terjual = $jumlah_produk_reject AND tanggal_terjual = '$tanggal_reject'");


    while($row = mysqli_fetch_array($queryReject)){
        $id_produk_terjual = $row['id_produk_terjual'];

        //! memasukkan data produk reject ke dalam tabel reject
        $queryInputDataProdukTerjual = mysqli_query($connect, "INSERT INTO reject VALUES
        ( '','$id_produk_terjual','$jumlah_produk_reject','$tanggal_reject', '$tanggal_reject')")
        or die(mysqli_error($connect));

        if ($queryInputDataProdukTerjual) {
            $checked = true;
            //! menampilkan semua isi tabel bahan baku
            $queryBahanBaku = mysqli_query($connect, "SELECT stok_bahan FROM bahan_baku WHERE id_bahan_baku = '$id_bahan_baku'");
            
            //! menangkap data bahan baku
            $dataBahanBaku = mysqli_fetch_array($queryBahanBaku);

            //! update data bahan baku yang berkurang karena di beli
            $stokBahan = $dataBahanBaku['stok_bahan'] - $jumlah_produk_reject;
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