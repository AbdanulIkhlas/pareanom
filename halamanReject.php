<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pareanom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/halamanReject.css">
</head>

<body>
    <main>
        <nav>
            <header>
                <a href="index.php">
                    <!--? Halaman Reject  -->
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
                <div class="container-card-produk">
                    <?php 
                    include 'database.php';
                    $query = mysqli_query($connect, "SELECT DISTINCT nama_produk, harga, foto FROM produk ORDER BY harga ASC");
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
                                    <div class="close-produk">
                                        <a href="halamanReject.php">
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
                                        <div class="row mb-3">
                                            <label for="colFormLabelSm"
                                                class="col-sm-2 col-form-label col-form-label-sm label-jumlah-produk">Keterangan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="keterangan"
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
            <div class="container-kanan">
                <section class="addOns">
                    <h2>ADDONS</h2>
                    <div class="container-card-addOns">
                        <?php 
                        $queryAddOns = mysqli_query($connect, "SELECT DISTINCT nama_add_ons, harga, foto FROM add_ons ORDER BY harga ASC");
                        while($data = mysqli_fetch_array($queryAddOns)) :
                            ?>
                        <form action="DBInsert_reject.php" method="post">
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
                                        <div class="close-addOns">
                                            <a href="halamanReject.php">
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
            </div>
        </article>
    </main>

    <script src="assets/scripts/halamanReject.js"></script>
</body>

</html>