-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 07:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
-- Table structure for table `mahasiswa`
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
-- Dumping data for table `mahasiswa`
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
(14, 'Aji Nuansa Sengarie', '193040046', 'Teknik Informatika', '193040046@mail.unpas.ac.id', 'aji.jpeg'),
(20, 'Salsabila Nada Adzani ', '193040050', 'Teknik Informatika', '193040050@mail.unpas.ac.id', 'salsa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'fauzann', '$2y$10$/wBlZCWedidudznIXxjekeX4pDqyqtTBkWoD3d2nqHVQ0Ii7XEd22'),
(4, 'admin', '$2y$10$YdGZp5aJr2LAjoWxZSxk2Or7dMVz8tTRajT4Mq8sCPBjTw0rqydXm'),
(5, 'fauzan', '$2y$10$2zePOSZFPWH7s8fbYsZh0.CkGvcB.h6Kb2HZQJNNvkguLP3MmGUiu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
