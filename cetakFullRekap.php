<?php
// ! mencetak full rekas
include 'database.php';
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$tanggalCetak = $_POST['tanggalCetak'];
$catatan = $_POST['catatan'];
$tanggalDB = $_POST['tanggalDB'];

$filename = "FullRekap(".$tanggalCetak.").pdf";

$queryPenjualanProduk = "SELECT DISTINCT nama_produk_terjual, harga_satuan, SUM(jumlah_produk_terjual) AS jumlah_produk_terjual 
                        FROM produk_terjual WHERE tanggal_terjual = '$tanggalDB' GROUP BY nama_produk_terjual,id_bahan_baku";
$queryBahanBaku = "SELECT p.id_bahan_baku,b.nama_bahan,  SUM(p.jumlah_produk_terjual) as total_jumlah 
                    FROM produk_terjual p INNER JOIN bahan_baku b ON p.id_bahan_baku = b.id_bahan_baku 
                    WHERE p.tanggal_terjual = '$tanggalDB' GROUP BY p.id_bahan_baku";
$queryReject = "SELECT bahan_baku.nama_bahan, SUM(reject.jumlah_reject) AS jumlah_reject, 
                reject.keterangan FROM bahan_baku INNER JOIN reject
                ON bahan_baku.id_bahan_baku = reject.id_bahan_baku 
                WHERE reject.tanggal_reject = '$tanggalDB' GROUP BY reject.id_bahan_baku, reject.keterangan";
$queryKeuangan = "SELECT * FROM saldo WHERE tanggal_update = '$tanggalDB'";

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pareanom Full Rekap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/styles/cetakFullRekap.css">
</head>
<body>
    
    <div class="isi-rekap">
        <h1>REKAP '. $tanggalCetak .'</h1>
        <h2>PENJUALAN PRODUK :</h2>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk / Add Ons</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>';
            $query = mysqli_query($connect, $queryPenjualanProduk);
            $id = 1;
            $TOTAL = 0;
            while ($data = mysqli_fetch_array($query)) {
                $harga_satuan = $data["harga_satuan"];
                $jumlah_produk_terjual = $data["jumlah_produk_terjual"];
                $total = $harga_satuan * $jumlah_produk_terjual;
        $html.='<tbody>
                    <tr>
                        <td>'.$id.'</td>
                        <td>'.$data["nama_produk_terjual"].'</td>
                        <td>'.$data["jumlah_produk_terjual"].'</td>
                        <td>'.$total.'</td>
                    </tr>
                </tbody>';
                $id++;
                $TOTAL += $total;
            }
$html.='</table>
        <div class="total">
            <h3>TOTAL : Rp. '.$TOTAL.'</h3>        
        </div>
        <h2>BAHAN TERPAKAI :</h2>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bahan</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>';
            $query = mysqli_query($connect, $queryBahanBaku);
            $id = 1;
            while ($data = mysqli_fetch_array($query)) {
        $html.='<tbody>
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$data["nama_bahan"].'</td>
                    <td>'.$data["total_jumlah"].'</td>
                </tr>
            </tbody>';        
            $id++;
            }
$html.='</table>
            <h2>REJECT :</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Bahan / Add Ons</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">keterangan</th>
                    </tr>
                </thead>';            
                $query = mysqli_query($connect, $queryReject);
                $id = 1;
                while ($data = mysqli_fetch_array($query)) {
        $html.='<tbody>
                    <tr style="background-color: #ff4434; color: white;">
                        <td>'.$id.'</td>
                        <td>'.$data["nama_bahan"].'</td>
                        <td>'.$data["jumlah_reject"].'</td>
                        <td>'.$data["keterangan"].'</td>
                    </tr>  
                </tbody>';        
                $id++;
                }
$html.='</table>
            <h2>KEUANGAN :</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Jenis</th>
                    </tr>
                </thead>';
        $query = mysqli_query($connect, $queryKeuangan);
        $id = 1;
        while ($data = mysqli_fetch_array($query)) {
            $tanggal_update = date("d - F - Y", strtotime($data["tanggal_update"]));
            if ($data['jenis'] == "Pemasukan") {
        $html.='<tbody>
                    <tr style="background-color: cornflowerblue; color: white;">
                        <td>'.$id.'</td>
                        <td>'.$data["nominal_saldo"].'</td>
                        <td>'.$tanggal_update.'</td>
                        <td>'.$data["keterangan"].'</td>
                        <td>'.$data["jenis"].'</td>
                    </tr> 
                </tbody>';        
            } else {
        $html.='<tbody>
                    <tr style="background-color: #ff4434; color: white;">
                        <td >'.$id.'</td>
                        <td>'.$data["nominal_saldo"].'</td>
                        <td>'.$tanggal_update.'</td>
                        <td>'.$data["keterangan"].'</td>
                        <td>'.$data["jenis"].'</td>
                    </tr> 
                </tbody>';
            }
            $id++;
        }
$html.='</table>
        <h2> CATATAN </h2>
        <div class="form-catatan">
            <textarea class="form-control" name="catatan" id="floatingTextarea" readonly>'.$catatan.'</textarea>
        </div>';
$html.='</div>';

$mpdf->WriteHTML($html);
$mpdf->Output($filename,"I");

?>