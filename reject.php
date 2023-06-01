<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/reject.css">
</head>

<body>
  <main>
    <nav>
      <header>
        <a href="index.php"> <!--? Halaman Produk  -->
          <div class="garis-bawah-gambar">
            <img src="assets/image/Logo Pareanom.png" alt="Logo Pareanom">
          </div>
        </a>
        <h1>PAREANOM</h1>
        <h1>CHICKEN BAR</h1>
      </header>
      <ul>
        <a href="index.php">
          <li>
            <div class="kotak-ikon">
              <img src="assets/image/Produk.png">
            </div>
            <p>PRODUK</p>
          </li>
        </a>
        <a href="halamanBahan.php">
          <li>
            <div class="kotak-ikon">
              <img src="assets/image/Bahan.png">
            </div>
            <p>BAHAN</p>
          </li>
        </a>
        <a href="halamanRekap.php">
          <li>
            <div class="kotak-ikon">
              <img src="assets/image/Rekap.png">
            </div>
            <p style="background-color: #ffde38;">REKAP</p>
          </li>
        </a>
        <a href="halamanReject.php">
          <li>
            <div class="kotak-ikon">
              <img src="assets/image/Reject.png">
            </div>
            <p>REJECT</p>
          </li>
        </a>
      </ul>
    </nav>
    <article>

      <div class="tengah">
        <h1>REKAP REJECT</h1>

        <div class="tabel">
          <table class="table table-striped">

            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Bahan / Add Ons</th>
                <th scope="col">Jumlah</th>
                <th scope="col">keterangan</th>
              </tr>
            </thead>

            <?php
            date_default_timezone_set('Asia/Jakarta');
            $tanggalSekarang = date("d/m/Y");
            $tanggalDB = date("Y-m-d");
            include('database.php');

            $sql = "SELECT bahan_baku.nama_bahan, SUM(reject.jumlah_reject) AS jumlah_reject, reject.keterangan FROM reject INNER JOIN produk_terjual ON reject.id_produk_terjual = produk_terjual.id_produk_terjual INNER JOIN bahan_baku ON produk_terjual.id_bahan_baku = bahan_baku.id_bahan_baku WHERE reject.tanggal_reject = '$tanggalDB' GROUP BY reject.id_produk_terjual, reject.keterangan";
            $query = mysqli_query($connect, $sql);

            $id = 1;

            while ($data = mysqli_fetch_array($query)) {

            ?>

              <tbody>
                <tr>
                  <td style="color: white;"><?php echo $id ?></td>
                  <td style="color: white;"><?php echo $data['nama_bahan'] ?></td>
                  <td style="color: white;"><?php echo $data['jumlah_reject'] ?></td>
                  <td style="color: white;"><?php echo $data['keterangan'] ?></td>
                </tr>
              </tbody>

            <?php $id++;
            } ?>

          </table>
        </div>

      </div>

      <section>

        <div class="kanan">

          <div class="judul">
            <h1>TOTAL <br> PENGHASILAN </h1>
          </div>

          <div class="saldo">
            <div class="bg-kuning">
              <img src="assets/image/Bg Saldo.png" alt="Background Saldo">
            </div>
            <div class="uang">
              <div class="nominal">
                <div class="bg-edit">
                  <a href="rekapKeuangan.php"><img src="assets/image/Edit.png" alt="Edit Saldo"></a>
                </div>

                <?php
                $sql = "SELECT total_saldo FROM total_saldo";
                $query = mysqli_query($connect, $sql);

                if ($query) {
                  $data = mysqli_fetch_array($query);
                  $saldo = $data['total_saldo'];
                } else {
                  // Jika terjadi kesalahan saat menjalankan kueri
                  $saldo = "Error !";
                }
                ?>

                <h1>Rp. <?php echo $saldo ?></h1>
              </div>
            </div>
          </div>

          <div class="menu-kanan">

            <ul class="mb-3">REKAP <?php echo $tanggalSekarang ?></ul>

            <ul class="mb-3">
              <li><a href="halamanRekap.php"><button>PENJUALAN</button></a></li>
            </ul>
            <ul class="mb-3">
              <li><a href="bahanTerpakai.php"><button>BAHAN TERPAKAI</button></a></li>
            </ul>
            <ul class="mb-3">
              <li><a href="reject.php"><button style="background-color: #ffde38;">REJECT</button></a></li>
            </ul>
            <ul class="mb-3">
              <li><a href="fullRekap.php"><button>FULL REKAP</button></a></li>
            </ul>

          </div>

        </div>

      </section>
    </article>


  </main>
</body>

</html>