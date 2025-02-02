-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2024 pada 18.33
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
-- Struktur dari tabel `tbl_harga_ad`
--

CREATE TABLE `tbl_harga_ad` (
  `id_ad` int(11) NOT NULL,
  `nama_ad` varchar(25) NOT NULL,
  `harga_ad` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_harga_ad`
--

INSERT INTO `tbl_harga_ad` (`id_ad`, `nama_ad`, `harga_ad`) VALUES
(1, 'Tas Kecil', 10000),
(2, 'Tas Sedang', 15000),
(3, 'Tas Besar', 25000),
(4, 'Kantong Plastik', 1000),
(5, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga_jl`
--

CREATE TABLE `tbl_harga_jl` (
  `id_jl` int(11) NOT NULL,
  `nama_jl` varchar(25) NOT NULL,
  `harga_jl` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_harga_jl`
--

INSERT INTO `tbl_harga_jl` (`id_jl`, `nama_jl`, `harga_jl`) VALUES
(1, 'QuickDry & Press', 28000),
(2, 'QuickDry & Press 3', 30000),
(3, 'QuickDry & Press 5', 40000),
(4, 'QuickDry & Press 7', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reservasi_do`
--

CREATE TABLE `tbl_reservasi_do` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_jl` int(11) NOT NULL,
  `id_ad` int(11) DEFAULT NULL,
  `catatan_khusus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reservasi_do`
--

INSERT INTO `tbl_reservasi_do` (`id_pesanan`, `id_user`, `tanggal_pesanan`, `id_jl`, `id_ad`, `catatan_khusus`) VALUES
(41, 10, '2024-01-04 17:00:00', 2, 2, 'Baju putih jagan di satuin'),
(42, 10, '2024-01-04 17:00:00', 4, 4, 'Baju putih jagan di satuin'),
(44, 10, '2024-01-04 17:00:00', 1, 2, 'Baju putih jagan di satuin'),
(45, 10, '2024-01-04 17:00:00', 4, 4, 'Baju putih jagan di satuin'),
(48, 10, '2024-01-04 17:00:00', 2, 3, 'Baju putih jagan di satuin'),
(49, 10, '2024-01-04 17:00:00', 2, 3, 'Baju putih jagan di satuin'),
(50, 10, '2024-01-04 17:00:00', 2, 3, 'Baju putih jagan di satuin'),
(51, 10, '2024-01-04 17:00:00', 2, 3, 'Baju putih jagan di satuin'),
(52, 10, '2024-01-04 17:00:00', 2, 3, 'Baju putih jagan di satuin'),
(53, 10, '2024-01-04 17:00:00', 2, 3, ''),
(57, 10, '2024-01-04 17:00:00', 4, 5, ''),
(58, 10, '2024-01-04 17:00:00', 1, 5, 'Atasan dan bawahan dipisah'),
(59, 10, '2024-01-04 17:00:00', 3, 2, ''),
(60, 10, '2024-01-04 17:00:00', 3, 5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reservasi_ss`
--

CREATE TABLE `tbl_reservasi_ss` (
  `id_tbl_r` int(11) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `id_user` varchar(3) NOT NULL,
  `jenis_layanan` enum('Wash It Yourself','Dry It Yourself') NOT NULL,
  `nomor_antrian` int(4) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reservasi_ss`
--

INSERT INTO `tbl_reservasi_ss` (`id_tbl_r`, `jam`, `id_user`, `jenis_layanan`, `nomor_antrian`, `tanggal_pesanan`) VALUES
(118, '17:40', '10', 'Wash It Yourself', 1, '2024-01-05 18:14:24'),
(123, '19:00', '10', 'Dry It Yourself', 1, '2024-01-05 18:18:10');

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
(4, 'odol', '0', '', 'user', '$2y$10$HoPiqMBw7sapwVOxDTGj6e1fatRRHXIJnUlGPsjHMGtpPjwpUpUoS', '2023-12-04 06:01:54', NULL, ''),
(5, 'odol', 'farhanhaidar1610@gmail.com', '087887673250', 'user', '$2y$10$3YCxvJife1VJgePDwHyom.xcrOP7my6k7oX519oSUqy2.jga97eGO', '2023-12-04 06:02:50', NULL, ''),
(7, 'odol', 'farhanhaidar1620@gmail.com', '', 'admin', '$2y$10$tAOO9dmFVI9GpuJB/OBN2e4g6sQwkdhV.NRZ5KcAYmPD7JYJdagC.', '2023-12-04 06:14:52', NULL, ''),
(8, 'Marjan', 'farhanarvan121@gmail.com', '', 'user', '$2y$10$4rBBOy.Q6zjbZjYVLN.ODuhLEmyjsFklnZ8CCloENWF0CCJlrsljC', '2023-12-04 07:14:25', NULL, ''),
(9, 'Sabun', 'farhansabun@gmail.com', '', 'user', '$2y$10$HH6PIp.FHyzDJKEz4Q7J4uPLWG8glgZFKpJvPx6HRx2nPesVscnfa', '2023-12-04 07:30:16', NULL, ''),
(10, 'Farhan Mutawakkil Haidar', 'farhan@gmail.com', '0888273264738', 'user', '$2y$10$felyzKyFt9A9gqLHKIphgOpM17VCTIQR7Hv1u9BeauIp0/f835Tne', '2023-12-11 09:53:49', NULL, ''),
(11, 'aaaa', 'aaa@gmail.com', NULL, 'user', '$2y$10$1rqp/v08hQcnReGmX9dlY.BFdTJnVzXOFyuSfpUmvgr82qxQXc4Gm', '2024-01-04 07:46:12', '2024-01-04 07:46:12', NULL);

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
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `tbl_reservasi_do_ibfk_1` (`id_jl`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `tbl_reservasi_do_ibfk_2` (`id_ad`);

--
-- Indeks untuk tabel `tbl_reservasi_ss`
--
ALTER TABLE `tbl_reservasi_ss`
  ADD PRIMARY KEY (`id_tbl_r`),
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
-- AUTO_INCREMENT untuk tabel `tbl_harga_ad`
--
ALTER TABLE `tbl_harga_ad`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_harga_jl`
--
ALTER TABLE `tbl_harga_jl`
  MODIFY `id_jl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_reservasi_do`
--
ALTER TABLE `tbl_reservasi_do`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tbl_reservasi_ss`
--
ALTER TABLE `tbl_reservasi_ss`
  MODIFY `id_tbl_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_reservasi_do`
--
ALTER TABLE `tbl_reservasi_do`
  ADD CONSTRAINT `tbl_reservasi_do_ibfk_1` FOREIGN KEY (`id_jl`) REFERENCES `tbl_harga_jl` (`id_jl`),
  ADD CONSTRAINT `tbl_reservasi_do_ibfk_2` FOREIGN KEY (`id_ad`) REFERENCES `tbl_harga_ad` (`id_ad`),
  ADD CONSTRAINT `tbl_reservasi_do_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
