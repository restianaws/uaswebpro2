-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 14.33
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpro2_2023`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuku`
--

CREATE TABLE `tbuku` (
  `id_buku` int(255) NOT NULL,
  `kode_buku` char(50) NOT NULL,
  `judul_buku` char(255) NOT NULL,
  `kategori_buku` int(255) NOT NULL,
  `cover_buku` char(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuku`
--

INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES
(0, 'OTO-0000', 'Mobil', 3, '20230802173833Mobil.jpg', '0000-00-00 00:00:00', '2023-08-02 15:38:33', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tkategori`
--

CREATE TABLE `tkategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tkategori`
--

INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES
(1, 'pemrograman', 'BP'),
(2, 'Bahasa', 'BHS'),
(3, 'Otomotif', 'OTO'),
(4, 'Rumah Tangga', 'RT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`) VALUES
(2, 'Nur Septiyanti', 'nurseptiyanti08@gmail.com', 'nurseptiyanti', '$2y$10$eImdVKomVy8FQvEG.noYN.JCEr58l.pXReDPjmxxhZe6SaWV0CZfG', NULL, '2023-08-03 15:34:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbuku`
--
ALTER TABLE `tbuku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);
ALTER TABLE `tbuku` ADD FULLTEXT KEY `judul_buku` (`judul_buku`);

--
-- Indeks untuk tabel `tkategori`
--
ALTER TABLE `tkategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tkategori`
--
ALTER TABLE `tkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
