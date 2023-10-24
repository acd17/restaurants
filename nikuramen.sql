-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 11:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nikuramen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `namaAdmin` varchar(255) DEFAULT NULL,
  `passAdmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `namaAdmin`, `passAdmin`) VALUES
(1, 'Calista', '$2a$12$3M7RnuKgV5K.0uv6FKrg5uSGWCwrmkY0HDOr3aryUMb.ycXRKO7QO');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `transaksiID` int(11) DEFAULT NULL,
  `menuID` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` int(11) NOT NULL,
  `namaKategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `namaKategori`) VALUES
(1, 'RAMEN'),
(2, 'RICE BOWL'),
(3, 'SIDES MENU'),
(4, 'DESSERT'),
(5, 'DRINKS\r\n'),
(6, 'enam');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `namaMenu` varchar(255) DEFAULT NULL,
  `deskripsiMenu` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kategoriID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `gambar`, `namaMenu`, `deskripsiMenu`, `harga`, `kategoriID`) VALUES
(13, 'gambar/ChasuCurry.png', 'CHASU ORIGINAL RAMEN', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 45000, 1),
(14, NULL, 'NIKU RICE BOWL', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 60000, 2),
(15, NULL, 'GYOZA', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 30000, 3),
(16, NULL, 'NIKU MILK PUDDING', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 25000, 4),
(17, NULL, 'OCHA', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 20000, 5),
(18, NULL, 'NIKU RICE BOWL 2', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 60000, 2),
(19, NULL, 'NIKU RICE BOWL 3', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 60000, 2),
(20, NULL, 'OCHA 2', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 20000, 5),
(23, 'gambar/ChasuCurry.png', 'Niku Ramen', 'Niku ramen enak banget', 50000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksiID` int(11) NOT NULL,
  `totalHargaTransaksi` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `passUser` varchar(255) DEFAULT NULL,
  `namaDepanUser` varchar(255) NOT NULL,
  `namaBelakangUser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenisKelamin` varchar(255) NOT NULL,
  `tanggalLahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `passUser`, `namaDepanUser`, `namaBelakangUser`, `email`, `jenisKelamin`, `tanggalLahir`) VALUES
(14, '$2y$10$4r/BEjiVS0KH09XFaMiLGeKiALwbKffYIy2OawuD8LzQmLfEMa9gi', 'Calista', 'Belva', 'calista.belva@student.umn.ac.id', 'female', '2023-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_kelamin` enum('male','female') NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `jenis_kelamin`, `first_name`, `last_name`, `tanggal_lahir`, `email`) VALUES
(1, 'admin', 'niku@ramen2023', 'admin', 'admin', 'male', '', '', '0000-00-00', 'niku@ramen.com'),
(2, 'jose', 'jose@123', 'user', 'jous', 'male', '', '', '0000-00-00', 'joseandreaslie@gmail.com'),
(4, 'vinka', 'vinka', 'user', 'vin ka', 'male', 'vin', 'ka', '2003-12-19', 'vinka@gmail.com'),
(5, 'VINIK', 'ken', 'user', 'kevin ken', 'male', 'kevin', 'ken', '2003-12-19', 'kevinken1912@icloud.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD KEY `transaksiID` (`transaksiID`),
  ADD KEY `menuID` (`menuID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`),
  ADD KEY `kategoriID` (`kategoriID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksiID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`transaksiID`) REFERENCES `transaksi` (`transaksiID`),
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`menuID`) REFERENCES `menu` (`menuID`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `kategori` (`kategoriID`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE resetPassword (
  id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  code VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
); 