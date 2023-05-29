<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pareanom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/tambahBahan.css">
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
        <h1>TAMBAH BAHAN</h1>
      </div>

      <section>

        <form>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stok</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <div class="dropdown">
              <label for="exampleInputEmail1" class="form-label">Satuan</label>
              <select class="form-select form-select-mb-3" aria-label=".form-select-mb example" style=" padding: 7.5px;">
                <option selected hidden>Pilih satuan stok pada bahan</option>
                <option value="Kg">Kg</option>
                <option value="Pcs">Pcs</option>
                <option value="Pack">Pack</option>
                <option value="Liter">Liter</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <div class="dropdown">
              <label for="exampleInputEmail1" class="form-label">Satuan</label>
              <select class="form-select form-select-mb-3" aria-label=".form-select-mb example" style=" padding: 7.5px;">
                <option selected hidden>Pilih jenis pada bahan</option>
                <option value="Otomatis">Otomatis</option>
                <option value="Manual">Manual</option>
              </select>
            </div>
          </div>

          <button type="submit">Tambah</button>
        </form>

      </section>

    </article>
  </main>
</body>

</html>