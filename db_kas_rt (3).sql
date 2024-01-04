-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jan 2024 pada 09.57
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
-- Database: `db_kas_rt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran`
--

CREATE TABLE `iuran` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `warga_id` int(11) DEFAULT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `keterangan` enum('Dibayar','Belum Di Bayar') NOT NULL,
  `jenis_iuran` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `iuran`
--

INSERT INTO `iuran` (`id`, `tanggal`, `warga_id`, `nominal`, `keterangan`, `jenis_iuran`) VALUES
(1, '2024-01-02', 1, 100000.00, 'Dibayar', 1),
(2, '2024-01-03', 2, 50000.00, 'Belum Di Bayar', 1),
(3, '2024-01-05', 3, 50000.00, 'Belum Di Bayar', 2),
(4, '2024-01-06', 4, 100000.00, 'Belum Di Bayar', 1),
(5, '2024-01-05', 5, 50000.00, 'Belum Di Bayar', 2),
(6, '2024-01-07', 6, 50000.00, 'Dibayar', 1),
(7, '2024-01-09', 7, 50000.00, 'Dibayar', 2),
(8, '2024-01-09', 8, 25000.00, 'Dibayar', 3),
(9, '2024-01-10', 9, 30000.00, 'Belum Di Bayar', 2),
(10, '2024-05-12', 10, 50000.00, 'Dibayar', 1),
(11, '2024-01-09', 11, 25000.00, 'Dibayar', 2),
(12, '2024-01-23', 12, 35000.00, 'Belum Di Bayar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 2 COMMENT '1:Admin\n2:User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `status`, `role`) VALUES
(1, 'admin', 'admin', 'rt', 'KasRt@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `no_rumah` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `no_rumah`, `status`, `users_id`) VALUES
(1, '1837804097083447', 'Wisnu', 'L', '081927271231', 'Jalan Manggis RT 05/03', '123', 0, 1),
(2, '9375725447719918', 'Dony', 'L', '08152282822', 'Jalan Manggis RT 05/03', '77', 0, 2),
(3, '9887923403672883', 'Devi', 'P', '081373782332', 'Jalan Manggis RT 05/03 ', '137', 0, 3),
(4, '4828137188481621', 'Fabian', 'L', '08217271612', 'Jalan Manggis Rt 05/03 ', '99', 0, 4),
(5, '8094622916948469', 'Iqbal', 'L', '08991212812', 'Jalan Manggis Rt 05/03 ', '22', 0, 5),
(6, '9220124701811724', 'Mayang', 'P', '08121721122', 'Jalan Manggis Rt 05/03', '33', 0, 6),
(7, '9566437789304847', 'Nabila', 'P', '08137273723', 'Jalan Manggis Rt 05/03', '44', 0, 7),
(8, '7882702277718237', 'Rony', 'L', '08127172133', 'Jalan Manggis Rt 05/03', '41', 0, 8),
(9, '6258210812219135', 'Sule', 'L', '08192112983', 'Jalan Manggis Rt 05/03', '43', 0, 9),
(10, '1808436460371286', 'Martin', 'L', '08951289189', 'Jalan Manggis RT 05/03', '65', 0, 10),
(11, '8406448388943566', 'Rojak', 'L', '081312172233', 'Jalan Manggis Rt 05/03', '15', 0, 11),
(12, '9725305753566642', 'Novia', 'P', '08192628222', 'Jalan Manggis Rt 05/03 ', '55', 0, 12);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_iuran_warga1_idx` (`warga_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `iuran`
--
ALTER TABLE `iuran`
  ADD CONSTRAINT `fk_iuran_warga1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
