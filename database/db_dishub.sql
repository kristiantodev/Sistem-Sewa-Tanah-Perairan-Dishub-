-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2022 pada 05.37
-- Versi server: 5.7.21-log
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dishub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alokasi`
--

CREATE TABLE `alokasi` (
  `id_alokasi` int(11) NOT NULL,
  `id_retribusi` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `deleted` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alokasi`
--

INSERT INTO `alokasi` (`id_alokasi`, `id_retribusi`, `foto`, `harga`, `id_wilayah`, `id_user`, `deleted`, `keterangan`) VALUES
(1, 2, '1167629727.JPG', 1250000, 1, NULL, 0, 'aku adalah '),
(2, 1, 'default.png', 12500000, 1, NULL, 0, 'wkwkw'),
(3, 1, '1832609969.JPG', 1200000, 1, '62ce63581292a', 0, 'Terimalah lagu ini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_retribusi`
--

CREATE TABLE `jenis_retribusi` (
  `id_jenis_retribusi` int(11) NOT NULL,
  `nm_jenis_retribusi` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_retribusi`
--

INSERT INTO `jenis_retribusi` (`id_jenis_retribusi`, `nm_jenis_retribusi`, `deleted`) VALUES
(1, 'Rumah Makan', 0),
(2, 'Pelabuhan Khusus', 0),
(3, 'wkwk2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_retribusi` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `message_to_uptd` text,
  `message_to_cust` text,
  `acc_uptd` int(11) NOT NULL,
  `acc_admin` int(11) NOT NULL,
  `id_alokasi` int(11) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `acc_dishub` int(11) NOT NULL,
  `acc_final` int(11) NOT NULL,
  `file_perjanjian` varchar(60) DEFAULT NULL,
  `file_pembayaran` varchar(60) DEFAULT NULL,
  `acc_final_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_retribusi`, `id_wilayah`, `id_user`, `message_to_uptd`, `message_to_cust`, `acc_uptd`, `acc_admin`, `id_alokasi`, `tgl_pengajuan`, `acc_dishub`, `acc_final`, `file_perjanjian`, `file_pembayaran`, `acc_final_admin`) VALUES
(1, 2, 1, '62ce63581292a', 'Saya mau pesan diwilayah palembang apakah ada ?', 'maaf. lagi tidak tersedia ya', 2, 0, 0, '2022-07-13 16:18:31', 0, 0, NULL, NULL, 0),
(2, 1, 1, '62ce63581292a', 'Dewa tanah Palembang', 'Oke siap mas di ACC', 1, 1, 3, '2022-07-13 16:25:36', 1, 1, '1043550426.pdf', '711123594.pdf', 1),
(4, 2, 1, '62ce63581292a', '', '', 1, 0, 0, '2022-07-13 18:13:08', 0, 0, NULL, NULL, 0),
(5, 2, 2, '62d0e9fd78c07', 'aku mau perairan disekitar cirebon', NULL, 0, 0, 0, '2022-07-15 11:16:35', 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retribusi`
--

CREATE TABLE `retribusi` (
  `id_retribusi` int(11) NOT NULL,
  `nm_retribusi` varchar(60) NOT NULL,
  `id_jenis_retribusi` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retribusi`
--

INSERT INTO `retribusi` (`id_retribusi`, `nm_retribusi`, `id_jenis_retribusi`, `deleted`) VALUES
(1, 'Sewa Tanah 30x10 Meter', 1, 0),
(2, 'Sewa Perairan Indonesia', 2, 0),
(3, 'wkwk2', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `level`, `foto`, `alamat`) VALUES
('62c8d9656d781', 'admin', '$2y$10$Ocfqo5rxAx2UTiJ3vKe5Qujy2n22vwwr4sdgRV3NarRYJzNd/z8Ga', 'Admin Dishub', 'Administrator', '1.jpg', NULL),
('62ce63581292a', 'amal', '$2y$10$jLEA1KS/oM/Iflndt.Es1uoiL455Pv.sYulkmPnbJsHhjcNu7rePm', 'Ikhlasul Amal', 'Pelanggan', '1.jpg', 'Palembang'),
('62ce64ea9ea2b', 'agung', '$2y$10$056Komn0QBWazjgAdtYas.pjKd4Rbm.0CfqUEnZUXZvD5zaHNrD2i', 'Agung Rilo Pambudi', 'UPTD', '1.jpg', NULL),
('62d0e9fd78c07', 'kris', '$2y$10$BSm8fscfc0HffIHOZ.oKGOHJQONpWmt.Xka6h6GMBmLw3h7NJFIie', 'Kristianto', 'Pelanggan', '1.jpg', 'Cirebon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nm_wilayah` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nm_wilayah`, `deleted`) VALUES
(1, 'Palembang', 0),
(2, 'Cirebon', 0),
(3, 'wkwk2', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alokasi`
--
ALTER TABLE `alokasi`
  ADD PRIMARY KEY (`id_alokasi`);

--
-- Indeks untuk tabel `jenis_retribusi`
--
ALTER TABLE `jenis_retribusi`
  ADD PRIMARY KEY (`id_jenis_retribusi`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `retribusi`
--
ALTER TABLE `retribusi`
  ADD PRIMARY KEY (`id_retribusi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alokasi`
--
ALTER TABLE `alokasi`
  MODIFY `id_alokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_retribusi`
--
ALTER TABLE `jenis_retribusi`
  MODIFY `id_jenis_retribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `retribusi`
--
ALTER TABLE `retribusi`
  MODIFY `id_retribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
