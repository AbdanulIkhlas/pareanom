<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/halamanBahan.css">
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
            <p>REKAP</p>
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

      <div class="judul">
        <h1>DATA BAHAN</h1>
      </div>

      <a href="tambahBahan.php"><button type="submit"> Tambah </button> </a>

      <section>

        <div class="tabel">

          <table <table class="table table-striped">

            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Bahan</th>
                <th scope="col">Stok</th>
                <th scope="col">Satuan</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>

            <?php

            include('database.php');

            $sql = "SELECT * FROM bahan_baku ORDER BY nama_bahan ASC";
            $query = mysqli_query($connect, $sql);

            $id = 1;

            while ($data = mysqli_fetch_array($query)) {

            ?>

              <tbody>
                <tr>
                  <td><?php echo $id ?></td>
                  <td><?php echo $data['nama_bahan'] ?></td>
                  <td><?php echo $data['satuan_bahan'] ?></td>
                  <td><?php echo $data['stok_bahan'] ?></td>
                  <td><a href="editBahan.php?id=<?php echo $data['id_bahan_baku'] ?>">Edit</a></td>
                </tr>
              </tbody>

            <?php
              $id++;
            } ?>

          </table>

        </div>

      </section>

    </article>
  </main>
</body>

</html>