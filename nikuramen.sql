-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 05:02 PM
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
(24, 'gambar/ChasuOri.jpeg', 'CHASU ORIGINAL RAMEN', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 40000, 1),
(25, 'gambar/ChasuCurry.png', 'CHASU CURRY RAMEN', 'Ramen keriting/lurus dengan kuah asin dan segar, beserta komponen lainnya', 40000, 1),
(26, 'gambar/NikuRiceBowl.jpg', 'NIKU RICE BOWL', 'Ini adalah hidangan nasi dengan potongan daging, seringkali disajikan dengan saus dan bumbu yang beragam.', 34000, 2),
(27, 'gambar/EbiFurai.png', 'EBI FURAI RICE BOWL', 'Hidangan nasi dengan udang ebi yang dilapisi tepung roti dan digoreng hingga renyah.', 37000, 2),
(28, 'gambar/Gyoza.jpg', 'GYOZA', 'Gyoza adalah pangsit Jepang yang diisi dengan daging dan sayuran, kemudian digoreng hingga renyah.', 30000, 3),
(29, 'gambar/Karage.jpg', 'KARAGE', 'Potongan ayam yang digoreng hingga renyah dalam adonan berempah.', 20000, 3),
(30, 'gambar/Dango.jpg', 'NIKU DANGO', 'Dango adalah kue Jepang berbentuk bulat yang disajikan dengan saus manis. \"Niku\" mungkin merujuk pada tambahan daging dalam hidangan ini.', 20000, 4),
(31, 'gambar/VanillaIceCream.jpg', 'VANILLA ICE CREAM', 'Es krim rasa vanila, rasa klasik yang lezat.', 8000, 4),
(32, 'gambar/Ocha.png', 'OCHA', 'Teh hijau, minuman yang sangat populer di Jepang.', 4000, 5),
(33, 'gambar/MineralWater.jpg', 'MINERAL WATER', 'Air mineral adalah air tanpa rasa tambahan, bersifat murni dan menyegarkan.', 3000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'admin', 'a496e620685bcde764947df82e590232', 'admin', 'admin', 'male', '', '', '0000-00-00', 'niku@gmail.com'),
(2, 'jose', 'jose@123', 'user', 'jous', 'male', '', '', '0000-00-00', 'jose@gmail.com'),
(4, 'vinka', 'vinka', 'user', 'vin ka', 'male', 'vin', 'ka', '2003-12-19', 'BLABLABLA@gmail.com'),
(9, 'ARIKULIE', '25d55ad283aa400af464c76d713c07ad', 'user', 'ARIKULIE ARIKULIE', 'male', 'ARIKULIE', 'ARIKULIE', '2023-10-04', 'jose.lie2208@gmail.com'),
(10, 'BrianLie', 'ace9c40e82b3ca895369a8307f673695', 'user', 'Brian Lie', 'male', 'Brian', 'Lie', '2023-10-04', 'arikulie@gmail.com');

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
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
