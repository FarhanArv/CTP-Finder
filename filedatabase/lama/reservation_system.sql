-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2023 pada 13.27
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
-- Database: `reservation_system`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timeslot` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `timeslot`, `created_at`) VALUES
(3, 'Marjan', 'if22.farhanhaidar@mhs.ubpkarawang.ac.id', '07:00', '2023-12-07 12:21:28'),
(4, 'Farhan Mutawakkil', 'farhanarvan16@gmail.com', '07:00', '2023-12-07 12:21:33'),
(5, 'Ciki', 'farhanhaidar1610@gmail.com', '07:00', '2023-12-14 14:55:52'),
(6, 'Ciki', 'farhanhaidar1610@gmail.com', '07:00', '2023-12-14 14:55:56'),
(7, 'Ciki', 'farhanhaidar1610@gmail.com', '8.00', '2023-12-14 15:37:46'),
(8, 'Ciki', 'farhanhaidar1610@gmail.com', '8.00', '2023-12-14 15:37:51'),
(9, 'Ciki', 'farhanhaidar1610@gmail.com', '8.00', '2023-12-14 15:37:56'),
(10, 'Ciki', 'farhanhaidar1610@gmail.com', '8.00', '2023-12-14 15:37:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
