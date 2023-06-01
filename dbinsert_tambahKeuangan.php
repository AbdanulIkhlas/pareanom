<?php
include 'database.php';

// Tangkap data yang dikirimkan dari formulir
$nominal_uang = $_POST['nominal_uang'];
$tanggal = $_POST['tanggal'];
$catatan = $_POST['catatan'];
$jenis_uang = $_POST['jenis_uang'];

$tanggal_update = date("Y-m-d", strtotime($tanggal));

// Query SQL untuk menambahkan data keuangan baru ke dalam tabel saldo
$sql = "INSERT INTO saldo (nominal_saldo, tanggal_update, keterangan, jenis) VALUES ('$nominal_uang', '$tanggal_update', '$catatan', '$jenis_uang')";

// Eksekusi query
if (mysqli_query($connect, $sql)) {
  // Jika berhasil, lakukan operasi pengurangan atau penambahan pada total_saldo
  if ($jenis_uang == "Pengeluaran") {
    $query_update_total_saldo = "UPDATE total_saldo SET total_saldo = total_saldo - '$nominal_uang'";
  } else if ($jenis_uang == "Pemasukan") {
    $query_update_total_saldo = "UPDATE total_saldo SET total_saldo = total_saldo + '$nominal_uang'";
  }
  
  // Eksekusi query update total_saldo
  if (mysqli_query($connect, $query_update_total_saldo)) {
    // Jika berhasil mengupdate saldo, arahkan pengguna ke halaman rekapKeuangan.php
    header("Location: rekapKeuangan.php");
    exit();
  } else {
    echo "Gagal mengupdate saldo pada tabel total_saldo: " . mysqli_error($connect);
  }
} else {
  // Jika terjadi kesalahan, tampilkan pesan error
  echo "Gagal menambahkan data keuangan: " . mysqli_error($connect);
}
