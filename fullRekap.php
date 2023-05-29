<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/fullRekap.css">
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

      <!-- Bagian hijau yang di tengah -->
      <section class="container-tengah">
        <div class="container-rekap">
          <div class="isi-rekap">
            <h1>REKAP 23/03/2023</h1>
            <h2>PENJUALAN PRODUK :</h2>

            <table class="table table-striped">

              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Produk / Add Ons</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td>Pareanom Mantap Kecil (Paha)</td>
                  <td>10</td>
                  <td>10.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Pareanom Mantap Kecil (Paha)</td>
                  <td>10</td>
                  <td>10.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Pareanom Mantap Kecil (Paha)</td>
                  <td>10</td>
                  <td>10.000</td>
                </tr>
              </tbody>

            </table>

            <h3>TOTAL : Rp.61.000.000</h3>

            <h2>BAHAN TERPAKAI :</h2>

            <table class="table table-striped">

              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Bahan</th>
                  <th scope="col">Jumlah</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
              </tbody>

            </table>

            <h2>REJECT :</h2>

            <table class="table table-striped">

              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Bahan</th>
                  <th scope="col">Jumlah</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Sayap</td>
                  <td>10</td>
                </tr>
              </tbody>

            </table>

            <h2> CATATAN </h2>
            <div class="form-catatan">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            </div>

          </div>
        </div>

      </section>

      <section class="container-kanan">

        <div class="judul-kanan">
          <h1>TOTAL PENGHASILAN</h1>
        </div>

        <div class="saldo-kanan">


          <div class="bg-kuning">
            <div class="tombol-ubah">
              <div class="constaint-ubah">
                <a href="rekapPengeluaran.php"><img src="assets/image/Edit.png" alt="Edit Button"></a>
              </div>
              <div class="saldo-uang">
                <h1>Rp.610.000.000</h1>
              </div>
            </div>
            <img src="assets/image/Bg Saldo.png" alt="Background Saldo">
          </div>


        </div>

        <div class="menu-kanan">

          <h1 class="mb-3">REKAP 23/03/2023</h1>

          <ul class="mb-3">
            <li><a href="halamanRekap.php"><button>PENJUALAN</button></a></li>
          </ul>
          <ul class="mb-3">
            <li><a href="bahanTerpakai.php"><button>BAHAN TERPAKAI</button></a></li>
          </ul>
          <ul class="mb-3">
            <li><a href="reject.php"><button>REJECT</button></a></li>
          </ul>
          <ul class="mb-3">
            <li><a href="fullRekap.php"><button style="background-color: #ffde38;">FULL REKAP</button></a></li>
          </ul>

        </div>

      </section>
    </article>




  </main>
</body>

</html>