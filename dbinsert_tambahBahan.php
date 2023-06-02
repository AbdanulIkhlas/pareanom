<?php
include 'database.php';

// Tangkap data yang dikirimkan dari formulir
$nama_bahan = $_POST['nama_bahan'];
$stok_bahan = $_POST['stok_bahan'];
$satuan_stok = $_POST['satuan_stok'];
$jenis_bahan = $_POST['jenis_bahan'];

// Query SQL untuk menambahkan data bahan baru ke dalam database
$sql = "INSERT INTO bahan_baku (nama_bahan, stok_bahan, satuan_bahan, jenis_bahan) VALUES ('$nama_bahan', '$stok_bahan', '$satuan_stok', '$jenis_bahan')";

// Eksekusi query
if (mysqli_query($connect, $sql)) {
  // Jika berhasil, arahkan pengguna ke halaman halamanBahan.php
  header("Location: halamanBahan.php?pesanBerhasil=berhasil_insert_bahanBaku");
  exit(); // Hentikan eksekusi skrip setelah mengarahkan pengguna
} else {
  // Jika terjadi kesalahan, tampilkan pesan error
  echo "Gagal menambahkan data bahan: " . mysqli_error($connect);
  header("Location: halamanBahan.php?pesanGagal=gagal_insert_bahanBaku");
}