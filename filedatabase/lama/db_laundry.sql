-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 19.36
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
-- Stand-in struktur untuk tampilan `detail_do_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_do_user` (
`id_jl` int(11)
,`nama_jl` varchar(25)
,`harga_jl` int(9)
,`id_ad` int(11)
,`nama_ad` varchar(25)
,`harga_ad` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_ss_users`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_ss_users` (
`id_tbl_r` int(11)
,`tanggal_pesanan` datetime
,`name` varchar(50)
,`jam` varchar(10)
,`nomor_antrian` int(4)
,`status_pesanan` enum('Active','Inactive')
);

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
-- Struktur dari tabel `tbl_mesin_cuci`
--

CREATE TABLE `tbl_mesin_cuci` (
  `id_mesin_cuci` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `status_mesin` enum('Aktif','Nonaktif') NOT NULL,
  `kondisi` enum('Baik','Perbaikan','Rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mesin_cuci`
--

INSERT INTO `tbl_mesin_cuci` (`id_mesin_cuci`, `nama`, `status_mesin`, `kondisi`) VALUES
(1, 'Quick Wash 1', 'Nonaktif', 'Rusak'),
(2, 'Quick Wash 2', 'Nonaktif', 'Perbaikan'),
(3, 'Quick Wash 3', 'Aktif', 'Baik'),
(4, 'Quick Wash 4', 'Aktif', 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mesin_pengering`
--

CREATE TABLE `tbl_mesin_pengering` (
  `id_mesin_pengering` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `status_mesin` enum('Aktif','Nonaktif') NOT NULL,
  `kondisi` enum('Baik','Perbaikan','Rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mesin_pengering`
--

INSERT INTO `tbl_mesin_pengering` (`id_mesin_pengering`, `nama`, `status_mesin`, `kondisi`) VALUES
(2, 'Quick Dry 1', 'Nonaktif', 'Rusak'),
(3, 'Quick Dry 2', 'Aktif', 'Baik'),
(4, 'Quick Dry 3', 'Aktif', 'Baik'),
(5, 'Quick Dry 4', 'Aktif', 'Baik'),
(6, 'Quick Dry 5', 'Aktif', 'Baik'),
(7, 'Quick Dry 6', 'Aktif', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reservasi_do`
--

CREATE TABLE `tbl_reservasi_do` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL DEFAULT current_timestamp(),
  `id_jl` int(11) NOT NULL,
  `id_ad` int(11) DEFAULT NULL,
  `catatan_khusus` varchar(255) NOT NULL,
  `status_pesanan` enum('Menunggu','Diterima','Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reservasi_do`
--

INSERT INTO `tbl_reservasi_do` (`id_pesanan`, `id_user`, `tanggal_pesanan`, `id_jl`, `id_ad`, `catatan_khusus`, `status_pesanan`) VALUES
(41, 10, '2024-01-05 00:00:00', 2, 2, 'Baju putih jagan di satuin', 'Proses'),
(91, 5, '2024-01-25 00:00:00', 4, 2, '', 'Diterima'),
(96, 10, '2024-01-08 00:00:00', 1, 1, 'Baju putih jagan di satuin', 'Menunggu'),
(104, 5, '2024-01-08 00:00:00', 1, 2, 'Baju putih jagan di satuin', 'Selesai'),
(105, 10, '2024-01-08 00:00:00', 2, 3, 'Atasan dan bawahan dipisah', 'Diterima'),
(106, 10, '2024-01-08 00:00:00', 4, 4, 'Baju putih jagan di satuin', 'Proses'),
(107, 10, '2024-01-08 00:00:00', 2, 1, '', 'Menunggu'),
(108, 10, '2024-01-09 00:00:00', 3, 1, '', 'Selesai'),
(109, 10, '2024-01-09 00:00:00', 3, 1, '', 'Diterima'),
(110, 10, '2024-01-09 00:00:00', 3, 2, '', 'Diterima'),
(111, 10, '2024-01-09 00:00:00', 3, 2, '', 'Menunggu'),
(114, 10, '2024-01-11 00:00:00', 3, 3, '', 'Menunggu'),
(115, 10, '2024-01-11 00:00:00', 3, 2, '', 'Menunggu'),
(116, 10, '2024-01-11 00:00:00', 2, 2, '', 'Menunggu'),
(117, 5, '2024-01-11 00:00:00', 4, 4, '', 'Diterima');

--
-- Trigger `tbl_reservasi_do`
--
DELIMITER $$
CREATE TRIGGER `tr_insert_transaksi_do` AFTER INSERT ON `tbl_reservasi_do` FOR EACH ROW BEGIN
    -- Masukkan logika atau pernyataan SQL yang diperlukan di sini
    INSERT INTO tbl_transaksi_do (id_pesanan, id_user, tanggal_pesanan, id_jl, id_ad, catatan_khusus, status_pesanan)
    VALUES (NEW.id_pesanan, NEW.id_user, NEW.tanggal_pesanan, NEW.id_jl, NEW.id_ad, NEW.catatan_khusus, NEW.status_pesanan);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reservasi_ss`
--

CREATE TABLE `tbl_reservasi_ss` (
  `id_tbl_r` int(11) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_layanan` enum('Wash It Yourself','Dry It Yourself') NOT NULL,
  `nomor_antrian` int(4) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL DEFAULT current_timestamp(),
  `status_pesanan` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reservasi_ss`
--

INSERT INTO `tbl_reservasi_ss` (`id_tbl_r`, `jam`, `id_user`, `jenis_layanan`, `nomor_antrian`, `tanggal_pesanan`, `status_pesanan`) VALUES
(180, '19:00', 10, 'Dry It Yourself', 1, '0000-00-00 00:00:00', 'Inactive'),
(196, '07:00', 5, 'Wash It Yourself', 1, '2024-01-08 17:01:25', 'Inactive'),
(197, '18:20', 10, 'Wash It Yourself', 1, '2024-01-08 19:45:02', 'Inactive'),
(198, '21:00', 10, 'Dry It Yourself', 1, '2024-01-08 19:45:13', 'Inactive'),
(204, '18:20', 10, 'Wash It Yourself', 2, '2024-01-09 18:02:08', 'Inactive'),
(206, '18:20', 10, 'Wash It Yourself', 3, '2024-01-09 18:02:39', 'Inactive'),
(207, '18:20', 10, 'Wash It Yourself', 4, '2024-01-09 18:02:42', 'Inactive'),
(208, '07:00', 10, 'Wash It Yourself', 2, '2024-01-10 18:11:51', 'Inactive'),
(210, '09.40', 10, 'Wash It Yourself', 1, '2024-01-11 15:20:34', 'Inactive'),
(211, '09.00', 10, 'Wash It Yourself', 1, '2024-01-12 20:06:36', 'Inactive'),
(214, '09.00', 10, 'Wash It Yourself', 4, '2024-01-12 20:06:46', 'Inactive'),
(217, '09.40', 10, 'Wash It Yourself', 2, '2024-01-12 21:15:46', 'Inactive'),
(218, '09.00', 10, 'Wash It Yourself', 5, '2024-01-12 21:16:04', 'Inactive'),
(219, '09.40', 10, 'Wash It Yourself', 3, '2024-01-12 21:16:30', 'Inactive'),
(220, '09.40', 10, 'Wash It Yourself', 4, '2024-01-12 21:16:35', 'Inactive'),
(221, '20:20', 10, 'Wash It Yourself', 1, '2024-01-13 08:36:24', 'Inactive'),
(222, '20:20', 10, 'Wash It Yourself', 2, '2024-01-13 08:36:31', 'Inactive'),
(223, '20:20', 10, 'Wash It Yourself', 3, '2024-01-13 08:36:35', 'Inactive'),
(224, '20:20', 10, 'Wash It Yourself', 4, '2024-01-13 08:36:38', 'Inactive'),
(225, '19:40', 10, 'Wash It Yourself', 1, '2024-01-13 08:37:01', 'Inactive'),
(226, '19:40', 10, 'Wash It Yourself', 2, '2024-01-13 08:37:05', 'Inactive'),
(227, '19:40', 10, 'Wash It Yourself', 3, '2024-01-13 08:37:09', 'Inactive'),
(228, '20:20', 10, 'Dry It Yourself', 5, '2024-01-13 08:39:41', 'Inactive'),
(229, '20:20', 10, 'Dry It Yourself', 6, '2024-01-13 08:39:46', 'Inactive'),
(230, '19:40', 10, 'Dry It Yourself', 4, '2024-01-13 08:40:46', 'Inactive'),
(231, '14:20', 10, 'Dry It Yourself', 1, '2024-01-13 08:41:13', 'Inactive'),
(232, '14:20', 10, 'Dry It Yourself', 2, '2024-01-13 08:41:25', 'Inactive'),
(233, '14:20', 10, 'Dry It Yourself', 3, '2024-01-13 08:41:29', 'Inactive'),
(234, '14:20', 10, 'Dry It Yourself', 4, '2024-01-13 08:41:33', 'Inactive'),
(235, '15:00', 10, 'Dry It Yourself', 1, '2024-01-13 20:47:01', 'Inactive'),
(236, '15:00', 10, 'Dry It Yourself', 2, '2024-01-13 20:47:05', 'Inactive'),
(237, '15:00', 10, 'Dry It Yourself', 3, '2024-01-13 20:47:08', 'Inactive'),
(238, '15:00', 10, 'Dry It Yourself', 4, '2024-01-13 20:47:13', 'Inactive'),
(239, '15:00', 10, 'Dry It Yourself', 5, '2024-01-13 20:47:23', 'Inactive'),
(240, '15:40', 10, 'Wash It Yourself', 1, '2024-01-13 20:47:50', 'Inactive'),
(241, '15:40', 10, 'Wash It Yourself', 2, '2024-01-13 20:47:55', 'Inactive'),
(242, '15:40', 10, 'Wash It Yourself', 3, '2024-01-13 20:47:59', 'Inactive');

--
-- Trigger `tbl_reservasi_ss`
--
DELIMITER $$
CREATE TRIGGER `tr_insert_transaksi_ss` AFTER INSERT ON `tbl_reservasi_ss` FOR EACH ROW BEGIN
    -- Masukkan logika atau pernyataan SQL yang diperlukan di sini
    INSERT INTO tbl_transaksi_ss (id_tbl_r, jam, id_user, jenis_layanan, nomor_antrian, tanggal_pesanan, status_pesanan)
    VALUES (NEW.id_tbl_r, NEW.jam, NEW.id_user, NEW.jenis_layanan, NEW.nomor_antrian, NEW.tanggal_pesanan, NEW.status_pesanan);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_do`
--

CREATE TABLE `tbl_transaksi_do` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NULL DEFAULT NULL,
  `id_jl` int(11) NOT NULL,
  `id_ad` int(11) NOT NULL,
  `catatan_khusus` varchar(255) NOT NULL,
  `status_pesanan` enum('Menunggu','Diterima','Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi_do`
--

INSERT INTO `tbl_transaksi_do` (`id_pesanan`, `id_user`, `tanggal_pesanan`, `id_jl`, `id_ad`, `catatan_khusus`, `status_pesanan`) VALUES
(112, 10, '2024-01-09 17:00:00', 3, 1, 'Baju putih jagan di satuin', 'Menunggu'),
(114, 10, '2024-01-10 17:00:00', 3, 3, '', 'Menunggu'),
(115, 10, '2024-01-10 17:00:00', 3, 2, '', 'Menunggu'),
(116, 10, '2024-01-10 17:00:00', 2, 2, '', 'Menunggu'),
(117, 5, '2024-01-10 17:00:00', 2, 3, '', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_ss`
--

CREATE TABLE `tbl_transaksi_ss` (
  `id_tbl_r` int(11) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_layanan` enum('Wash It Yourself','Dry It Yourself') NOT NULL,
  `nomor_antrian` int(4) NOT NULL,
  `tanggal_pesanan` datetime DEFAULT NULL,
  `status_pesanan` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi_ss`
--

INSERT INTO `tbl_transaksi_ss` (`id_tbl_r`, `jam`, `id_user`, `jenis_layanan`, `nomor_antrian`, `tanggal_pesanan`, `status_pesanan`) VALUES
(208, '07:00', 10, 'Wash It Yourself', 2, '2024-01-10 18:11:51', 'Active'),
(210, '09.40', 10, 'Wash It Yourself', 1, '2024-01-11 15:20:34', 'Active'),
(211, '09.00', 10, 'Wash It Yourself', 1, '2024-01-12 20:06:36', 'Active'),
(212, '09.00', 10, 'Wash It Yourself', 2, '2024-01-12 20:06:39', 'Active'),
(213, '09.00', 10, 'Wash It Yourself', 3, '2024-01-12 20:06:43', 'Active'),
(214, '09.00', 10, 'Wash It Yourself', 4, '2024-01-12 20:06:46', 'Active'),
(215, '09.00', 10, 'Wash It Yourself', 1, '2024-01-12 20:09:07', 'Active'),
(216, '09.00', 10, 'Wash It Yourself', 1, '2024-01-12 21:03:22', 'Active'),
(217, '09.40', 10, 'Wash It Yourself', 2, '2024-01-12 21:15:46', 'Active'),
(218, '09.00', 10, 'Wash It Yourself', 5, '2024-01-12 21:16:04', 'Active'),
(219, '09.40', 10, 'Wash It Yourself', 3, '2024-01-12 21:16:30', 'Active'),
(220, '09.40', 10, 'Wash It Yourself', 4, '2024-01-12 21:16:35', 'Active'),
(221, '20:20', 10, 'Wash It Yourself', 1, '2024-01-13 08:36:24', 'Active'),
(222, '20:20', 10, 'Wash It Yourself', 2, '2024-01-13 08:36:31', 'Active'),
(223, '20:20', 10, 'Wash It Yourself', 3, '2024-01-13 08:36:35', 'Active'),
(224, '20:20', 10, 'Wash It Yourself', 4, '2024-01-13 08:36:38', 'Active'),
(225, '19:40', 10, 'Wash It Yourself', 1, '2024-01-13 08:37:01', 'Active'),
(226, '19:40', 10, 'Wash It Yourself', 2, '2024-01-13 08:37:05', 'Active'),
(227, '19:40', 10, 'Wash It Yourself', 3, '2024-01-13 08:37:09', 'Active'),
(228, '20:20', 10, 'Dry It Yourself', 5, '2024-01-13 08:39:41', 'Active'),
(229, '20:20', 10, 'Dry It Yourself', 6, '2024-01-13 08:39:46', 'Active'),
(230, '19:40', 10, 'Dry It Yourself', 4, '2024-01-13 08:40:46', 'Active'),
(231, '14:20', 10, 'Dry It Yourself', 1, '2024-01-13 08:41:13', 'Active'),
(232, '14:20', 10, 'Dry It Yourself', 2, '2024-01-13 08:41:25', 'Active'),
(233, '14:20', 10, 'Dry It Yourself', 3, '2024-01-13 08:41:29', 'Active'),
(234, '14:20', 10, 'Dry It Yourself', 4, '2024-01-13 08:41:33', 'Active'),
(235, '15:00', 10, 'Dry It Yourself', 1, '2024-01-13 20:47:01', 'Active'),
(236, '15:00', 10, 'Dry It Yourself', 2, '2024-01-13 20:47:05', 'Active'),
(237, '15:00', 10, 'Dry It Yourself', 3, '2024-01-13 20:47:08', 'Active'),
(238, '15:00', 10, 'Dry It Yourself', 4, '2024-01-13 20:47:13', 'Active'),
(239, '15:00', 10, 'Dry It Yourself', 5, '2024-01-13 20:47:23', 'Active'),
(240, '15:40', 10, 'Wash It Yourself', 1, '2024-01-13 20:47:50', 'Active'),
(241, '15:40', 10, 'Wash It Yourself', 2, '2024-01-13 20:47:55', 'Active'),
(242, '15:40', 10, 'Wash It Yourself', 3, '2024-01-13 20:47:59', 'Active');

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
(10, 'Farhan Mutawakkil Haidar', 'farhan@gmail.com', '0888273264700', 'user', '$2y$10$felyzKyFt9A9gqLHKIphgOpM17VCTIQR7Hv1u9BeauIp0/f835Tne', '2023-12-11 09:53:49', NULL, ''),
(11, 'aaaa', 'aaa@gmail.com', NULL, 'user', '$2y$10$1rqp/v08hQcnReGmX9dlY.BFdTJnVzXOFyuSfpUmvgr82qxQXc4Gm', '2024-01-04 07:46:12', '2024-01-04 07:46:12', NULL),
(12, 'Farhan', 'admin@gmail.com', NULL, 'admin', '$2y$10$tqoL4eonKKh4iuGXJ06ljOVja2wIVvgmme3rtUHnz9oObWyPGIvtG', '2024-01-07 08:27:53', '2024-01-07 08:27:53', NULL),
(17, 'Marjan', 'marjan@marjan.com', '099999888888', 'user', '$2y$10$lBuU.2zVb9uW98tKmL8TW.P6gKR6.CuIUQsG22q1IaUqnUe8owXLW', '2024-01-08 07:58:30', '2024-01-08 07:58:30', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_reservasi_harga`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_reservasi_harga` (
`tanggal_pesanan` datetime
,`status_pesanan` enum('Menunggu','Diterima','Proses','Selesai')
,`nama_jl` varchar(25)
,`nama_ad` varchar(25)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_do_user`
--
DROP TABLE IF EXISTS `detail_do_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_do_user`  AS SELECT `tbl_harga_jl`.`id_jl` AS `id_jl`, `tbl_harga_jl`.`nama_jl` AS `nama_jl`, `tbl_harga_jl`.`harga_jl` AS `harga_jl`, `tbl_harga_ad`.`id_ad` AS `id_ad`, `tbl_harga_ad`.`nama_ad` AS `nama_ad`, `tbl_harga_ad`.`harga_ad` AS `harga_ad` FROM ((`tbl_reservasi_do` join `tbl_harga_jl` on(`tbl_reservasi_do`.`id_jl` = `tbl_harga_jl`.`id_jl`)) join `tbl_harga_ad` on(`tbl_reservasi_do`.`id_ad` = `tbl_harga_ad`.`id_ad`)) WHERE `tbl_reservasi_do`.`id_user` = '$iduser' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_ss_users`
--
DROP TABLE IF EXISTS `detail_ss_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_ss_users`  AS SELECT `ss`.`id_tbl_r` AS `id_tbl_r`, `ss`.`tanggal_pesanan` AS `tanggal_pesanan`, `us`.`name` AS `name`, `ss`.`jam` AS `jam`, `ss`.`nomor_antrian` AS `nomor_antrian`, `ss`.`status_pesanan` AS `status_pesanan` FROM (`tbl_reservasi_ss` `ss` join `tbl_users` `us` on(`ss`.`id_user` = `us`.`id_user`)) ORDER BY `ss`.`id_tbl_r` DESC ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_reservasi_harga`
--
DROP TABLE IF EXISTS `view_reservasi_harga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reservasi_harga`  AS SELECT `rd`.`tanggal_pesanan` AS `tanggal_pesanan`, `rd`.`status_pesanan` AS `status_pesanan`, `hj`.`nama_jl` AS `nama_jl`, `ha`.`nama_ad` AS `nama_ad` FROM ((`tbl_reservasi_do` `rd` join `tbl_harga_jl` `hj` on(`rd`.`id_jl` = `hj`.`id_jl`)) join `tbl_harga_ad` `ha` on(`rd`.`id_ad` = `ha`.`id_ad`)) ;

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
-- Indeks untuk tabel `tbl_mesin_cuci`
--
ALTER TABLE `tbl_mesin_cuci`
  ADD PRIMARY KEY (`id_mesin_cuci`);

--
-- Indeks untuk tabel `tbl_mesin_pengering`
--
ALTER TABLE `tbl_mesin_pengering`
  ADD PRIMARY KEY (`id_mesin_pengering`);

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
-- Indeks untuk tabel `tbl_transaksi_do`
--
ALTER TABLE `tbl_transaksi_do`
  ADD KEY `id_ad` (`id_ad`),
  ADD KEY `id_jl` (`id_jl`),
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
-- AUTO_INCREMENT untuk tabel `tbl_mesin_cuci`
--
ALTER TABLE `tbl_mesin_cuci`
  MODIFY `id_mesin_cuci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_mesin_pengering`
--
ALTER TABLE `tbl_mesin_pengering`
  MODIFY `id_mesin_pengering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_reservasi_do`
--
ALTER TABLE `tbl_reservasi_do`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `tbl_reservasi_ss`
--
ALTER TABLE `tbl_reservasi_ss`
  MODIFY `id_tbl_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

--
-- Ketidakleluasaan untuk tabel `tbl_reservasi_ss`
--
ALTER TABLE `tbl_reservasi_ss`
  ADD CONSTRAINT `tbl_reservasi_ss_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi_do`
--
ALTER TABLE `tbl_transaksi_do`
  ADD CONSTRAINT `tbl_transaksi_do_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `tbl_harga_ad` (`id_ad`),
  ADD CONSTRAINT `tbl_transaksi_do_ibfk_2` FOREIGN KEY (`id_jl`) REFERENCES `tbl_harga_jl` (`id_jl`),
  ADD CONSTRAINT `tbl_transaksi_do_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
