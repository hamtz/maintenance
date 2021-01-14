-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mt_alat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `kode_barang`) VALUES
(1, 'Power Supply', 'PS001'),
(3, 'Hard Disk', 'HD001'),
(8, 'Memory RAM', 'RM001'),
(9, 'Mouse', 'MS001'),
(10, 'Monitor', 'MT001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_form_mt`
--

CREATE TABLE `tb_form_mt` (
  `id_mt` int(11) NOT NULL,
  `no_mt` int(30) NOT NULL,
  `tgl_mt` date NOT NULL,
  `petugas1` varchar(50) NOT NULL,
  `petugas2` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_form_mt`
--

INSERT INTO `tb_form_mt` (`id_mt`, `no_mt`, `tgl_mt`, `petugas1`, `petugas2`, `nama_barang`, `kode_barang`, `deskripsi`) VALUES
(1, 15, '2021-01-15', 'Panji Rachman Ramadhan, S.T., M.Eng.', 'Ilham', 'Monitor', 'MT00151', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_mt`
--

CREATE TABLE `tb_log_mt` (
  `no_mt_log` int(11) NOT NULL,
  `tgl_mt_log` date NOT NULL,
  `petugas1_log` varchar(50) NOT NULL,
  `petugas2_log` varchar(50) NOT NULL,
  `nama_barang_log` varchar(50) NOT NULL,
  `kode_barang_log` varchar(20) NOT NULL,
  `deskripsi_log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log_mt`
--

INSERT INTO `tb_log_mt` (`no_mt_log`, `tgl_mt_log`, `petugas1_log`, `petugas2_log`, `nama_barang_log`, `kode_barang_log`, `deskripsi_log`) VALUES
(1, '2021-01-01', 'Ilham Natsir', 'Muh Iswan', 'Power Supply', 'PS001', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.'),
(2, '2021-01-02', 'Muh Iswan', 'Ilham Natsir', 'Memory RAM', 'RM001', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.'),
(3, '2021-01-03', 'Panji Rachman Ramadhan, S.T., M.Eng.', 'Zainuddin, S.T.', 'Hard Disk', 'HD001', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.'),
(4, '2021-01-04', 'Iswan', 'Lewi', 'Mouse', 'MS001', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n'),
(5, '2021-01-05', 'Siapa', 'Dia', 'Power Supply', 'PS002', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n\r\n'),
(6, '2021-01-06', 'Panji Rachman Ramadhan, S.T., M.Eng.', 'Agus Suprijanto, S.T., M.Eng.', 'Power Supply', 'PS003', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.'),
(7, '2021-01-07', 'Panji Rachman Ramadhan, S.T., M.Eng.', 'Zainuddin, S.T.', 'Hard Disk', 'HD004', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.'),
(8, '2021-01-08', 'Ilham', 'Iswan', 'Power Supply', 'PS008', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n'),
(9, '2021-01-10', 'Zainuddin, S.T.', 'Ilham', 'Memory RAM', 'RM0010', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n'),
(10, '2021-01-10', 'Ilham', 'Zainuddin, S.T.', 'Monitor', 'MT002', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\n\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n'),
(11, '2021-01-11', 'Iswan', 'Ilham', 'Monitor', 'MT0011', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n'),
(12, '2021-01-12', 'Panji Rachman Ramadhan, S.T., M.Eng.', 'Ilham', 'Memory RAM', 'RM0012', 'Lorem Ipsum sir\r\n'),
(13, '2021-01-13', 'Ilham', 'Iswan', 'Monitor', 'MT0013', 'Monitor Baik\r\n'),
(14, '2021-01-14', 'Ilham Natsir', 'Muh Iswan', 'Hard Disk', 'Seagate Barracuda', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.'),
(15, '2021-01-15', 'Panji Rachman Ramadhan, S.T., M.Eng.', 'Ilham Natsir', 'Monitor', 'MT00151', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nip_pegawai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `nip_pegawai`) VALUES
(1, 'Panji Rachman Ramadhan, S.T., M.Eng.', '19850526 200912 1 003'),
(3, 'Agus Suprijanto, S.T., M.Eng.', '19841106 200801 1 003'),
(6, 'Zainuddin, S.T.', ''),
(7, 'Lewi', '19710508 199403 1 004'),
(8, 'Ilham', '217280197'),
(9, 'Iswan', '217280193');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reprint`
--

CREATE TABLE `tb_reprint` (
  `id_rep` int(10) NOT NULL,
  `no_mt_rep` int(3) NOT NULL,
  `tgl_mt_rep` date NOT NULL,
  `petugas1_rep` varchar(50) NOT NULL,
  `petugas2_rep` varchar(50) NOT NULL,
  `nama_barang_rep` varchar(50) NOT NULL,
  `kode_barang_rep` varchar(50) NOT NULL,
  `deskripsi_rep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reprint`
--

INSERT INTO `tb_reprint` (`id_rep`, `no_mt_rep`, `tgl_mt_rep`, `petugas1_rep`, `petugas2_rep`, `nama_barang_rep`, `kode_barang_rep`, `deskripsi_rep`) VALUES
(1, 14, '2021-01-14', 'Ilham Natsir', 'Muh Iswan', 'Hard Disk', 'Seagate Barracuda', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_form_mt`
--
ALTER TABLE `tb_form_mt`
  ADD PRIMARY KEY (`id_mt`);

--
-- Indexes for table `tb_log_mt`
--
ALTER TABLE `tb_log_mt`
  ADD PRIMARY KEY (`no_mt_log`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_reprint`
--
ALTER TABLE `tb_reprint`
  ADD PRIMARY KEY (`id_rep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_form_mt`
--
ALTER TABLE `tb_form_mt`
  MODIFY `id_mt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_reprint`
--
ALTER TABLE `tb_reprint`
  MODIFY `id_rep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
