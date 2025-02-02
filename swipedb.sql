-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Feb 2025 pada 17.16
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swipedb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga_ad`
--

CREATE TABLE `tbl_harga_ad` (
  `id_ad` int(11) NOT NULL,
  `nama_ad` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_harga_ad`
--

INSERT INTO `tbl_harga_ad` (`id_ad`, `nama_ad`, `harga`) VALUES
(1, 'Desain Sederhana', 50000.00),
(2, 'Desain Menengah', 100000.00),
(3, 'Desain Premium', 150000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga_jl`
--

CREATE TABLE `tbl_harga_jl` (
  `id_jl` int(11) NOT NULL,
  `nama_jl` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_harga_jl`
--

INSERT INTO `tbl_harga_jl` (`id_jl`, `nama_jl`, `harga`) VALUES
(1, 'Plat Toko', 100000.00),
(2, 'Plat 52', 150000.00),
(3, 'Plat 58', 200000.00),
(4, 'Plat 72', 250000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reservasi_do`
--

CREATE TABLE `tbl_reservasi_do` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(10) NOT NULL,
  `ukuran_plat` varchar(45) NOT NULL,
  `jenis_desain` varchar(45) NOT NULL,
  `id_jl` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `id_ad` int(11) DEFAULT NULL,
  `catatan_khusus` text DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_plat` enum('Baik','Rusak','Perbaikan','Selesai') DEFAULT 'Baik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reservasi_do`
--

INSERT INTO `tbl_reservasi_do` (`id`, `id_pesanan`, `ukuran_plat`, `jenis_desain`, `id_jl`, `id_user`, `tanggal_pesanan`, `id_ad`, `catatan_khusus`, `nama_perusahaan`, `gambar`, `status_plat`) VALUES
(20, 'A-01-1', 'Plat Toko', 'Nota / Invoice', NULL, 0, '2025-01-29', NULL, 'Nota CV Makmur Jaya', 'Makmur Jaya', 'uploads/4eedf0844343797d9e7d2438f44a9066 (1).png', 'Rusak'),
(21, 'A-01-2', 'Plat Toko', 'Faktur Pajak', NULL, 0, '2025-01-26', NULL, 'Faktur UD Fajar', 'UD Fajar', 'uploads/4eedf0844343797d9e7d2438f44a9066 (1).png', 'Perbaikan'),
(22, 'A-01-3', 'Plat 52', 'Dokumen', NULL, 0, '2025-02-01', NULL, 'Dokumen Haemodyalisis Record', 'Siloam Hospital', 'uploads/4eedf0844343797d9e7d2438f44a9066 (1).png', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_whatsapp` varchar(15) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `email`, `no_whatsapp`, `role`, `password`, `created_at`, `update_at`, `alamat`) VALUES
(4, 'odol', '0', '08777227373', 'user', '$2y$10$HoPiqMBw7sapwVOxDTGj6e1fatRRHXIJnUlGPsjHMGtpPjwpUpUoS', '2023-12-04 06:01:54', NULL, ''),
(5, 'odol', 'farhanhaidar1610@gmail.com', '087887673250', 'user', '$2y$10$3YCxvJife1VJgePDwHyom.xcrOP7my6k7oX519oSUqy2.jga97eGO', '2023-12-04 06:02:50', NULL, ''),
(7, 'odol', 'farhanhaidar1620@gmail.com', '', 'admin', '$2y$10$tAOO9dmFVI9GpuJB/OBN2e4g6sQwkdhV.NRZ5KcAYmPD7JYJdagC.', '2023-12-04 06:14:52', NULL, ''),
(8, 'Marjan', 'farhanarvan121@gmail.com', '', 'user', '$2y$10$4rBBOy.Q6zjbZjYVLN.ODuhLEmyjsFklnZ8CCloENWF0CCJlrsljC', '2023-12-04 07:14:25', NULL, ''),
(9, 'Sabun', 'farhansabun@gmail.com', '', 'user', '$2y$10$HH6PIp.FHyzDJKEz4Q7J4uPLWG8glgZFKpJvPx6HRx2nPesVscnfa', '2023-12-04 07:30:16', NULL, ''),
(10, 'Farhan Mutawakkil Haidar', 'farhan@gmail.com', '08882732647009', 'user', '$2y$10$C3D8wULf6W8I6L5SzHQQhOLqb2oApd68Wfl.XcUezbq1cq5N1oN2C', '2023-12-11 09:53:49', NULL, ''),
(11, 'aaaa', 'aaa@gmail.com', NULL, 'user', '$2y$10$1rqp/v08hQcnReGmX9dlY.BFdTJnVzXOFyuSfpUmvgr82qxQXc4Gm', '2024-01-04 07:46:12', '2024-01-04 07:46:12', NULL),
(12, 'Farhan Mutawakkil Haidar', 'admin@gmail.com', NULL, 'admin', '$2y$10$tqoL4eonKKh4iuGXJ06ljOVja2wIVvgmme3rtUHnz9oObWyPGIvtG', '2024-01-07 08:27:53', '2024-01-07 08:27:53', NULL),
(17, 'Marjan', 'marjan@marjan.com', '099999888888', 'user', '$2y$10$lBuU.2zVb9uW98tKmL8TW.P6gKR6.CuIUQsG22q1IaUqnUe8owXLW', '2024-01-08 07:58:30', '2024-01-08 07:58:30', NULL),
(18, 'Lauraaa', 'lauraaa@gmail.com', '0888273264799', 'admin', '$2y$10$/BWTxSGeOWgsXXUpkCgmeecOgVshzyui7PyYL9O4ijImPirESnQy.', '2024-01-16 08:26:50', '2024-01-16 08:26:50', NULL),
(19, '', '', '', 'user', '$2y$10$HziRK9hfP/xwl7ELkrG88O0x45dPNk2II4Cu59cHH.CfLsviG256q', '2024-01-16 09:12:14', '2024-01-16 09:12:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_harga_ad`
--
ALTER TABLE `tbl_harga_ad`
  ADD PRIMARY KEY (`id_ad`);

--
-- Indeks untuk tabel `tbl_harga_jl`
--
ALTER TABLE `tbl_harga_jl`
  ADD PRIMARY KEY (`id_jl`);

--
-- Indeks untuk tabel `tbl_reservasi_do`
--
ALTER TABLE `tbl_reservasi_do`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_jl` (`id_jl`),
  ADD KEY `id_ad` (`id_ad`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_harga_ad`
--
ALTER TABLE `tbl_harga_ad`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_harga_jl`
--
ALTER TABLE `tbl_harga_jl`
  MODIFY `id_jl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_reservasi_do`
--
ALTER TABLE `tbl_reservasi_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_reservasi_do`
--
ALTER TABLE `tbl_reservasi_do`
  ADD CONSTRAINT `tbl_reservasi_do_ibfk_1` FOREIGN KEY (`id_jl`) REFERENCES `tbl_harga_jl` (`id_jl`),
  ADD CONSTRAINT `tbl_reservasi_do_ibfk_2` FOREIGN KEY (`id_ad`) REFERENCES `tbl_harga_ad` (`id_ad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
