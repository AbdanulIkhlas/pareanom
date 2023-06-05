<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="assets/styles/rekapKeuangan.css">
</head>

<body>
  <main>
    <?php
      //! menampilkan notifikasi (berhasil)
      if (isset($_GET['pesanBerhasil'])) { ?>
    <div class="notif-berhasil">
      <?php if ($_GET['pesanBerhasil'] == "berhasil_update_saldo") { ?>
      <p>BERHASIL UPDATE SALDO <br> SECARA MANUAL </p>
      <?php } ?>
    </div>
    <?php } ?>
    <?php
    if (isset($_GET['pesanGagal'])) { ?>
    <?php 
    //! menampilkan notifikasi (gagal) 
    ?>
    <div class="notif-gagal">
      <?php if ($_GET['pesanGagal'] == "gagal_update_saldo") { ?>
      <p> GAGAL UPDATE SALDO <br> SECARA MANUAL </p>
      <?php } else if ($_GET['pesanGagal'] == "gagal_insert_saldo") { ?>
      <p> GAGAL MEMASUKKAN SALDO <br> KE DATABASE</p>
      <?php } ?>
    </div>
    <?php } ?>
    <nav>
      <header>
        <a href="index.php">
          <!--? Halaman Produk  -->
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
        <h1>REKAP KEUANGAN</h1>

        <div class="navbar">
          <div class="container-button">
            <a href="tambahKeuangan.php"><button> Tambah </button></a>
          </div>
        </div>


        <div class="tabel">
          <table class="table table-striped">

            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Catatan</th>
                <th scope="col">Jenis</th>
              </tr>
            </thead>

            <?php
            date_default_timezone_set('Asia/Jakarta');
            $tanggalSekarang = date("d/m/Y");
            $tanggalDB = date("Y-m-d");
            include('database.php');

            $sql = "SELECT * FROM saldo WHERE tanggal_update = '$tanggalDB'";
            $query = mysqli_query($connect, $sql);
            $id = 1;
            if(mysqli_num_rows($query) == 0){
            ?>
            <tbody>
              <tr>
                <td style="background-color: white;">-</td>
                <td style="background-color: white;">-</td>
                <td style="background-color: white;">-</td>
                <td style="background-color: white;">-</td>
                <td style="background-color: white;">-</td>
              </tr>
            </tbody>
            <?php
            }

            while ($data = mysqli_fetch_array($query)) {

              $tanggal_update = date("d - F - Y", strtotime($data['tanggal_update']));

            ?>

            <?php if ($data['jenis'] == "Pemasukan") { ?>

            <tbody>
              <tr>
                <td style="background-color: cornflowerblue; color: white;"><?php echo $id ?></td>
                <td style="background-color: cornflowerblue; color: white;"><?php echo $data['nominal_saldo'] ?></td>
                <td style="background-color: cornflowerblue; color: white;"><?php echo $tanggal_update ?></td>
                <td style="background-color: cornflowerblue; color: white;"><?php echo $data['keterangan'] ?></td>
                <td style="background-color: cornflowerblue; color: white;"><?php echo $data['jenis'] ?></td>
              </tr>
            </tbody>

            <?php } else { ?>

            <tbody>
              <tr>
                <td style="background-color: #ff4434; color: white;"><?php echo $id ?></td>
                <td style="background-color: #ff4434; color: white;"><?php echo $data['nominal_saldo'] ?></td>
                <td style="background-color: #ff4434; color: white;"><?php echo $tanggal_update ?></td>
                <td style="background-color: #ff4434; color: white;"><?php echo $data['keterangan'] ?></td>
                <td style="background-color: #ff4434; color: white;"><?php echo $data['jenis'] ?></td>
              </tr>
            </tbody>

            <?php } ?>


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
  <script src="assets/scripts/notifikasi.js"></script>
</body>

</html>