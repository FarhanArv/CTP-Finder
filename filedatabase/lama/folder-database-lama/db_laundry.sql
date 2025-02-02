-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 14.57
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
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dropoff`
--

CREATE TABLE `tbl_dropoff` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_pelayanan` enum('Pencucian','Setrika','Pencucian & Setrika') NOT NULL,
  `berat_pesanan` int(2) NOT NULL,
  `status_pesanan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_selfservice`
--

CREATE TABLE `tbl_selfservice` (
  `id_selfservice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_antrian` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `mesin_cuci` int(11) NOT NULL,
  `mesin_kering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `email`, `role`, `password`, `created_at`, `update_at`) VALUES
(4, 'odol', '0', 'user', '$2y$10$HoPiqMBw7sapwVOxDTGj6e1fatRRHXIJnUlGPsjHMGtpPjwpUpUoS', '2023-12-04 06:01:54', NULL),
(5, 'odol', 'farhanhaidar1610@gmail.com', 'user', '$2y$10$3YCxvJife1VJgePDwHyom.xcrOP7my6k7oX519oSUqy2.jga97eGO', '2023-12-04 06:02:50', NULL),
(7, 'odol', 'farhanhaidar1620@gmail.com', 'user', '$2y$10$tAOO9dmFVI9GpuJB/OBN2e4g6sQwkdhV.NRZ5KcAYmPD7JYJdagC.', '2023-12-04 06:14:52', NULL),
(8, 'Marjan', 'farhanarvan121@gmail.com', 'user', '$2y$10$4rBBOy.Q6zjbZjYVLN.ODuhLEmyjsFklnZ8CCloENWF0CCJlrsljC', '2023-12-04 07:14:25', NULL),
(9, 'Sabun', 'farhansabun@gmail.com', 'user', '$2y$10$HH6PIp.FHyzDJKEz4Q7J4uPLWG8glgZFKpJvPx6HRx2nPesVscnfa', '2023-12-04 07:30:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dropoff`
--
ALTER TABLE `tbl_dropoff`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_selfservice`
--
ALTER TABLE `tbl_selfservice`
  ADD PRIMARY KEY (`id_selfservice`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dropoff`
--
ALTER TABLE `tbl_dropoff`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_selfservice`
--
ALTER TABLE `tbl_selfservice`
  MODIFY `id_selfservice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_dropoff`
--
ALTER TABLE `tbl_dropoff`
  ADD CONSTRAINT `tbl_dropoff_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_selfservice`
--
ALTER TABLE `tbl_selfservice`
  ADD CONSTRAINT `tbl_selfservice_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tbl_dropoff` (`id_pesanan`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
