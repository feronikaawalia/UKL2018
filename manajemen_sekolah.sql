-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 04:03 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `kode_guru` int(3) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `jumlah_jam` int(2) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`kode_guru`, `nama_guru`, `jumlah_jam`, `alamat`, `telp`, `email`) VALUES
(1, 'Lia   ', 1, 'Jalan Manggis No. 45', '081 123 456 444', 'lia@gmail.com'),
(2, 'Dian  ', 3, 'Jalan Roti No. 18', '081 333 555 789', 'dian@gmail.com'),
(3, 'Diaz ', 4, 'Jalan Merdeka No. 17', '083 456 321 789', 'diaz@gmail.com'),
(4, 'Tiara ', 5, 'Jalan Kelinci No. 27', '0812 1721 911', 'tiara@gmail.com'),
(5, 'Cindy ', 3, 'Jalan Lolipop No. 07', '0812 1721 915', 'cindy@gmail.com'),
(6, 'Zhong', 4, 'Jalan Lumba No. 01', '081 888 999 989', 'zhong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `kode_mapel` char(3) NOT NULL,
  `mapel` varchar(100) DEFAULT NULL,
  `alokasi_waktu` int(2) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `kode_guru` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mapel`
--

INSERT INTO `t_mapel` (`kode_mapel`, `mapel`, `alokasi_waktu`, `semester`, `kode_guru`) VALUES
('B08', 'Olahraga', 2, 2, 3),
('D10', 'Sejarah', 1, 1, 1),
('F26', 'Biologi', 4, 4, 4),
('P10', 'Menari', 2, 3, 5),
('R06', 'Kesenian', 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `userid` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`userid`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1'),
(3, 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `kode_guru` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `userid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD CONSTRAINT `t_mapel_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `t_guru` (`kode_guru`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
