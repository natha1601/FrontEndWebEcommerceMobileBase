-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2019 pada 08.39
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepulsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpjs`
--

CREATE TABLE `bpjs` (
  `id_bpjs` int(10) NOT NULL,
  `nama_bpjs` varchar(50) NOT NULL,
  `nomor_bpjs` varchar(11) NOT NULL,
  `id_kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bpjs`
--

INSERT INTO `bpjs` (`id_bpjs`, `nama_bpjs`, `nomor_bpjs`, `id_kelas`) VALUES
(1, 'Trya Sovi', '11223344556', 1),
(2, 'Halimatus Sakdiyah', '22334455667', 2),
(3, 'Orang Ketiga', '33445566778', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `tanggal_print` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_rtransaksi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `tanggal_print`, `id_user`, `id_rtransaksi`) VALUES
(6, '2019-01-09', 1, 5),
(7, '2019-01-09', 2, 3),
(8, '2019-01-09', 1, 4),
(9, '2019-01-09', 1, 4),
(10, '2019-01-09', 1, 4),
(11, '2019-01-09', 1, 6),
(12, '2019-01-09', 1, 5),
(13, '2019-01-09', 1, 5),
(14, '2019-01-09', 1, 6),
(15, '2019-01-09', 1, 5),
(16, '2019-01-09', 1, 4),
(17, '2019-01-09', 1, 4),
(18, '2019-01-09', 1, 5),
(19, '2019-01-09', 1, 5),
(20, '2019-01-09', 1, 4),
(21, '2019-01-09', 1, 4),
(22, '2019-01-09', 1, 6),
(23, '2019-01-09', 1, 6),
(24, '2019-01-09', 1, 4),
(25, '2019-01-09', 1, 6),
(26, '2019-01-09', 1, 6),
(27, '2019-01-09', 1, 5),
(28, '2019-01-10', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_bpjs`
--

CREATE TABLE `kelas_bpjs` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` int(2) NOT NULL,
  `iuran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_bpjs`
--

INSERT INTO `kelas_bpjs` (`id_kelas`, `nama_kelas`, `iuran`) VALUES
(1, 1, 80000),
(2, 2, 51000),
(3, 3, 25500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_rtransaksi` int(11) NOT NULL,
  `id_bpjs` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `periode` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_rtransaksi`, `id_bpjs`, `tanggal_input`, `periode`, `id_user`) VALUES
(2, 3, '2018-12-01 07:07:34', '2019-04-26', 2),
(3, 3, '2018-12-01 01:41:16', '2019-05-26', 2),
(4, 3, '2018-12-01 22:22:09', '2019-06-26', 1),
(5, 1, '2018-12-16 10:43:29', '2019-05-04', 1),
(6, 3, '2019-01-07 08:25:50', '2019-07-26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_bpjs`
--

CREATE TABLE `transaksi_bpjs` (
  `id_transaksi` int(11) NOT NULL,
  `bpjs` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_bpjs`
--

INSERT INTO `transaksi_bpjs` (`id_transaksi`, `bpjs`, `tanggal_transaksi`, `id_user`, `tanggal_input`) VALUES
(1, 1, '2019-05-04', 1, '2019-01-06 12:48:57'),
(2, 2, '2018-12-26', 1, '2018-12-04 07:41:09'),
(3, 3, '2019-07-26', 1, '2019-01-07 08:25:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(10) NOT NULL,
  `pin` int(6) NOT NULL,
  `deposit` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `no_hp`, `password`, `nama`, `email`, `foto`, `pin`, `deposit`) VALUES
(1, '081234567890', 'test1', 'Nathasia Irawan', 'nathasia@ayomail.com', 'foto1', 123456, 891500),
(2, '089123456789', 'test2', 'Tanpa Nama', 'tanpa@ayomail.com', 'foto2', 654321, 50000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bpjs`
--
ALTER TABLE `bpjs`
  ADD PRIMARY KEY (`id_bpjs`),
  ADD KEY `kelas_bpjs` (`id_kelas`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_rtransaksi` (`id_rtransaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kelas_bpjs`
--
ALTER TABLE `kelas_bpjs`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indeks untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id_rtransaksi`),
  ADD KEY `id_bpjs` (`id_bpjs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi_bpjs`
--
ALTER TABLE `transaksi_bpjs`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `bpjs` (`bpjs`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bpjs`
--
ALTER TABLE `bpjs`
  MODIFY `id_bpjs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kelas_bpjs`
--
ALTER TABLE `kelas_bpjs`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id_rtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi_bpjs`
--
ALTER TABLE `transaksi_bpjs`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bpjs`
--
ALTER TABLE `bpjs`
  ADD CONSTRAINT `bpjs_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_bpjs` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_rtransaksi`) REFERENCES `riwayat_transaksi` (`id_rtransaksi`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `kelas_bpjs`
--
ALTER TABLE `kelas_bpjs`
  ADD CONSTRAINT `kelas_bpjs_ibfk_1` FOREIGN KEY (`nama_kelas`) REFERENCES `bpjs` (`id_bpjs`);

--
-- Ketidakleluasaan untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD CONSTRAINT `riwayat_transaksi_ibfk_1` FOREIGN KEY (`id_bpjs`) REFERENCES `bpjs` (`id_bpjs`),
  ADD CONSTRAINT `riwayat_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi_bpjs`
--
ALTER TABLE `transaksi_bpjs`
  ADD CONSTRAINT `transaksi_bpjs_ibfk_1` FOREIGN KEY (`bpjs`) REFERENCES `bpjs` (`id_bpjs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
