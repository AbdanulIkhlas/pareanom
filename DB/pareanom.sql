-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2023 pada 19.45
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
  `jumlah` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `add_ons`
--

INSERT INTO `add_ons` (`id_add_ons`, `id_bahan_baku`, `nama_add_ons`, `harga`, `jumlah`, `foto`) VALUES
(1, 54, 'Nasi', 3000, 10, 'Nasi.png'),
(3, 24, 'Air Mineral', 3000, 5, 'AirMineral.png');

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
(10, 'Ayam Fillet', 'Otomatis', 'Pcs', 10),
(11, 'Kulit', 'Otomatis', 'Kg', 10),
(12, 'Kulit /45 Gram', 'Otomatis', 'Pcs', 10),
(13, 'Tepung Ayam', 'Manual', 'Kg', 10),
(14, 'Tepung Kulit', 'Manual', 'Kg', 10),
(15, 'Tepung Kasar', 'Manual', 'Kg', 10),
(16, 'Tepung Marinasi', 'Manual', 'Kg', 10),
(17, 'Tepung Buttermilk', 'Manual', 'Kg', 10),
(18, 'Bumbu Veggie', 'Manual', 'Kg', 10),
(19, 'Bumbu Telur', 'Manual', 'Kg', 10),
(20, 'Box Takeaway', 'Otomatis', 'Pcs', 10),
(21, 'Box Dine in', 'Otomatis', 'Kg', 10),
(22, 'Box Alacarte', 'Otomatis', 'Pcs', 10),
(23, 'Paperbag', 'Manual', 'Pcs', 10),
(24, 'Air Mineral', 'Otomatis', 'Pcs', 5),
(25, 'Teh Botol', 'Otomatis', 'Pcs', 10),
(26, 'Spicy Sauce', 'Otomatis', 'Pcs', 10),
(27, 'Red Sauce', 'Manual', 'Mg', 10),
(28, 'Curry Blok', 'Manual', 'Mg', 10),
(29, 'Telur', 'Otomatis', 'Pcs', 10),
(30, 'Kangkung', 'Manual', 'Ikat', 10),
(31, 'Cup 15 ml', 'Otomatis', 'Pcs', 10),
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
(54, 'Nasi', 'Otomatis', 'Pcs', 8),
(55, 'Veggie Crumbs', 'Otomatis', 'Pcs', 10),
(58, 'Paha Atas', 'Otomatis', 'Pcs', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_bahan_baku`, `nama_produk`, `harga`, `jumlah`, `foto`) VALUES
(1, 12, 'Pareanom Puas', 10000, 10, 'PareanomPuas.png'),
(2, 54, 'Pareanom Puas', 10000, 10, 'PareanomPuas.png'),
(5, 55, 'Pareanom Puas', 10000, 10, 'PareanomPuas.png'),
(7, 9, 'Pareanom Mantap Kecil', 16000, 10, 'PareanomMantapKecil.png'),
(8, 55, 'Pareanom Mantap Kecil', 16000, 10, 'PareanomMantapKecil.png'),
(9, 54, 'Pareanom Mantap Besar', 18000, 8, 'PareanomMantapBesar.png'),
(10, 58, 'Pareanom Mantap Besar', 18000, 8, 'PareanomMantapBesar.png');

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
(25, 12, 'Pareanom Puas', 10000, 2, '2023-05-28'),
(26, 54, 'Pareanom Puas', 10000, 2, '2023-05-28'),
(27, 55, 'Pareanom Puas', 10000, 2, '2023-05-28'),
(28, 12, 'Pareanom Puas', 10000, 1, '2023-05-28'),
(29, 54, 'Pareanom Puas', 10000, 1, '2023-05-28'),
(30, 55, 'Pareanom Puas', 10000, 1, '2023-05-28'),
(64, 12, 'Pareanom Puas', 10000, 2, '2023-05-31'),
(65, 54, 'Pareanom Puas', 10000, 2, '2023-05-31'),
(66, 55, 'Pareanom Puas', 10000, 2, '2023-05-31'),
(67, 24, 'Air Mineral', 3000, 3, '2023-05-31'),
(68, 12, 'Pareanom Puas', 10000, 3, '2023-05-31'),
(69, 54, 'Pareanom Puas', 10000, 3, '2023-05-31'),
(70, 55, 'Pareanom Puas', 10000, 3, '2023-05-31'),
(71, 24, 'Air Mineral', 3000, 3, '2023-05-31'),
(72, 54, 'Pareanom Mantap Besar', 18000, 2, '2023-06-01'),
(73, 58, 'Pareanom Mantap Besar', 18000, 2, '2023-06-01'),
(74, 24, 'Air Mineral', 3000, 5, '2023-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reject`
--

CREATE TABLE `reject` (
  `id_reject` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_reject` int(25) NOT NULL,
  `tanggal_reject` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `id_reject` int(11) NOT NULL,
  `id_produk_terjual` int(11) NOT NULL,
  `id_saldo` int(11) NOT NULL,
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
  `id_produk_terjual` int(11) NOT NULL,
  `total_saldo` double NOT NULL,
  `saldo_masuk_keluar` double NOT NULL,
  `tanggal_update` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 71000);

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
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`),
  ADD KEY `id_reject` (`id_reject`),
  ADD KEY `id_produk_terjual` (`id_produk_terjual`),
  ADD KEY `id_saldo` (`id_saldo`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_produk_terjual` (`id_produk_terjual`);

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
  MODIFY `id_add_ons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `produk_terjual`
--
ALTER TABLE `produk_terjual`
  MODIFY `id_produk_terjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `reject`
--
ALTER TABLE `reject`
  MODIFY `id_reject` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `temp_produk`
--
ALTER TABLE `temp_produk`
  MODIFY `id_temp_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  ADD CONSTRAINT `fk_reject_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `fk_rekap_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekap_produk_terjual` FOREIGN KEY (`id_produk_terjual`) REFERENCES `produk_terjual` (`id_produk_terjual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekap_reject` FOREIGN KEY (`id_reject`) REFERENCES `reject` (`id_reject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekap_saldo` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_saldo_produk_terjual` FOREIGN KEY (`id_produk_terjual`) REFERENCES `produk_terjual` (`id_produk_terjual`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
