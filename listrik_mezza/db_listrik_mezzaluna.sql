-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2022 pada 09.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_listrik_mezzaluna`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `no_meter` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `no_meter`, `nama`, `alamat`, `id_tarif`) VALUES
(0, 0, '', '', 0),
(1, 1411, 'HASAN', 'cibadak', 1),
(2, 1412, 'JAMALUDIN', 'cicatayan', 3),
(4, 1414, 'ARJUNA RIMBA ASMARA', 'cicatih', 2),
(5, 1415, 'putri', 'cicurug', 3),
(7, 1416, 'awaludin', 'cicurug', 3),
(8, 1417, 'yayan', 'cidahu', 3),
(9, 1417, 'putri', 'cicurug', 1),
(10, 1411, 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_bayar` int(10) NOT NULL,
  `id_tagihan` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `bulan_bayar` varchar(12) DEFAULT NULL,
  `biaya_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_bayar`, `id_tagihan`, `tanggal`, `bulan_bayar`, `biaya_admin`) VALUES
(1, 1, '2022-01-06', 'januari', 2500),
(2, 1, '2022-02-20', 'february', 2500),
(3, 1, '2022-04-01', '3', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penggunaan`
--

CREATE TABLE `tbl_penggunaan` (
  `id_penggunaan` int(10) NOT NULL,
  `id_pelanggan` int(10) DEFAULT NULL,
  `bulan` varchar(12) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penggunaan`
--

INSERT INTO `tbl_penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
(1, 2, 'januari', 2022, 150, 150),
(2, 4, 'januari', 2022, 150, 150),
(3, 1, '2', 2, 2, 2),
(4, 7, '4', 4, 4, 4),
(5, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tagihan`
--

CREATE TABLE `tbl_tagihan` (
  `id_tagihan` int(10) NOT NULL,
  `id_penggunaan` int(10) DEFAULT NULL,
  `bulan` varchar(12) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tagihan`
--

INSERT INTO `tbl_tagihan` (`id_tagihan`, `id_penggunaan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
(1, 1, 'januari', 2022, 150, 'Tunggakan'),
(2, 2, 'januari', 2022, 100, 'Belum lunas'),
(3, 4, '3', 3, 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tarif`
--

CREATE TABLE `tbl_tarif` (
  `id_tarif` int(10) NOT NULL,
  `daya` int(10) DEFAULT NULL,
  `tarif_perkwh` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tarif`
--

INSERT INTO `tbl_tarif` (`id_tarif`, `daya`, `tarif_perkwh`) VALUES
(1, 900, 250000),
(2, 1200, 450000),
(3, 1500, 700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nama_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'budi', '202cb962ac59075b964b07152d234b70', 'budi'),
(4, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_tagihan_2` (`id_tagihan`),
  ADD KEY `id_tagihan_3` (`id_tagihan`);

--
-- Indeks untuk tabel `tbl_penggunaan`
--
ALTER TABLE `tbl_penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_tagihan`
--
ALTER TABLE `tbl_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`),
  ADD KEY `id_penggunaan_2` (`id_penggunaan`);

--
-- Indeks untuk tabel `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_bayar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_penggunaan`
--
ALTER TABLE `tbl_penggunaan`
  MODIFY `id_penggunaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_tagihan`
--
ALTER TABLE `tbl_tagihan`
  MODIFY `id_tagihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
