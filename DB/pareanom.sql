-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 04.17
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pareanom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `add_ons`
--

CREATE TABLE `add_ons` (
  `id_add_ons` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `nama_add_ons` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `add_ons`
--

INSERT INTO `add_ons` (`id_add_ons`, `id_bahan_baku`, `nama_add_ons`, `harga`, `foto`) VALUES
(6, 29, 'Telur', 3000, 'Telur.png'),
(7, 54, 'Nasi', 3000, 'Nasi.png'),
(8, 24, 'Air Mineral', 3000, 'AirMineral.png'),
(9, 61, 'Dada', 12000, 'Dada.png'),
(10, 11, 'Kulit Ayam', 14000, 'KulitAyam.png'),
(12, 8, 'Sayap', 12000, 'Sayap.png'),
(13, 9, 'Paha Bawah', 10000, 'PahaBawah.png'),
(14, 58, 'Paha Atas', 12000, 'PahaAtas.png'),
(15, 25, 'Teh Kotak', 3000, 'TehKotak.png'),
(16, 31, 'Veggie Crumbs', 3000, 'VeggieCrumbs.png'),
(17, 55, 'Veggie Crumbs', 3000, 'VeggieCrumbs.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `jenis_bahan` varchar(25) NOT NULL,
  `satuan_bahan` varchar(25) NOT NULL,
  `stok_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `nama_bahan`, `jenis_bahan`, `satuan_bahan`, `stok_bahan`) VALUES
(8, 'Sayap', 'Otomatis', 'Pcs', 10),
(9, 'Paha Bawah', 'Otomatis', 'Pcs', 10),
(10, 'Ayam Fillet', 'Otomatis', 'Pcs', 40),
(11, 'Kulit', 'Otomatis', 'Pcs', 50),
(12, 'Kulit /45 Gram', 'Otomatis', 'Pcs', 9),
(13, 'Tepung Ayam', 'Manual', 'Kg', 10),
(14, 'Tepung Kulit', 'Manual', 'Kg', 10),
(15, 'Tepung Kasar', 'Manual', 'Kg', 10),
(16, 'Tepung Marinasi', 'Manual', 'Kg', 10),
(17, 'Tepung Buttermilk', 'Manual', 'Kg', 10),
(18, 'Bumbu Veggie', 'Manual', 'Kg', 10),
(19, 'Bumbu Telur', 'Manual', 'Kg', 10),
(20, 'Box Takeaway', 'Otomatis', 'Pcs', 10),
(21, 'Box Dine in', 'Otomatis', 'Kg', 7),
(22, 'Box Alacarte', 'Otomatis', 'Pcs', 10),
(23, 'Paperbag', 'Manual', 'Pcs', 10),
(24, 'Air Mineral', 'Otomatis', 'Pcs', 19),
(25, 'Teh Kotak', 'Otomatis', 'Pcs', 6),
(26, 'Spicy Sauce', 'Otomatis', 'Pcs', 10),
(27, 'Red Sauce', 'Manual', 'Mg', 10),
(28, 'Curry Blok', 'Manual', 'Mg', 10),
(29, 'Telur', 'Otomatis', 'Pcs', 10),
(30, 'Kangkung', 'Manual', 'Ikat', 10),
(31, 'Cup 15 ml', 'Otomatis', 'Pcs', 7),
(32, 'Cup 30 ml', 'Otomatis', 'Pcs', 10),
(33, 'Saos Sachet', 'Manual', 'Pack', 10),
(34, 'Sendok', 'Otomatis', 'Pcs', 10),
(35, 'Sumpit', 'Otomatis', 'Pcs', 10),
(36, 'Kertas Thermal', 'Manual', 'Pcs', 10),
(37, 'Plastik PE 15 ml', 'Manual', 'Pack', 10),
(38, 'Plastik PE 24 ml', 'Manual', 'Pack', 10),
(39, 'Paper Rice', 'Otomatis', 'Pcs', 10),
(40, 'Hand Glove', 'Manual', 'Pack', 10),
(41, 'Plastik 1/4', 'Manual', 'Pack', 10),
(42, 'Plastik  Marinasi', 'Manual', 'Pack', 10),
(43, 'Tisu Pelanggan', 'Manual', 'Pack', 10),
(44, 'Beras', 'Manual', 'Kg', 10),
(45, 'Gas 3 Kg', 'Manual', 'Pcs', 10),
(46, 'Gas 12 Kg', 'Manual', 'Pcs', 10),
(47, 'Hot Plate', 'Manual', 'Set', 10),
(48, 'Wijen', 'Manual', 'Liter', 10),
(49, 'Detergen', 'Manual', 'Pcs', 10),
(50, 'Sunlight', 'Manual', 'Pcs', 10),
(51, 'Teh Bubuk', 'Manual', 'Pack', 10),
(52, 'Gula Pasir', 'Manual', 'Kg', 10),
(53, 'Trash Bag', 'Manual', 'Pcs', 10),
(54, 'Nasi', 'Otomatis', 'Pcs', 20),
(55, 'Veggie Crumbs', 'Otomatis', 'Pcs', 6),
(58, 'Paha Atas', 'Otomatis', 'Pcs', 8),
(60, 'Sambal Sachet', 'Otomatis', 'Pcs', 30),
(61, 'Dada', 'Otomatis', 'Pcs', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_bahan_baku`, `nama_produk`, `harga`, `foto`) VALUES
(17, 12, 'Pareanom Puas', 10000, 'PareanomPuas.png'),
(18, 21, 'Pareanom Puas', 10000, 'PareanomPuas.png'),
(19, 31, 'Pareanom Puas', 10000, 'PareanomPuas.png'),
(20, 54, 'Pareanom Puas', 10000, 'PareanomPuas.png'),
(21, 55, 'Pareanom Puas', 10000, 'PareanomPuas.png'),
(22, 60, 'Pareanom Puas', 10000, 'PareanomPuas.png'),
(33, 10, 'Pareanom Combo', 20000, 'PareanomCombo.png'),
(34, 21, 'Pareanom Combo', 20000, 'PareanomCombo.png'),
(35, 25, 'Pareanom Combo', 20000, 'PareanomCombo.png'),
(36, 31, 'Pareanom Combo', 20000, 'PareanomCombo.png'),
(37, 54, 'Pareanom Combo', 20000, 'PareanomCombo.png'),
(38, 55, 'Pareanom Combo', 20000, 'PareanomCombo.png'),
(39, 8, 'Pareanom Mantap Kecil ( Sayap )', 16000, 'PareanomMantapKecil.png'),
(40, 21, 'Pareanom Mantap Kecil ( Sayap )', 16000, 'PareanomMantapKecil.png'),
(41, 26, 'Pareanom Mantap Kecil ( Sayap )', 16000, 'PareanomMantapKecil.png'),
(42, 31, 'Pareanom Mantap Kecil ( Sayap )', 16000, 'PareanomMantapKecil.png'),
(43, 54, 'Pareanom Mantap Kecil ( Sayap )', 16000, 'PareanomMantapKecil.png'),
(44, 55, 'Pareanom Mantap Kecil ( Sayap )', 16000, 'PareanomMantapKecil.png'),
(45, 21, 'Pareanom Mantap Besar( Dada)', 18000, 'PareanomMantapBesar.png'),
(46, 26, 'Pareanom Mantap Besar( Dada)', 18000, 'PareanomMantapBesar.png'),
(47, 31, 'Pareanom Mantap Besar( Dada)', 18000, 'PareanomMantapBesar.png'),
(48, 54, 'Pareanom Mantap Besar( Dada)', 18000, 'PareanomMantapBesar.png'),
(49, 55, 'Pareanom Mantap Besar( Dada)', 18000, 'PareanomMantapBesar.png'),
(50, 61, 'Pareanom Mantap Besar( Dada)', 18000, 'PareanomMantapBesar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_terjual`
--

CREATE TABLE `produk_terjual` (
  `id_produk_terjual` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `nama_produk_terjual` varchar(50) NOT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah_produk_terjual` int(25) NOT NULL,
  `tanggal_terjual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_terjual`
--

INSERT INTO `produk_terjual` (`id_produk_terjual`, `id_bahan_baku`, `nama_produk_terjual`, `harga_satuan`, `jumlah_produk_terjual`, `tanggal_terjual`) VALUES
(83, 10, 'Pareanom Combo', 20000, 1, '2023-06-03'),
(84, 21, 'Pareanom Combo', 20000, 1, '2023-06-03'),
(85, 25, 'Pareanom Combo', 20000, 1, '2023-06-03'),
(86, 31, 'Pareanom Combo', 20000, 1, '2023-06-03'),
(87, 54, 'Pareanom Combo', 20000, 1, '2023-06-03'),
(88, 55, 'Pareanom Combo', 20000, 1, '2023-06-03'),
(89, 10, 'Pareanom Combo', 20000, 2, '2023-06-04'),
(90, 21, 'Pareanom Combo', 20000, 2, '2023-06-04'),
(91, 25, 'Pareanom Combo', 20000, 2, '2023-06-04'),
(92, 31, 'Pareanom Combo', 20000, 2, '2023-06-04'),
(93, 54, 'Pareanom Combo', 20000, 2, '2023-06-04'),
(94, 55, 'Pareanom Combo', 20000, 2, '2023-06-04'),
(96, 11, 'Kulit Ayam', 14000, 5, '2023-06-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reject`
--

CREATE TABLE `reject` (
  `id_reject` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `jumlah_reject` int(25) NOT NULL,
  `tanggal_reject` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reject`
--

INSERT INTO `reject` (`id_reject`, `id_bahan_baku`, `jumlah_reject`, `tanggal_reject`, `keterangan`) VALUES
(14, 25, 1, '2023-06-04', 'Bocor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `tanggal_rekap` date NOT NULL,
  `catatan_rekap` varchar(100) NOT NULL,
  `hasil_rekap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `nominal_saldo` double NOT NULL,
  `tanggal_update` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `nominal_saldo`, `tanggal_update`, `keterangan`, `jenis`) VALUES
(1, 10000, '2023-06-04', 'Dapat Dari Bos', 'Pemasukan'),
(2, 5000, '2023-06-04', 'Jajan Dulu Gak Sih', 'Pengeluaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_produk`
--

CREATE TABLE `temp_produk` (
  `id_temp_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_saldo`
--

CREATE TABLE `total_saldo` (
  `id_total_saldo` int(11) NOT NULL,
  `total_saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `total_saldo`
--

INSERT INTO `total_saldo` (`id_total_saldo`, `total_saldo`) VALUES
(1, 155000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`id_add_ons`),
  ADD KEY `fk_add_ons_bahan_baku` (`id_bahan_baku`);

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indeks untuk tabel `produk_terjual`
--
ALTER TABLE `produk_terjual`
  ADD PRIMARY KEY (`id_produk_terjual`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`),
  ADD KEY `id_bahan_baku_2` (`id_bahan_baku`);

--
-- Indeks untuk tabel `reject`
--
ALTER TABLE `reject`
  ADD PRIMARY KEY (`id_reject`),
  ADD KEY `id_produk` (`id_bahan_baku`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indeks untuk tabel `temp_produk`
--
ALTER TABLE `temp_produk`
  ADD PRIMARY KEY (`id_temp_produk`);

--
-- Indeks untuk tabel `total_saldo`
--
ALTER TABLE `total_saldo`
  ADD PRIMARY KEY (`id_total_saldo`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `id_add_ons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `produk_terjual`
--
ALTER TABLE `produk_terjual`
  MODIFY `id_produk_terjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `reject`
--
ALTER TABLE `reject`
  MODIFY `id_reject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `temp_produk`
--
ALTER TABLE `temp_produk`
  MODIFY `id_temp_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `total_saldo`
--
ALTER TABLE `total_saldo`
  MODIFY `id_total_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `add_ons`
--
ALTER TABLE `add_ons`
  ADD CONSTRAINT `fk_add_ons_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_terjual`
--
ALTER TABLE `produk_terjual`
  ADD CONSTRAINT `fk_produk_terjual_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reject`
--
ALTER TABLE `reject`
  ADD CONSTRAINT `fk_reject_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
