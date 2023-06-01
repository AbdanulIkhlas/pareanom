<?php 
include 'database.php';

//! Mengambil data dari database
$query = "SELECT DISTINCT nama_produk,harga,jumlah,foto FROM produk";
$result = mysqli_query($connect, $query);

//! menangkap data yang di kirim dari confirm pembelian 
$dataArray = $_POST['dataArray'];
$tanggal = $_POST['tanggal'];
$totalHarga = $_POST['total_harga'];
$keterangan = $_POST['keterangan'];

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
        $queryInsertReject = mysqli_query($connect, "INSERT INTO reject VALUES
        ( '','$id_produk_terjual','$jumlah_produk_reject','$tanggal_reject', '$keterangan')")
        or die(mysqli_error($connect));

        if ($queryInsertReject) {
            $checked = true;
            //! menghapus produk yang di reject dari tabel produk terjual
            $queryDelete = mysqli_query($connect, "DELETE FROM produk_terjual WHERE id_produk_terjual = $id_produk_terjual");
        } else {
            $checked = false;
        }
        
    }
}

if ($checked) {
    //! menampilkan semua isi tabel total saldo
    $queryTotalSaldo = mysqli_query($connect, "SELECT total_saldo FROM total_saldo ");
            
    //! menangkap data total saldo
    $dataSaldo = mysqli_fetch_array($queryTotalSaldo);

    //! update saldo yang berkurang karena reject produk
    $totalSaldo = $dataSaldo['total_saldo'] - $harga_satuan;
    $queryUpdateSaldo = mysqli_query($connect, "UPDATE total_saldo set total_saldo = '$saldo'");

    header("location:halamanReject.php?pesan=pembelian_berhasil");
} else {
    header("location:halamanReject.php?pesan=pembelian_gagal");
}

//! Menutup connect ke database
mysqli_close($connect);

?>