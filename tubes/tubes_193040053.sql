-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 02:36 PM
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
-- Database: `tubes_193040053`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `cover` varchar(64) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `pengarang` varchar(64) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `harga` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `cover`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `harga`) VALUES
(1, 'sophie.jpg', 'Dunia Sophie', 'Jostien Gaarden', 'Mizan Pustaka', '2010', 'Rp. 120.000'),
(2, 'anna.jpg', 'Dunia Anna', 'Jostien Gaarden', 'Mizan', '2014', 'Rp. 45.000'),
(3, 'bumi.jpg', 'Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 'Rp. 90.000'),
(4, 'bulan.jpg', 'Bulan', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 'Rp. 85.000'),
(5, 'matahari.jpg', 'Matahari', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 'Rp. 85.000'),
(6, 'bintang.jpg', 'Bintang', 'Tere Liye', 'Gramedia Pustaka Utama', '2017', 'Rp. 85.000'),
(7, 'php.jpg', 'PHP untuk Programmer Pemula', 'Jubilee Enterprise', 'Elex Media Komputindo', '2019', 'Rp. 75.000'),
(8, 'sejarahdunia.jpg', 'Sejarah Dunia yang Disembunyikan', 'Jonathan Black', 'Alvabet', '2015', 'Rp. 130.000'),
(9, '40kisah.jpg', '40 Kisah Akhir Hidup Kezaliman Makhluk-makhluk Allah', 'Kaserun As Rahman', 'Lentera Hati', '2015', 'Rp. 70.000'),
(10, 'panglima.jpg', 'Para Panglima Islam Penakluk Dunia', 'Muhammad Ali', 'Umul Qura & Aqwam', '2016', 'Rp. 130.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
