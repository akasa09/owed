-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2020 pada 09.46
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_pnm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bensin`
--

CREATE TABLE `tb_bensin` (
  `idbensin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jatah` varchar(50) NOT NULL,
  `terpakai` varchar(100) NOT NULL,
  `sisa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bensin`
--

INSERT INTO `tb_bensin` (`idbensin`, `nama`, `jatah`, `terpakai`, `sisa`) VALUES
(1, 'fitri', '20000', '2000', '18000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kaskeluar`
--

CREATE TABLE `tb_kaskeluar` (
  `idkaskeluar` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kaskeluar`
--

INSERT INTO `tb_kaskeluar` (`idkaskeluar`, `tanggal`, `keterangan`, `jumlah`) VALUES
(11, '2020-08-29', 'beli sabun', 'RP.4.000.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kasmasuk`
--

CREATE TABLE `tb_kasmasuk` (
  `idkas` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kasmasuk`
--

INSERT INTO `tb_kasmasuk` (`idkas`, `tanggal`, `keterangan`, `jumlah`) VALUES
(1, '2020-08-29', 'beli sabun', 'RP.3.000.000'),
(2, '2020-08-29', 'beli sabun', 'RP.3.000.000'),
(3, '2020-08-29', 'beli sabun', 'RP.3.000.000'),
(4, '2020-08-29', 'beli sabun', 'RP.9.000.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pulsa`
--

CREATE TABLE `tb_pulsa` (
  `idpulsa` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jatah` varchar(50) NOT NULL,
  `terpakai` varchar(100) NOT NULL,
  `sisa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pulsa`
--

INSERT INTO `tb_pulsa` (`idpulsa`, `nama`, `jatah`, `terpakai`, `sisa`) VALUES
(1, 'fitri', '20000', '', '18000'),
(2, 'iki', '300000', '2000', '298000'),
(3, 'fitria', '20000', '1000', '19000'),
(4, 'dani', '300000', '200', '299800'),
(5, 'dani', '300000', '200', '299800');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `idsaldo` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_saldo`
--

INSERT INTO `tb_saldo` (`idsaldo`, `tanggal`, `keterangan`, `jumlah`) VALUES
(2, '2020-08-29', 'saldo awal bulan', 'RP.2.000.000'),
(6, '2020-08-12', 'saldo awal tahun', 'RP.9.000.000'),
(23, '2020-08-22', 'saldo akhir bulan', 'RP.3.000.000'),
(28, '2020-08-20', 'saldo awal tahun', 'RP.4.000.000'),
(29, '0000-00-00', '', ''),
(31, '0000-00-00', '', ''),
(32, '0000-00-00', '', ''),
(33, '0000-00-00', '', ''),
(34, '0000-00-00', '', ''),
(35, '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'fitri', 'fitri123', ''),
(2, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bensin`
--
ALTER TABLE `tb_bensin`
  ADD PRIMARY KEY (`idbensin`);

--
-- Indeks untuk tabel `tb_kaskeluar`
--
ALTER TABLE `tb_kaskeluar`
  ADD PRIMARY KEY (`idkaskeluar`);

--
-- Indeks untuk tabel `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  ADD PRIMARY KEY (`idkas`);

--
-- Indeks untuk tabel `tb_pulsa`
--
ALTER TABLE `tb_pulsa`
  ADD PRIMARY KEY (`idpulsa`);

--
-- Indeks untuk tabel `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`idsaldo`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bensin`
--
ALTER TABLE `tb_bensin`
  MODIFY `idbensin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kaskeluar`
--
ALTER TABLE `tb_kaskeluar`
  MODIFY `idkaskeluar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  MODIFY `idkas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pulsa`
--
ALTER TABLE `tb_pulsa`
  MODIFY `idpulsa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_saldo`
--
ALTER TABLE `tb_saldo`
  MODIFY `idsaldo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
