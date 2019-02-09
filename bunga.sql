-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 06:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bunga`
--

-- --------------------------------------------------------

--
-- Table structure for table `bunga`
--

CREATE TABLE IF NOT EXISTS `bunga` (
  `kode_bunga` varchar(6) NOT NULL,
  `tipe_bunga` varchar(100) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `stok` int(3) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bunga`
--

INSERT INTO `bunga` (`kode_bunga`, `tipe_bunga`, `id_kategori`, `stok`, `harga`) VALUES
('BGNVL', 'Bugenvile', 'BGNVL', 200, 40000),
('BLOCD', 'Black Orchid', 'OCKND', 98, 1000000),
('BLRSE', 'Blue Rose', 'RSKND', 47, 500000),
('BLTLP', 'Blue Tulip', 'TLKND', 198, 100000),
('LLKND', 'Blue Lily', 'LLKND', 100, 60000),
('PNKRS', 'Pink Rose', 'RSKND', 99, 500000),
('PTKND', 'Petunia', 'PNKND', 100, 20000),
('RDDHL', 'Red Dahlia', 'DLKND', 500, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis`) VALUES
('BGNVL', 'Bugenvile'),
('DLKND', 'Dahlia'),
('LLKND', 'Lily'),
('OCKND', 'Orchid'),
('PNKND', 'Petunia'),
('RSKND', 'Rose'),
('SKTTK', 'Suket Teki'),
('TLKND', 'Tulip');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
`no_nota` int(5) NOT NULL,
  `kode_bunga` varchar(6) NOT NULL,
  `no_transaksi` int(4) NOT NULL,
  `username` varchar(5) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`no_nota`, `kode_bunga`, `no_transaksi`, `username`, `jumlah`) VALUES
(1, 'BLOCD', 345, 'KSR01', 0),
(5, 'BLOCD', 351, '', 1),
(6, 'BLOCD', 352, '', 1),
(7, 'BLTLP', 353, '', 1),
(8, 'BLRSE', 353, '', 1),
(9, 'BLRSE', 354, '', 1),
(10, 'BLOCD', 355, '', 1),
(11, 'BLRSE', 356, '', 1),
(12, 'BLTLP', 357, '', 1),
(13, 'PNKRS', 357, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`no_transaksi` int(4) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `username` varchar(5) NOT NULL,
  `pembeli` varchar(100) NOT NULL,
  `total_harga` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal_beli`, `username`, `pembeli`, `total_harga`) VALUES
(353, '2019-02-08', 'KSR01', 'Hotman', '600000'),
(354, '2019-02-08', 'KSR01', 'Regi', '500000'),
(355, '2019-02-09', 'KSR01', '', '1000000'),
(356, '2019-02-09', 'KSR01', 'Tyo', '500000'),
(357, '2019-02-09', 'KSR01', 'Regi', '600000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `divisi_bagian` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama_user`, `tgl_lahir`, `divisi_bagian`, `email`, `password`) VALUES
('ADM01', 'Nailiyatul Afifah', '2002-07-11', 'Admin', 'nailiyatulafifah@gmail.com', 'adm01'),
('ADM02', 'Firda Reinika', '2001-07-04', 'Admin', 'firdareinika@gmail.com', 'adm02'),
('KSR01', 'Danny Bramantyo', '2002-05-01', 'Kasir', 'dannybramantyo@gmail.com', 'ksr01'),
('KSR02', 'Alfira Santa Praja', '2001-07-20', 'Kasir', 'alfirasanta@gmail.com', 'ksr02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunga`
--
ALTER TABLE `bunga`
 ADD PRIMARY KEY (`kode_bunga`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
 ADD PRIMARY KEY (`no_nota`), ADD KEY `no_transaksi` (`no_transaksi`), ADD KEY `user` (`username`), ADD KEY `kode_mobil` (`kode_bunga`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`no_transaksi`), ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
MODIFY `no_nota` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `no_transaksi` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=358;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bunga`
--
ALTER TABLE `bunga`
ADD CONSTRAINT `bunga_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`kode_bunga`) REFERENCES `bunga` (`kode_bunga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
