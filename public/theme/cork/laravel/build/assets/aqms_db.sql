-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 14 Des 2023 pada 11.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqms_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `nama`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'akbar maulana', 'admin', 'fad2ec6ff200e784f0e256d128b40ac6', 'HuFf7KIAlZklJnq0ncg9FbsEXuk3D5Ske5a1ds9DIJ1crXW18lGomSAs504l', '2023-10-27 13:48:56', '2023-10-27 06:48:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_tb`
--

CREATE TABLE `alat_tb` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat_tb`
--

INSERT INTO `alat_tb` (`id`, `code`, `alamat`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
(1, 'Alat2', 'perumahan graha rajawali blok h6', 0.4873898582959, 101.39670019589, '2023-10-31 17:02:26', '2023-10-31 10:02:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengukuran_tb`
--

CREATE TABLE `pengukuran_tb` (
  `id` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `temp` double NOT NULL,
  `hum` double NOT NULL,
  `pm25` double NOT NULL,
  `pm10` double NOT NULL,
  `voc` double NOT NULL,
  `ozon` double NOT NULL,
  `kualitas` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengukuran_tb`
--

INSERT INTO `pengukuran_tb` (`id`, `id_alat`, `temp`, `hum`, `pm25`, `pm10`, `voc`, `ozon`, `kualitas`, `created_at`, `updated_at`) VALUES
(3, 1, 34, 60, 400, 100, 80, 90, '', '2023-10-31 17:03:14', '2023-10-31 10:03:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alat_tb`
--
ALTER TABLE `alat_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengukuran_tb`
--
ALTER TABLE `pengukuran_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alat__pengukuran` (`id_alat`);

--
-- Indeks untuk tabel `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alat_tb`
--
ALTER TABLE `alat_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengukuran_tb`
--
ALTER TABLE `pengukuran_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengukuran_tb`
--
ALTER TABLE `pengukuran_tb`
  ADD CONSTRAINT `alat__pengukuran` FOREIGN KEY (`id_alat`) REFERENCES `alat_tb` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
