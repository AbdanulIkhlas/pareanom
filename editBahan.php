<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/editBahan.css">
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
        <h1>EDIT BAHAN</h1>
      </div>

      <?php

      include 'database.php';

      if (isset($_GET['id'])) {
        $id = $_GET['id'];
      }

      $sql = "SELECT * FROM bahan_baku WHERE id_bahan_baku = $id ";
      $result = mysqli_query($connect, $sql);


      // while ($data = mysqli_fetch_array($query)) {

      if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
      ?>


        <section>

          <form method="POST" action="dbupdate_halamanBahan.php?id=<?php echo $data['id_bahan_baku'] ?>">

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['nama_bahan'] ?>" name="nama_bahan">
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Stok</label>
              <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $data['stok_bahan'] ?>" name="stok_bahan">
            </div>

            <div class="mb-3">
              <div class="dropdown">
                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                <select class="form-select form-select-mb-3" aria-label=".form-select-mb example" style=" padding: 7.5px;" name="satuan_stok">
                  <option value="Kg" <?php if ($data['satuan_bahan'] == 'Kg') echo 'selected'; ?>>Kg</option>
                  <option value="Pcs" <?php if ($data['satuan_bahan'] == 'Pcs') echo 'selected'; ?>>Pcs</option>
                  <option value="Pack" <?php if ($data['satuan_bahan'] == 'Pack') echo 'selected'; ?>>Pack</option>
                  <option value="Liter" <?php if ($data['satuan_bahan'] == 'Liter') echo 'selected'; ?>>Liter</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <div class="dropdown">
                <label for="exampleInputEmail1" class="form-label">Jenis</label>
                <select class="form-select form-select-mb-3" aria-label=".form-select-mb example" style=" padding: 7.5px;" name="jenis_bahan">
                  <option value="Otomatis" <?php if ($data['jenis_bahan'] == 'Otomatis') echo 'selected'; ?>>Otomatis</option>
                  <option value="Manual" <?php if ($data['jenis_bahan'] == 'Manual') echo 'selected'; ?>>Manual</option>
                </select>
              </div>
            </div>

            <button type="submit">Tambah</button>
          </form>

        </section>

      <?php
      }
      ?>

    </article>
  </main>
</body>

</html>