-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Feb 2025 pada 17.50
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
(1, 'SIloam Hospital', 10000),
(2, 'Tas Sedang', 15000),
(3, 'Tas Besar', 25000),
(4, 'Kantong Plastik', 1000),
(6, 'Kartu Nama', 0),
(7, 'Kop Surat', 0),
(8, 'Amplop', 0),
(9, 'Nota / Invoice', 0),
(10, 'Faktur Pajak', 0),
(11, 'Paper Bag', 0),
(12, 'Buku', 0),
(13, 'Majalah', 0),
(14, 'Undangan Pernikahan', 0),
(15, 'Sertifikat & Piagam', 0),
(16, 'Tiket', 0),
(17, 'Brosur', 0),
(18, 'Flyer', 0),
(19, 'Stiker & Label', 0),
(20, 'Dokumen', 0);

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
(1, 'Plat Toko', 28000),
(2, 'Plat 52', 30000),
(3, 'Plat 56', 40000),
(4, 'Plat 72', 50000);

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
(1, 'Quick Wash 1', 'Nonaktif', 'Baik'),
(2, 'Quick Wash 2', 'Aktif', 'Baik'),
(3, 'Quick Wash 3', 'Aktif', 'Baik'),
(4, 'Quick Wash 4', 'Aktif', 'Baik');

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
(2, 'Quick Dry 1', 'Aktif', 'Baik'),
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
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL DEFAULT current_timestamp(),
  `id_jl` int(11) NOT NULL,
  `id_ad` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `singkatan` varchar(100) NOT NULL,
  `catatan_khusus` varchar(255) NOT NULL,
  `status_pesanan` enum('Baik','Rusak','Perbaikan','Selesai') NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reservasi_do`
--

INSERT INTO `tbl_reservasi_do` (`id`, `id_pesanan`, `id_user`, `tanggal_pesanan`, `id_jl`, `id_ad`, `nama_perusahaan`, `singkatan`, `catatan_khusus`, `status_pesanan`, `gambar`) VALUES
(1, 'A-05-1', 10, '2025-01-15 22:25:53', 2, 20, '', '', 'sasaa', 'Perbaikan', ''),
(2, 'A-05-2', 10, '2025-01-16 00:00:00', 2, 20, '', '', 'Baju putih jagan di satuin', 'Rusak', ''),
(3, 'A-05-3', 10, '2025-01-13 00:00:00', 1, 9, '', '', '', 'Perbaikan', ''),
(4, 'A-05-4', 10, '2025-01-09 00:00:00', 1, 9, '', '', 'Atasan dan bawahan dipisah', 'Baik', ''),
(5, '', 10, '2025-02-01 00:00:00', 3, 7, 'SLM', '', '123', 'Baik', 0x75706c6f6164732f5050542053454d494e4152204b502046617268616e204d75746177616b6b696c204861696461722e706e67);

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
(241, '15:40', 10, 'Wash It Yourself', 2, '2024-01-13 20:47:55', 'Inactive'),
(242, '15:40', 10, 'Wash It Yourself', 3, '2024-01-13 20:47:59', 'Inactive'),
(247, '20:20', 10, 'Dry It Yourself', 1, '2024-01-16 20:46:47', 'Inactive'),
(253, '19:40', 10, 'Dry It Yourself', 1, '2024-01-16 21:51:33', 'Inactive'),
(254, '19:40', 10, 'Wash It Yourself', 2, '2024-01-16 21:52:56', 'Active');

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
(117, 5, '2024-01-10 17:00:00', 2, 3, '', 'Menunggu'),
(118, 10, '2024-01-14 17:00:00', 2, 2, 'Baju putih jagan di satuin', 'Menunggu'),
(119, 10, '2024-01-14 17:00:00', 1, 1, '', 'Menunggu'),
(120, 10, '2024-01-15 17:00:00', 2, 4, 'Baju putih jangan di satuin', 'Menunggu'),
(121, 10, '2024-01-15 17:00:00', 2, 4, 'Baju putih jangan di satuin', 'Menunggu'),
(122, 10, '2024-01-15 17:00:00', 3, 2, '', 'Menunggu'),
(123, 10, '2024-01-15 17:00:00', 2, 1, 'Baju putih jangan di satuin', 'Menunggu'),
(124, 10, '2024-01-15 17:00:00', 2, 2, '', 'Menunggu'),
(125, 10, '2024-01-15 17:00:00', 2, 2, '', 'Menunggu'),
(126, 10, '2024-01-15 17:00:00', 2, 2, '', 'Menunggu'),
(127, 10, '2024-01-15 17:00:00', 2, 4, '', 'Menunggu'),
(128, 10, '2024-01-15 17:00:00', 3, 2, '', 'Menunggu'),
(129, 10, '2024-01-16 17:00:00', 3, 2, 'Atasan dan bawahan dipisah', 'Menunggu'),
(131, 7, '2025-01-15 15:25:53', 2, 1, 'sasa', ''),
(0, 10, '2025-01-31 17:00:00', 3, 7, '123', '');

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
(242, '15:40', 10, 'Wash It Yourself', 3, '2024-01-13 20:47:59', 'Active'),
(243, '19:00', 10, 'Wash It Yourself', 2, '2024-01-15 18:28:55', 'Active'),
(244, '11:00', 10, 'Dry It Yourself', 1, '2024-01-16 15:22:20', 'Active'),
(245, '08.20', 10, 'Wash It Yourself', 1, '2024-01-16 15:28:32', 'Active'),
(246, '07.40', 10, 'Wash It Yourself', 1, '2024-01-16 18:26:27', 'Active'),
(247, '20:20', 10, 'Dry It Yourself', 1, '2024-01-16 20:46:47', 'Active'),
(248, '20:20', 10, 'Dry It Yourself', 2, '2024-01-16 20:46:52', 'Active'),
(249, '20:20', 10, 'Dry It Yourself', 3, '2024-01-16 20:46:55', 'Active'),
(250, '20:20', 10, 'Dry It Yourself', 4, '2024-01-16 20:46:58', 'Active'),
(251, '20:20', 10, 'Dry It Yourself', 5, '2024-01-16 20:47:01', 'Active'),
(252, '20:20', 10, 'Dry It Yourself', 6, '2024-01-16 20:47:04', 'Active'),
(253, '19:40', 10, 'Dry It Yourself', 1, '2024-01-16 21:51:33', 'Active'),
(254, '19:40', 10, 'Wash It Yourself', 2, '2024-01-16 21:52:56', 'Active');

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

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_reservasi_harga`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_reservasi_harga` (
`tanggal_pesanan` datetime
,`status_pesanan` enum('Baik','Rusak','Perbaikan','Selesai')
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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT untuk tabel `tbl_reservasi_ss`
--
ALTER TABLE `tbl_reservasi_ss`
  MODIFY `id_tbl_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

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
  ADD CONSTRAINT `tbl_reservasi_do_ibfk_1` FOREIGN KEY (`id_jl`) REFERENCES `tbl_harga_jl` (`id_jl`) ON DELETE CASCADE ON UPDATE CASCADE,
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
