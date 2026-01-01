-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2025 pada 11.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi12_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi`
--

CREATE TABLE `opsi` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kehadiran` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `opsi`
--

INSERT INTO `opsi` (`id`, `nip`, `nama`, `kehadiran`) VALUES
(1, '121212121212121212', 'abuy', 0),
(6, '131313131313131313', 'Jawir', 0),
(7, '483920174658392017', 'jhon', 0),
(8, '750184936205748193', 'doe', 0),
(9, '962384710593847261', 'amoy', 0),
(10, '104938572610394857', 'arachu', 0),
(11, '839471026583947105', 'bree', 0),
(12, '275839104857293846', 'rajagula', 0),
(13, '691047382950174638', 'bray', 0),
(14, '358271940638592741', 'wlala', 0),
(15, '122222222222222221', 'boboiboy', 0),
(17, '817381637839217', 'erik', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `opsi`
--
ALTER TABLE `opsi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `opsi`
--
ALTER TABLE `opsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
