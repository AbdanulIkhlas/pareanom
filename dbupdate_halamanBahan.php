<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Periksa apakah semua input telah terisi
  if (isset($_POST['nama_bahan']) && isset($_POST['stok_bahan']) && isset($_POST['satuan_stok']) && isset($_POST['jenis_bahan'])) {
    $id = $_GET['id']; // Ambil nilai id dari parameter URL

    $nama_bahan = $_POST['nama_bahan'];
    $stok_bahan = $_POST['stok_bahan'];
    $satuan_bahan = $_POST['satuan_stok'];
    $jenis_bahan = $_POST['jenis_bahan'];

    // Update data dalam database
    $sql = "UPDATE bahan_baku SET nama_bahan = '$nama_bahan', stok_bahan = '$stok_bahan', satuan_bahan = '$satuan_bahan', jenis_bahan = '$jenis_bahan' WHERE id_bahan_baku = $id";
    $result = mysqli_query($connect, $sql);

    if ($result) {
      // Redirect ke halaman bahan setelah update berhasil
      header('Location: halamanBahan.php?pesanBerhasil=berhasil_update_bahanBaku');
      exit;
    } else {
      echo "Gagal melakukan update data.";
      header('Location: halamanBahan.php?pesanGagal=gagal_update_bahanBaku');
    }
  } else {
    echo "Mohon lengkapi semua input.";
  }
} else {
  echo "Metode tidak diizinkan.";
}