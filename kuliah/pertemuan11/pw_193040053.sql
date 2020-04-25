-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2020 pada 17.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_193040053`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nrp` char(9) NOT NULL,
  `jurusan` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `jurusan`, `email`, `foto`) VALUES
(1, 'Fauzan Nursalma Mawardi', '193040053', 'Teknik Informatika', '193040053@mail.unpas.ac.id', 'fauzan.jpeg'),
(2, 'Muhammad Angga Saputra', '193040070', 'Teknik Informatika', '193040070@mail.unpas.ac.id', 'angga.jpeg'),
(3, 'Herlan Nurachman', '193040043', 'Teknik Informatika', '193040043@mail.unpas.ac.id', 'herlan.jpeg'),
(4, 'Muhammad Riskhi Ramadhan', '193060033', 'Perencanaan Wilayah dan Kota', '193060033@mail.unpas.ac.id', 'rama.jpeg'),
(5, 'Muhammad Raihan Ramadhan', '193060045', 'Perencanaan Wilayah dan Kota', '193060045@mail.unpas.ac.id', 'raihan.jpeg'),
(6, 'Hannan Fakhrul Hakim', '193040073', 'Teknik Informatika', '193040073@mail.unpas.ac.id', 'hannan.jpeg'),
(7, 'Hilma Salsabila', '193010074', 'Teknik Industri', '193040074@mail.unpas.ac.id', 'hilma.jpeg'),
(8, 'Gustano Subhantio', '193010026', 'Teknik Industri', '193010026@mail.unpas.ac.id', 'tio.jpeg'),
(9, 'Gilda Agustina Pramesti', '193010067', 'Teknik Industri', '193010067@mail.unpas.ac.id', 'gilda.jpeg'),
(10, 'Putri Amaliasikin', '193020026', 'Teknik Pangan', '193020026@mail.unpas.ac.id', 'putri.jpeg'),
(14, 'Aji Nuansa Sengarie', '193040046', 'Teknik Informatika', '193040046@mail.unpas.ac.id', 'aji.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
