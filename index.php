<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pareanom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/produk.css">
</head>

<body>
    <main>
        <?php
        //! menampilkan notifikasi (berhasil)
        if (isset($_GET['pesan'])) { ?>
        <div class="notif-berhasil">
            <?php if ($_GET['pesan'] == "input_produk_berhasil") { ?>
            <p>BERHASIL MENAMBAHKAN <br> PRODUK</p>
            <?php } else if ($_GET['pesan'] == "input_add_ons_berhasil") { ?>
            <p> BERHASIL MENAMBAHKAN <br> ADD ONS</p>
            <?php } else if ($_GET['pesan'] == "hapus_card_berhasil") { ?>
            <p> BERHASIL MENGHAPUS <br> CARD</p>
            <?php } else if ($_GET['pesan'] == "hapusProdukYangAkanDiBeliBerhasil") { ?>
            <p> BERHASIL MENGHAPUS PRODUK <br> YANG AKAN DI BELI</p>
            <?php } else if ($_GET['pesan'] == "pembelian_berhasil") { ?>
            <p> PEMBELIAN BERHASIL</p>
            <?php } ?>
        </div>
        <?php 
        //! menampilkan notifikasi (gagal) 
        ?>
        <div class="notif-gagal">
            <?php if ($_GET['pesan'] == "input_produk_gagal") { ?>
            <p> GAGAL MENAMBAHKAN <br> PRODUK</p>
            <?php } else if ($_GET['pesan'] == "input_add_ons_gagal") { ?>
            <p> GAGAL MENAMBAHKAN <br> ADD ONS</p>
            <?php } else if ($_GET['pesan'] == "hapus_card_gagal") { ?>
            <p> GAGAL MENGHAPUS <br> CARD</p>
            <?php } else if ($_GET['pesan'] == "hapusProdukYangAkanDiBeliGagal") { ?>
            <p> GAGAL MENGHAPUS PRODUK <br> YANG AKAN DI BELI</p>
            <?php } else if ($_GET['pesan'] == "pembelian_gagal") { ?>
            <p> PEMBELIAN GAGAL</p>
            <?php } ?>
        </div>
        <?php
        }
        ?>
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
            <section class="produk">
                <h2>PRODUK</h2>
                <div class="container-button-tambahProduk">
                    <a href="tambahProduk.php">
                        <button>Tambah</button>
                    </a>
                </div>
                <div class="container-card-produk">
                    <?php 
                    include 'database.php';
                    $query = mysqli_query($connect, "SELECT DISTINCT nama_produk, harga, foto FROM produk ORDER BY harga ASC, nama_produk ASC");
                    while($data = mysqli_fetch_array($query)) :
                    ?>
                    <form action="dbInput_temp_produk.php" method="post">
                        <div class="card-produk">
                            <section>
                                <div class="gambar-produk">
                                    <img src="assets/image/<?php echo $data['foto'] ?>">
                                </div>
                                <div class="nama-produk">
                                    <p><?php echo $data['nama_produk'] ?></p>
                                </div>
                                <div class="harga-produk">
                                    <p><?php echo $data['harga'] ?></p>
                                </div>
                                <input type="hidden" name="foto" value="<?php echo $data['foto'] ?>">
                                <input type="hidden" name="nama_produk" value="<?php echo $data['nama_produk'] ?>">
                                <input type="hidden" name="harga" value="<?php echo $data['harga'] ?>">
                            </section>
                            <div class="container-popUp-produk">
                                <section>
                                    <div class="delete">
                                        <a
                                            href="DBDelete_produk.php?nama_produk=<?php echo $data['nama_produk'] ?>&tanda=1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="white"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="close-produk">
                                        <a href="index.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="white"
                                                class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="foto-produk">
                                        <img src="assets/image/<?php echo $data['foto'] ?>">
                                    </div>
                                    <div id="nama-produk">
                                        <p><?php echo $data['nama_produk'] ?></p>
                                    </div>
                                    <div class="harga-produk">
                                        <p><?php echo $data['harga'] ?></p>
                                    </div>
                                    <div class="jumlah-pembelian-produk">
                                        <div class="row mb-3">
                                            <label for="colFormLabelSm"
                                                class="col-sm-2 col-form-label col-form-label-sm label-jumlah-produk">Jumlah</label>
                                            <div class="col-sm-6">
                                                <input type="number" name="jumlah" class="form-control form-control-sm"
                                                    id="colFormLabelSm">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit">OK</button>
                                </section>
                            </div>
                        </div>
                    </form>
                    <?php endwhile ?>
                </div>
            </section>
            <div class="container-kanan">
                <section class="addOns">
                    <h2>ADDONS</h2>
                    <div class="container-button-tambahAddOns">
                        <a href="tambahAddOns.php">
                            <button>Tambah</button>
                        </a>
                    </div>
                    <div class="container-card-addOns">
                        <?php 
                        $queryAddOns = mysqli_query($connect, "SELECT DISTINCT nama_add_ons, harga, foto FROM add_ons ORDER BY harga ASC, nama_add_ons ASC");
                        while($data = mysqli_fetch_array($queryAddOns)) :
                            ?>
                        <form action="dbInput_temp_produk.php" method="post">
                            <div class="card-addOns">
                                <section>
                                    <div class="gambar-addOns">
                                        <img src="assets/image/<?php echo $data['foto'] ?>">
                                    </div>
                                    <div class="nama-addOns">
                                        <p><?php echo $data['nama_add_ons'] ?></p>
                                    </div>
                                    <div class="harga-addOns">
                                        <p><?php echo $data['harga'] ?></p>
                                    </div>
                                </section>
                                <div class="container-popUp-addOns">
                                    <section>
                                        <div class="delete">
                                            <a
                                                href="DBDelete_produk.php?nama_produk=<?php echo $data['nama_add_ons'] ?>&tanda=2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                                    fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="close-addOns">
                                            <a href="index.php">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                                    fill="white" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="foto-addOns">
                                            <img src="assets/image/<?php echo $data['foto'] ?>">
                                        </div>
                                        <div id="nama-addOns">
                                            <p "><?php echo $data['nama_add_ons'] ?></p>
                                        </div>
                                        <div class=" harga-addOns">
                                                <p><?php echo $data['harga'] ?></p>
                                        </div>
                                        <input type="hidden" name="foto" value="<?php echo $data['foto'] ?>">
                                        <input type="hidden" name="nama_produk"
                                            value="<?php echo $data['nama_add_ons'] ?>">
                                        <input type="hidden" name="harga" value="<?php echo $data['harga'] ?>">
                                        <div class="jumlah-pembelian-addOns">
                                            <div class="row mb-3">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm label-jumlah-addOns">Jumlah</label>
                                                <div class="col-sm-6">
                                                    <input type="number" name="jumlah"
                                                        class="form-control form-control-sm" id="colFormLabelSm">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit">OK</button>
                                    </section>
                                </div>
                            </div>
                        </form>
                        <?php endwhile ?>
                    </div>
                </section>
                <section class="total">
                    <h2>TOTAL</h2>
                    <div class="container-total">
                        <!--? Container Pembelian  -->
                        <form action="dbInput_produk_terjual.php" method="POST">
                            <div class="box-awal-total">
                                <?php 
                                $query2 = mysqli_query($connect, "SELECT * FROM temp_produk");
                                $dataArray = array(); //! Array kosong untuk menyimpan data dari database
                                $totalHarga = 0; //! Variabel total harga
                                if($totalHarga == 0){
                                    echo `<div class="div-kosong"></div>`;
                                }
                                while($data = mysqli_fetch_array($query2)) :
                                
                                    $dataArray[] = $data; //! Menyimpan data dalam array
                                    //! Menampilkan data produk
                                ?>
                                <div class="produk-dibeli">
                                    <div class="card-produk-dibeli">
                                        <div class="foto">
                                            <img src="assets/image/<?php echo $data['foto'] ?>">
                                        </div>
                                        <div class="nama-produk">
                                            <p><?php echo $data['nama_produk'] ?></p>
                                        </div>
                                        <div class="jumlah">
                                            <p><?php echo $data['jumlah'] ?></p>
                                        </div>
                                        <div class="tombol-delete">
                                            <a
                                                href="dbDelete_temp_produk.php?id_temp_produk=<?php echo $data['id_temp_produk']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    //! Menjumlahkan total harga
                                    $totalHarga += $data['harga'] * $data['jumlah'];
                                endwhile ;
                                ?>
                            </div>
                            <footer>
                                <div class="total-harga">
                                    <p>TOTAL HARGA: <?php echo $totalHarga; ?></p>
                                    <input type="hidden" name="total_harga" value="<?php echo $totalHarga ?>">
                                </div>
                                <?php 
                                //! Set Tanggal sekarang
                                date_default_timezone_set('Asia/Jakarta');
                                $tanggalSekarang = date("Y-m-d"); 
                                ?>
                                <input type="hidden" name="tanggal" value="<?php echo $tanggalSekarang ?>">
                                <?php
                                    //! Mengirimkan data dalam $dataArray sebagai input tersembunyi
                                    foreach ($dataArray as $data) {
                                        echo '<input type="hidden" name="dataArray[]" value="' . htmlspecialchars(json_encode($data)) . '">';
                                    }
                                    ?>
                                <button class="confirm" type="submit">CONFIRM</button>
                            </footer>
                        </form>
                    </div>
                </section>
            </div>
        </article>
    </main>

    <script src="assets/scripts/produk.js"></script>
</body>

</html>