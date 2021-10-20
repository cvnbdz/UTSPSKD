-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 09:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `enkripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id`, `name`, `username`, `email`, `password`, `pin`, `enkripsi`) VALUES
(17, 'Cavan Badiuz Maa', 'BADIUZ', 'cvnbdz@student.uns.ac.id', '2ca909352170522037a63538ee9b807e', '10a39075e70332ad4a0f4cd14e2beeb2b395bee0', 'DEENVA'),
(19, 'Badiuz Uus', 'UUS', 'cvnjr01@gmail.com', 'ec740b759541e9203aa9f7f01f14f205', 'eea13106ec69894b0d95b35ad615b7218d5b05eb', 'WYS'),
(21, 'murada', 'MURAD', 'murad@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'NWUEI'),
(22, 'Cavan Badiuz', 'CAVAN', 'cavan@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DCYES'),
(23, 'badiuzm', 'BADIUZ', 'badiuz@mail.com', '0bdf4aab3b005455ba94eaf2836915e9', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'CCGMZF'),
(24, 'Muhammad Adji', 'ADJI', 'adji@mail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'BFMM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
