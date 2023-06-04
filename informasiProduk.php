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
    <link rel="stylesheet" href="assets/styles/infromasiProduk.css">
</head>

<body>
    <main>
        <nav>
            <header>
                <a href="index.php">
                    <!--? Halaman Informasi Produk  -->
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
                <h1>INFORMASI PRODUK</h1>
            </div>
            <section>
                <?php 
                include 'database.php';
                $query = mysqli_query($connect, "SELECT DISTINCT nama_produk, harga, foto FROM produk ORDER BY harga ASC, nama_produk ASC");
                ?>
                <div class="tabel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Bahan Baku</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <?php 
                        $id = 1;
                        while($data = mysqli_fetch_array($query)) :
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $data['nama_produk'] ?></td>
                                <?php 
                                $namaProduk = $data['nama_produk']; 
                                $queryBahan = mysqli_query($connect, "SELECT b.nama_bahan FROM bahan_baku b 
                                INNER JOIN produk p ON b.id_bahan_baku = p.id_bahan_baku WHERE p.nama_produk = '$namaProduk'");
                                ?>
                                <td>
                                    <ul style="list-style-type: none; padding-left: 20px; text-align: left;">
                                        <?php while($bahanBaku = mysqli_fetch_array($queryBahan)) : ?>
                                        <li>
                                            - <?php echo $bahanBaku['nama_bahan'] ?>
                                        </li>
                                        <?php endwhile ?>
                                    </ul>
                                </td>
                                <td><?php echo $data['harga'] ?></td>
                            </tr>
                        </tbody>
                        <?php 
                        $id++;
                        endwhile 
                        ?>
                    </table>
                </div>
            </section>
        </article>
    </main>
    <script src="assets/scripts/notifikasi.js"></script>
</body>

</html>