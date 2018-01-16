-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2018 at 02:15 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentuldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(12) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kecamatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `name`, `email`, `telp`, `prov`, `kota`, `kecamatan`) VALUES
(2, 'maulana achmad', 'maulana0593@gmail.com', '+6287776764915', 'jawa barat', 'Bekasi', 'Bekasi Utara'),
(3, 'calmbe', 'testing@gmail.com', '+6287776764915', 'jawa barat', 'Djakarta', 'Bekasi Utara'),
(4, 'anonymous', 'anonymous@gmail.com', '+6287776764915', 'jawa barat', 'Djakarta', 'Bekasi Utara'),
(5, 'hackintosh', 'hackintosh@gmail.com', '+6287776764915', 'jawa barat', 'Djakarta', 'Bekasi Utara');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(12) NOT NULL,
  `id_kota` int(12) NOT NULL,
  `name` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kota`, `name`) VALUES
(1, 1, 'Bekasi Utara'),
(2, 1, 'Bekasi Barat');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(12) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `name`) VALUES
(1, 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `namefile` varchar(120) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `namefile`, `email`) VALUES
(1, 'invokercarl7', '21232f297a57a5a743894a0e4a801fc3', 'achmad', 'image.png', 'maulana0593@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
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
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
