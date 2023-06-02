<?php 
include 'database.php';

//! menangkap data yang di kirim dari confirm pembelian 
$nama_produk_reject = $_POST['nama_produk'];
$harga_satuan = $_POST['harga'];
$jumlah_produk_reject = $_POST['jumlah'];
$tanggal_reject = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

//! menangkap isi tabel produk terjual
$queryReject = mysqli_query($connect, "SELECT * FROM produk_terjual WHERE nama_produk_terjual = '$nama_produk_reject' 
AND harga_satuan = '$harga_satuan' AND tanggal_terjual = '$tanggal_reject'");

//! mengecek apakah produk reject yang di pilih sudah di pilih atau belum
if((!$queryReject) || (mysqli_num_rows($queryReject) == 0)){
    //! jika belum kembali ke halaman reject
    header("location:halamanReject.php?pesanGagal=reject_tidak_sesuai");
}else{
    //! melanjutkan proses eksekusi jika reject sesuai dengan data pada tabel produk terjual
    while($row = mysqli_fetch_array($queryReject)){
        $id_bahan_baku = $row['id_bahan_baku'];
        $id_produk_terjual = $row['id_produk_terjual'];
        $jumlahProdukTerjual = $row['jumlah_produk_terjual'];
        $hasil = $jumlahProdukTerjual - $jumlah_produk_reject;

        //!mengecek apakah produk yang di reject overflow
        if($hasil < 0){
            $checked = false;
        }else{
            //! memasukkan data produk reject ke dalam tabel reject
            $queryInsertReject = mysqli_query($connect, "INSERT INTO reject VALUES
            ( '','$id_bahan_baku','$jumlah_produk_reject','$tanggal_reject', '$keterangan')")
            or die(mysqli_error($connect));

            if ($queryInsertReject) {
                $checked = true;
                if($hasil == 0){
                    //! menghapus produk yang di reject dari tabel produk terjual
                    $queryDelete = mysqli_query($connect, "DELETE FROM produk_terjual WHERE id_produk_terjual = '$id_produk_terjual'");
                }else{
                    //! update produk terjual karena habis di reject
                    $queryUpdate = mysqli_query($connect, "UPDATE produk_terjual set jumlah_produk_terjual = '$hasil' WHERE id_produk_terjual = '$id_produk_terjual'");
                }
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
        $saldo = $dataSaldo['total_saldo'] - $harga_satuan;
        $queryUpdateSaldo = mysqli_query($connect, "UPDATE total_saldo set total_saldo = '$saldo'");
        header("location:halamanReject.php?pesanBerhasil=reject_berhasil");
    } else {
        if($hasil < 0) {
            header("location:halamanReject.php?pesanGagal=reject_overflow");
        }else{
            header("location:halamanReject.php?pesanGagal=reject_gagal");
        }
    }
}

//! Menutup connect ke database
mysqli_close($connect);

?>