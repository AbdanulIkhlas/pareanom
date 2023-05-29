<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/rekapPemasukan.css">
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
        <h1>REKAP PEMASUKAN</h1>

        <div class="navbar">
          <div class="container-button">
            <a href="tambahPemasukan.php"><button> Tambah </button></a>
            <a href="rekapPemasukan.php"><button> Pemasukan </button></a>
            <a href="rekapPengeluaran.php"><button> Pengeluaran </button></a>
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
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>15.000</td>
                <td>10 Oktober 2023</td>
                <td>Beli Minyak</td>
              </tr>
              <tr>
                <td>2</td>
                <td>50.000</td>
                <td>31 Februari 2024</td>
                <td>Ngga tau lupa beli apa</td>
              </tr>
            </tbody>

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

            <ul class="mb-3">REKAP 23/03/2023</ul>

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