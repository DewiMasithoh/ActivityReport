-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 05:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activityreport`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `deskripsi` varchar(40) CHARACTER SET utf8 NOT NULL,
  `tanggal_record` datetime NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `total_jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_activity`, `id_user`, `id_proyek`, `deskripsi`, `tanggal_record`, `waktu_mulai`, `waktu_selesai`, `total_jam`) VALUES
(1, 6, 2, 'kasjgk', '2019-12-09 11:20:16', '2019-12-09 07:30:00', '2019-12-09 09:30:00', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `deskripsi_proyek` varchar(200) NOT NULL,
  `status_proyek` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `deskripsi_proyek`, `status_proyek`) VALUES
(1, 'mobil roda 3', ''),
(2, 'mobil tus', ''),
(3, 'mobil anam', ''),
(4, 'mobil riki', ''),
(5, 'mobil kita', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`, `first_name`, `last_name`, `email`, `photo`, `active`) VALUES
(5, 2, 'Manager', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', 'Project Manager', 'Warrick Keith Yeoman', '', 'Manager.JPG', 1),
(6, 4, '1137', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', 'Design', 'Muh. Nur Fauzi Sy', '', '1137.JPG', 1),
(7, 4, '1048', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', '', 'Puji Lestari', '', '1048.JPG', 1),
(8, 4, '1126', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', '', 'Slamet Riyanto', '', '1126.JPG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
