<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/halamanRekap.css">
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
        <h1>REKAP PENJUALAN</h1>

        <div class="tabel">
          <table class="table table-striped">

            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk / Add Ons</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Total</th>
              </tr>
            </thead>

            <?php
            // date_default_timezone_set('Asia/Jakarta');
            $tanggalSekarang = date("d/m/Y");
            $tanggalDB = date("Y-m-d");
            include('database.php');

            // $sql = "SELECT p.id_bahan_baku,b.nama_bahan,  SUM(p.jumlah_produk_terjual) as total_jumlah FROM produk_terjual p INNER JOIN bahan_baku b ON p.id_bahan_baku = b.id_bahan_baku WHERE p.tanggal_terjual = '$tanggalDB' GROUP BY p.id_bahan_baku";

            $sql = "SELECT DISTINCT nama_produk_terjual, harga_satuan, SUM(jumlah_produk_terjual) AS jumlah_produk_terjual FROM produk_terjual WHERE tanggal_terjual = '$tanggalDB' GROUP BY nama_produk_terjual,id_bahan_baku";
            $query = mysqli_query($connect, $sql);

            $id = 1;

            while ($data = mysqli_fetch_array($query)) {

              $harga_satuan = $data['harga_satuan'];
              $jumlah_produk_terjual = $data['jumlah_produk_terjual'];

              $total = $harga_satuan * $jumlah_produk_terjual;

            ?>

              <tbody>
                <tr>
                  <td><?php echo $id ?></td>
                  <td><?php echo $data['nama_produk_terjual'] ?></td>
                  <td><?php echo $data['jumlah_produk_terjual'] ?></td>
                  <td><?php echo $data['harga_satuan'] ?></td>
                  <td><?php echo $total ?></td>
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
                  <a href="rekapPengeluaran.php"><img src="assets/image/Edit.png" alt="Edit Saldo"></a>
                </div>
                <h1>Rp.610.000.000</h1>
              </div>
            </div>
          </div>

          <div class="menu-kanan">
            <ul class="mb-3">REKAP <?php echo $tanggalSekarang ?></ul>

            <ul class="mb-3">
              <li><a href="halamanRekap.php"><button style="background-color: #ffde38;">PENJUALAN</button></a></li>
            </ul>
            <ul class="mb-3">
              <li><a href="bahanTerpakai.php"><button>BAHAN TERPAKAI</button></a></li>
            </ul>
            <ul class="mb-3">
              <li><a href="reject.php"><button>REJECT</button></a></li>
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