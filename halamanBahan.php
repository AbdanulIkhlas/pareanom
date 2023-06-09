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
  <link rel="stylesheet" href="assets/styles/halamanBahan.css">
</head>

<body>
  <main>
    <?php
    include "database.php";
    //! menampilkan notifikasi (berhasil)
    if (isset($_GET['pesanBerhasil'])) { ?>
    <div class="notif-berhasil">
      <?php if ($_GET['pesanBerhasil'] == "berhasil_insert_bahanBaku") { ?>
      <p>BERHASIL MENAMBAHKAN <br> BAHAN BAKU</p>
      <?php } else if ($_GET['pesanBerhasil'] == "berhasil_update_bahanBaku") { ?>
      <p>BERHASIL MENGEDIT <br> BAHAN BAKU</p>
      <?php } ?>
    </div>
    <?php } ?>
    <?php
    if (isset($_GET['pesanGagal'])) { ?>
    <?php 
    //! menampilkan notifikasi (gagal) 
    ?>
    <div class="notif-gagal">
      <?php if ($_GET['pesanGagal'] == "gagal_insert_bahanBaku") { ?>
      <p> GAGAL MENAMBAHKAN <br> BAHAN BAKU</p>
      <?php } else if ($_GET['pesanGagal'] == "gagal_update_bahanBaku") { ?>
      <p> GAGAL MENGEDIT <br> BAHAN BAKU</p>
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
        <?php 
        $sql = "SELECT * FROM bahan_baku WHERE stok_bahan <= 5 ORDER BY stok_bahan ASC";
        $query = mysqli_query($connect, $sql);
        ?>
        <a href="halamanBahan.php">
          <li>
            <div class="kotak-ikon">
              <img src="assets/image/Bahan.png">
            </div>
            <p>
              BAHAN
            </p>
            <?php 
            if(mysqli_num_rows($query) != 0){ ?>
            <div style="color: red; 
                  width: 10px;
                  height: 10px;
                  border: 1px solid black;
                  border-radius: 50%;
                  position: absolute;
                  z-index: 99;
                  top: 14px;
                  right: 18px;
                  background-color: red;
            "></div>
            <?php }?>
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
      <a href="tambahBahan.php" style="float: left;"><button type="submit"> Tambah </button> </a>
      <section>
        <div class="tabel">
          <h2 style="margin-top: 0px;">BAHAN YANG HAMPIR HABIS ( < 5):</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Bahan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jenis</th>
                  </tr>
                </thead>
                <?php
            $sql = "SELECT * FROM bahan_baku WHERE stok_bahan <= 5 ORDER BY stok_bahan ASC";
            $query = mysqli_query($connect, $sql);
            $id = 1;
            if(mysqli_num_rows($query) == 0){
            ?>
                <tbody>
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
                <?php
            }
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tbody>
                  <tr class="bahan_hampir_habis">
                    <td><?php echo $id ?></td>
                    <td><?php echo $data['nama_bahan'] ?></td>
                    <td><?php echo $data['satuan_bahan'] ?></td>
                    <td><?php echo $data['stok_bahan'] ?></td>
                    <td><?php echo $data['jenis_bahan'] ?></td>
                  </tr>
                </tbody>
                <?php
              $id++;
            } ?>
              </table>
              <h2>JENIS BAHAN OTOMATIS :</h2>
              <table class="table table-striped">
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
            $sql = "SELECT * FROM bahan_baku WHERE jenis_bahan = 'Otomatis' ORDER BY nama_bahan ASC";
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
              <h2>JENIS BAHAN MANUAL :</h2>
              <table class="table table-striped">
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
            $sql = "SELECT * FROM bahan_baku WHERE jenis_bahan = 'Manual' ORDER BY nama_bahan ASC";
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
  <script src="assets/scripts/notifikasi.js"></script>
</body>

</html>