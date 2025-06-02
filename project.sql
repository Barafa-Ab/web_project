-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2025 pada 07.22
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_kpr`
--

CREATE TABLE `pendaftaran_kpr` (
  `nomor_pendaftaran` varchar(6) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `tipe_rumah` varchar(50) DEFAULT NULL,
  `jangka_waktu` int(11) DEFAULT NULL,
  `dp` double DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `cicilan_per_bulan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran_kpr`
--

INSERT INTO `pendaftaran_kpr` (`nomor_pendaftaran`, `id_user`, `nama_lengkap`, `alamat`, `pekerjaan`, `tipe_rumah`, `jangka_waktu`, `dp`, `metode_pembayaran`, `foto_ktp`, `total_harga`, `cicilan_per_bulan`) VALUES
('213504', 9, 'Setiawan Ade', 'Bekasi, Jawa Barat', 'CEO', 'Sagara', 10, 750000000, 'Transfer Bank', '0', 1793750000, 15047916.666666666);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `nohp`, `password`) VALUES
(1, 'adi', 'adi@gmail.com', '08372819832', '$2y$10$Ij6vHWbQXqMVO/tmW5w1GOyp4iyas755LEwUnZc46dgnw.c2pZlD6'),
(2, 'bagus', 'bagus@gmail.com', '085777228821', '$2y$10$dY8qxpTvk.2CzdY2rMTFFu9U6M5b94dkBrir.qwBDi3d6mKCCnIC6'),
(9, 'seti', 'seti@gmail.com', '0857711277990', '$2y$10$6TwBTezjqFxM1Eol1/ZXG.g57QnHbUYLgm/.aRBisIiiGjesdTrpy'),
(18, 'angga', 'angga@gmail.com', '0938267165', '$2y$10$/wbLKNE2MxY2tgxFCF6IhukJDCnFURL9U0FZgzIvV6XOW6MtZUTS2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftaran_kpr`
--
ALTER TABLE `pendaftaran_kpr`
  ADD PRIMARY KEY (`nomor_pendaftaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran_kpr`
--
ALTER TABLE `pendaftaran_kpr`
  ADD CONSTRAINT `pendaftaran_kpr_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
