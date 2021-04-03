-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 01:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lf_keluhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Non Bidang'),
(2, 'Jaminan Kualitas'),
(3, 'Pembelian'),
(4, 'Distribusi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `respon` text NOT NULL,
  `tanggal_feedback` date NOT NULL,
  `tanggal_respon` date NOT NULL,
  `id_keluhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `feedback`, `respon`, `tanggal_feedback`, `tanggal_respon`, `id_keluhan`) VALUES
(1, 'Terima kasih, jangan terulangi di order saya selanjutnya', 'Baik nanti akan kami perbaiki, mohon maaf atas ketidaknyamanannya', '2021-04-03', '2021-04-02', 1),
(2, '', 'Gimana bos? Masih kotor?', '2021-04-05', '2021-04-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` text NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_keluhan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `id_user`, `judul`, `keluhan`, `tanggal_keluhan`, `status`, `id_bidang`) VALUES
(1, 1, '', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem mollitia totam culpa nisi! Provident quam commodi, placeat quas similique beatae recusandae, omnis cumque eius accusamus ab sunt tempora dicta repellendus perspiciatis voluptatibus libero architecto. Ullam corporis molestiae mollitia iusto nam laboriosam quidem esse, perferendis dolorum? Alias delectus suscipit magni, nostrum recusandae doloremque quidem facere earum porro repell</p>', '2021-04-01', 'Diteruskan', 2),
(2, 1, 'Galon bocor', 'Sudah beberapa kali dalam 1 bulan ini saya mendapatkan galon yang bocor, rugi', '2021-04-02', 'Ditolak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `id_bidang`) VALUES
(1, 'pelanggan', 1),
(2, 'operator', 1),
(3, 'direktur', 1),
(4, 'bidang', 2),
(5, 'bidang', 3),
(6, 'bidang', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `username`, `password`, `alamat`, `id_level`) VALUES
(1, 'Pelanggan', 'Ganteng', 'pelanggan', '$2y$10$3oUer2/aJCDDivhDDMolgOu2G.1wkVqQsmAMk2lr45nxDjJX64m6a', 'Jl SWK', 1),
(2, 'Operator', 'Ganteng', 'operator', '$2y$10$IdtLRUf/1tBtAC/OwbzkKuPvw6aiAxtSWGjT3mKG.SDEU.TypcQMK', 'Sleman', 2),
(3, 'Direktur', 'Cantik', 'direktur', '$2y$10$r.69/AILh0MgH3t9gCKb2OTGsxajorJi02oUqJ1qS1Ld1c0BPHOJe', 'lalalalala', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_keluhan` (`id_keluhan`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
