-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 10:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'agmarp', 'agmar123', 'Agmar Putra'),
(2, 'rahmat', '123', 'Rahmat'),
(3, 'jasuke', '123', 'Jasuke'),
(4, 'Marimas', '123', 'Marimas'),
(5, 'apoetra59@gmail.com', '123', 'Luxury Room'),
(6, 'admin', '123', 'Agmar Putra'),
(7, 'agung', 'agung123', 'Agung Guntara'),
(8, 'agmar', '123', 'Agmar Putra');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'XI RPL A'),
(4, 'X RPL A'),
(5, 'X RPL B'),
(6, 'X AXIOO'),
(7, 'X TI A'),
(8, 'X TI B'),
(10, 'X AGRO B'),
(11, 'X AGRO C'),
(12, 'X TKJ A'),
(13, 'X TKJ A'),
(14, 'XI RPL A'),
(15, 'XI RPL C'),
(16, 'XI TKJ A'),
(17, 'XI TKJ C'),
(19, 'XI AGRO A'),
(20, 'XI AGRO B'),
(21, 'XI AGRO C'),
(22, 'X AGRO A'),
(23, 'XI RPL B');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL,
  `password_pelanggan` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `telepon_pelanggan` varchar(20) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `id_kelas`) VALUES
(1, 'agung@gmail.com', 'agung123', 'Agung Gun', '089512099876', 1),
(2, 'apoetra59@gmail.com', '123', 'Agmar Putra', '089512011967', 1),
(3, 'agmarputra@gmail.com', '123', 'Agmar Putra', '089888777565444', 1),
(4, 'agmarp@gmail.com', '123', 'Agmar Putra', '089765567432', 1),
(5, 'abdul@gmail.com', '123', 'Abdul Rachman', '089512011967', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
(98, 2, '2020-04-21', 7500),
(99, 2, '2020-04-21', 7500),
(100, 1, '2020-04-21', 12000),
(101, 1, '2020-04-21', 5000),
(102, 1, '2020-04-22', 2000),
(103, 1, '2020-04-22', 7000),
(104, 1, '2020-04-22', 10000),
(105, 1, '2020-04-22', 10000),
(106, 1, '2020-04-22', 10000),
(107, 1, '2020-04-22', 10000),
(108, 1, '2020-04-22', 10000),
(109, 1, '2020-04-24', 16500),
(110, 1, '2020-04-24', 16500),
(111, 1, '2020-04-24', 16500),
(112, 1, '2020-04-24', 16500),
(113, 1, '2020-04-24', 11000),
(114, 1, '2020-04-24', 14000),
(115, 1, '2020-04-24', 14000),
(116, 1, '2020-04-24', 14000),
(117, 1, '2020-04-24', 17000),
(118, 1, '2020-04-24', 24500),
(119, 1, '2020-04-24', 27500),
(120, 1, '2020-04-25', 7500),
(121, 1, '2020-04-25', 7000),
(122, 3, '2020-04-26', 8000),
(123, 3, '2020-04-26', 10500),
(124, 4, '2020-04-26', 10500),
(125, 5, '2020-04-26', 7500),
(126, 5, '2020-04-26', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(117, 98, 14, 4),
(118, 98, 23, 1),
(119, 98, 24, 1),
(120, 99, 14, 4),
(121, 99, 23, 1),
(122, 99, 24, 1),
(123, 100, 24, 2),
(124, 100, 27, 1),
(125, 101, 23, 1),
(126, 103, 25, 1),
(127, 104, 25, 1),
(128, 104, 26, 1),
(129, 105, 25, 1),
(130, 105, 26, 1),
(131, 106, 25, 1),
(132, 106, 26, 1),
(133, 107, 25, 1),
(134, 107, 26, 1),
(135, 108, 25, 1),
(136, 108, 26, 1),
(137, 109, 23, 3),
(138, 109, 24, 1),
(139, 109, 26, 1),
(140, 110, 23, 3),
(141, 111, 23, 3),
(142, 111, 24, 1),
(143, 111, 26, 1),
(144, 112, 23, 3),
(145, 112, 24, 1),
(146, 112, 26, 1),
(147, 113, 23, 3),
(148, 114, 23, 3),
(149, 114, 24, 1),
(150, 114, 28, 1),
(151, 115, 23, 3),
(152, 115, 24, 1),
(153, 115, 28, 1),
(154, 116, 24, 1),
(155, 116, 28, 1),
(156, 116, 23, 3),
(157, 117, 24, 1),
(158, 117, 28, 1),
(159, 117, 23, 4),
(160, 118, 24, 2),
(161, 118, 28, 1),
(162, 118, 23, 4),
(163, 118, 27, 1),
(164, 119, 24, 2),
(165, 119, 28, 1),
(166, 119, 23, 4),
(167, 119, 27, 1),
(168, 119, 26, 1),
(169, 120, 23, 1),
(170, 120, 24, 1),
(171, 121, 29, 4),
(172, 121, 23, 1),
(173, 122, 23, 2),
(174, 123, 23, 2),
(175, 123, 24, 1),
(176, 124, 23, 2),
(177, 124, 24, 1),
(178, 125, 24, 1),
(179, 125, 23, 1),
(180, 126, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `berat_produk` int(11) DEFAULT NULL,
  `gambar_produk` varchar(100) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `gambar_produk`, `deskripsi_produk`, `stok`) VALUES
(23, 'Pulpen', 3000, 10, 'pulpen.jpg', '- Pulpen Warna Hitam\r\n- Merk Joyko', 170),
(24, 'Pensil', 2500, 10, 'pensil.jpg', '- Pensil 2B', 189),
(25, 'Buku', 5000, 200, 'buku.jpg', 'Buku SIDU\r\n60 Lembar', 200),
(30, 'Nasi Kuning', 5000, 900, 'naskun.jpg', '- Kerupuk\r\n- bihun\r\n- sambel', 20),
(31, 'Penghapus', 500, 20, 'penghaspus.jpg', '- Merk Joyko', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
