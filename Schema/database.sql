-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Nov 11, 2022 at 01:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pethero`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animalId` int(11) NOT NULL,
  `animalname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animalId`, `animalname`) VALUES
(1, 'dog'),
(2, 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `codeBook` int(11) NOT NULL,
  `initDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `interval` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `ownerId` int(11) NOT NULL,
  `keeperId` int(11) NOT NULL,
  `petId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`codeBook`, `initDate`, `endDate`, `interval`, `status`, `ownerId`, `keeperId`, `petId`) VALUES
(0, '2022-11-12', '2022-11-15', NULL, 'PREAPROBADO', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `keepers`
--

CREATE TABLE `keepers` (
  `keeperId` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telephone` int(10) UNSIGNED DEFAULT NULL,
  `cuil` int(11) DEFAULT NULL,
  `availStart` date DEFAULT NULL,
  `availEnd` date DEFAULT NULL,
  `price` float UNSIGNED DEFAULT NULL,
  `stars` int(10) UNSIGNED DEFAULT NULL,
  `disponibilidad` tinyint(4) DEFAULT NULL,
  `existencia` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keepers`
--

INSERT INTO `keepers` (`keeperId`, `firstname`, `lastname`, `username`, `password`, `email`, `address`, `telephone`, `cuil`, `availStart`, `availEnd`, `price`, `stars`, `disponibilidad`, `existencia`) VALUES
(1, 'keepercito', 'asdkjn', 'keper', '1234', 'asdasd@gmail.com', 'aslkdm 123', 123213123, 213123, '2022-11-10', '2022-11-24', 80, 1, NULL, NULL),
(2, 'dsfggxdfgfsd', 'asds', 'keepero', '1234', 'askdjnaa@gmail.com', '3332asdasd', 6754776, 231456, '2022-11-17', '2022-11-25', 235, 1, NULL, NULL),
(3, 'aaazzzaaa', 'sadbvbb', 'kiip', '1234', 'askldmkeep@gmai.com', 'asjdn332', 776734, 768679, '2022-11-10', '2022-11-19', 10, 1, NULL, NULL),
(4, 'dfghdfg', 'hhhh', 'registrado', '1234', 'reg@gmai.com', 'asd 2', 656654, 234456, '2022-11-10', '2022-11-24', 222, 1, NULL, NULL),
(5, 'skiper', 'kip', 'quiper', '1234', 'sdjkfnmnn@gmai.com', '923 askjdn', 824390, 894598, '2022-11-17', '2022-11-18', 90, 1, NULL, NULL),
(6, 'zzzzzz', 'zzz', 'quip', '1234', 'sdkjlfnm@gmai.com', 'zzz 123', 6785, 545636, '2022-11-10', '2022-11-17', 55, 1, NULL, NULL),
(7, 'zxxczxcc', 'xzccx', 'kip', '1234', '324@gmail.com', '34asdxc', 2345667, 456564, '2022-11-18', '2022-11-25', 56, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `ownerId` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `dni` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telephone` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerId`, `firstname`, `lastname`, `dni`, `username`, `password`, `email`, `address`, `telephone`) VALUES
(1, 'usernombre', 'userapellido', 123123, 'user', '1234', 'asjkdn@gmail.com', 'asdjn 213', 123123),
(2, 'asdasdasdasd', 'gsdfasd', 312443, 'usuario2', '1234', 'askjdnm@gmail.com', 'asdsd2', 65456),
(3, 'ssssssss', 'ffffffff', 3456666, 'usuario3', '1234', 'aslkdms@gaail.com', 'dasdasd', 343111);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sizeId` int(11) NOT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `ownerId` int(11) NOT NULL,
  `animalTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petId`, `name`, `sizeId`, `breed`, `ownerId`, `animalTypeId`) VALUES
(1, 'Pochita', 1, 'Callejero', 1, 1),
(3, 'assdad', 3, 'Labrador', 1, 1),
(5, 'Ipa', 2, 'Labrador', 1, 2),
(6, 'Averahoraconestes', 1, 'Caniche', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `sizeId` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `descrip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`sizeId`, `size`, `descrip`) VALUES
(1, 'small', 'menor cinco kg'),
(2, 'medium', 'mayor cinco kg menor que quince kg'),
(3, 'large', 'mayor veintekg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalId`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`codeBook`),
  ADD KEY `FK-idOwnerBook` (`ownerId`),
  ADD KEY `FK-idKeeperBook` (`keeperId`),
  ADD KEY `FK-idPetBook` (`petId`);

--
-- Indexes for table `keepers`
--
ALTER TABLE `keepers`
  ADD PRIMARY KEY (`keeperId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cuil` (`cuil`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ownerId`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petId`),
  ADD KEY `FK-OwnerIdPet` (`ownerId`),
  ADD KEY `FK-sizeId` (`sizeId`),
  ADD KEY `FK-AnimTypeId` (`animalTypeId`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK-idKeeperBook` FOREIGN KEY (`keeperId`) REFERENCES `keepers` (`keeperId`),
  ADD CONSTRAINT `FK-idOwnerBook` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`),
  ADD CONSTRAINT `FK-idPetBook` FOREIGN KEY (`petId`) REFERENCES `pets` (`petId`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `FK-AnimTypeId` FOREIGN KEY (`animalTypeId`) REFERENCES `animals` (`animalId`),
  ADD CONSTRAINT `FK-OwnerIdPet` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`),
  ADD CONSTRAINT `FK-sizeId` FOREIGN KEY (`sizeId`) REFERENCES `sizes` (`sizeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
