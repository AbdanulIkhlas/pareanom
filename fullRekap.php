<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pareanom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <link rel="stylesheet" href="assets/styles/fullRekap.css">
    <script src="assets/scripts/gantiTanggal.js"></script>
</head>

<body>
    <main>
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
            <?php
                date_default_timezone_set('Asia/Jakarta');
                $tanggalSekarang = date("d/m/Y");
                //! mengecek apkah ada pergantian tanggal
                if (isset($_POST['tanggalDB'])) {
                    $tanggalDB = $_POST['tanggalDB'];
                    $tanggalSekarang = date("d/m/Y", strtotime($tanggalDB));
                } else {
                    $tanggalDB = date("Y-m-d");
                }
                include('database.php');
            ?>
            <!-- Bagian hijau yang di tengah -->
            <section class="container-tengah">
                <div class="container-rekap">
                    <div class="calendar-input">
                        <form id="form-tanggal" action="fullRekap.php?pesan=ngirimTanggal" method="POST">
                            <input type="date" id="tanggalDB" name="tanggalDB" value="<?php echo $tanggalDB; ?>">
                            <input type="submit" value="Ganti Tanggal">
                        </form>
                    </div>
                    <div class="isi-rekap">
                        <form action="cetakFullRekap.php" method="post" target="_blank">
                            <h1>REKAP <?php echo $tanggalSekarang ?></h1>
                            <input type="hidden" name="tanggalCetak" value="<?php echo $tanggalSekarang ?>">
                            <input type="hidden" name="tanggalDB" value="<?php echo $tanggalDB ?>">
                            <h2>PENJUALAN PRODUK :</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: #ffde38;">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Produk / Add Ons</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <?php
                                    $sql = "SELECT DISTINCT nama_produk_terjual, harga_satuan, SUM(jumlah_produk_terjual) AS jumlah_produk_terjual 
                                    FROM produk_terjual WHERE tanggal_terjual = '$tanggalDB' GROUP BY nama_produk_terjual,id_bahan_baku";
                                    $query = mysqli_query($connect, $sql);
                                    $id = 1;
                                    $TOTAL = 0;
                                if(mysqli_num_rows($query) == 0){
                                ?>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                                <?php
                                }
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
                                        <td><?php echo $total ?></td>
                                    </tr>
                                </tbody>
                                <?php $id++;
                                    $TOTAL += $total;
                                }
                                ?>
                            </table>
                            <h3 style="border: 1px solid transparent;">TOTAL : Rp. <?php echo $TOTAL ?></h3>
                            <h2>BAHAN TERPAKAI :</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: #ffde38;">
                                        <th scope="col">No</th>
                                        <th scope="col">Bahan</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT p.id_bahan_baku,b.nama_bahan,  SUM(p.jumlah_produk_terjual) as total_jumlah FROM produk_terjual p INNER JOIN bahan_baku b ON p.id_bahan_baku = b.id_bahan_baku WHERE p.tanggal_terjual = '$tanggalDB' GROUP BY p.id_bahan_baku";
                                $query = mysqli_query($connect, $sql);
                                if(mysqli_num_rows($query) == 0){
                                    ?>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                                <?php
                                }
                                $id = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $data['nama_bahan'] ?></td>
                                        <td><?php echo $data['total_jumlah'] ?></td>
                                    </tr>
                                </tbody>
                                <?php $id++;
                                }
                                ?>
                            </table>
                            <h2>REJECT :</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: #ffde38;">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Bahan / Add Ons</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">keterangan</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT bahan_baku.nama_bahan, SUM(reject.jumlah_reject) AS jumlah_reject, 
                                reject.keterangan FROM bahan_baku INNER JOIN reject
                                ON bahan_baku.id_bahan_baku = reject.id_bahan_baku 
                                WHERE reject.tanggal_reject = '$tanggalDB' GROUP BY reject.id_bahan_baku, reject.keterangan";
                                $query = mysqli_query($connect, $sql);
                                if(mysqli_num_rows($query) == 0){
                                    ?>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                                <?php
                                }
                                $id = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tbody>
                                    <tr style="background-color: #ff4434;">
                                        <td style="color: white;"><?php echo $id ?></td>
                                        <td style="color: white;"><?php echo $data['nama_bahan'] ?></td>
                                        <td style="color: white;"><?php echo $data['jumlah_reject'] ?></td>
                                        <td style="color: white;"><?php echo $data['keterangan'] ?></td>
                                    </tr>
                                </tbody>
                                <?php $id++;
                                } ?>
                            </table>
                            <h2>KEUANGAN :</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: #ffde38;">
                                        <th scope="col">No</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Jenis</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * FROM saldo WHERE tanggal_update = '$tanggalDB'";
                                $query = mysqli_query($connect, $sql);
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
                                $id = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                $tanggal_update = date("d - F - Y", strtotime($data['tanggal_update']));
                                ?>
                                <?php if ($data['jenis'] == "Pemasukan") { ?>
                                <tbody>
                                    <tr>
                                        <td style="background-color: cornflowerblue; color: white;"><?php echo $id ?>
                                        </td>
                                        <td style="background-color: cornflowerblue; color: white;">
                                            <?php echo $data['nominal_saldo'] ?></td>
                                        <td style="background-color: cornflowerblue; color: white;">
                                            <?php echo $tanggal_update ?></td>
                                        <td style="background-color: cornflowerblue; color: white;">
                                            <?php echo $data['keterangan'] ?></td>
                                        <td style="background-color: cornflowerblue; color: white;">
                                            <?php echo $data['jenis'] ?></td>
                                    </tr>
                                </tbody>
                                <?php } else { ?>
                                <tbody>
                                    <tr>
                                        <td style="background-color: #ff4434; color: white;"><?php echo $id ?></td>
                                        <td style="background-color: #ff4434; color: white;">
                                            <?php echo $data['nominal_saldo'] ?></td>
                                        <td style="background-color: #ff4434; color: white;">
                                            <?php echo $tanggal_update ?>
                                        </td>
                                        <td style="background-color: #ff4434; color: white;">
                                            <?php echo $data['keterangan'] ?></td>
                                        <td style="background-color: #ff4434; color: white;">
                                            <?php echo $data['jenis'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                                <?php $id++;
                                } ?>
                            </table>
                            <h2> CATATAN </h2>
                            <div class="form-catatan">
                                <textarea class="form-control" name="catatan" placeholder="Tambahkan Catatan"
                                    id="floatingTextarea"></textarea>
                            </div>
                            <button type="submit">DOWNLOAD REKAP</button>
                        </form>
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
                                <a href="rekapKeuangan.php"><img src="assets/image/Edit.png" alt="Edit Button"></a>
                            </div>
                            <div class="saldo-uang">
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
                        <img src="assets/image/Bg Saldo.png" alt="Background Saldo">
                    </div>
                </div>
                <div class="menu-kanan">
                    <h1 class="mb-3">REKAP <?php echo $tanggalSekarang ?></h1>
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
                        <li><a href="fullRekap.php"><button style="background-color: #ffde38;">FULL REKAP</button></a>
                        </li>
                    </ul>
                </div>
            </section>
        </article>
    </main>
</body>

</html>