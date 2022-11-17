-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 14:27:49
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pethero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animals`
--

CREATE TABLE `animals` (
  `animalId` int(11) NOT NULL,
  `animalname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `animals`
--

INSERT INTO `animals` (`animalId`, `animalname`) VALUES
(1, 'dog'),
(2, 'cat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `codeBook` int(11) NOT NULL,
  `initDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `interv` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `keeperId` int(11) NOT NULL,
  `petId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`codeBook`, `initDate`, `endDate`, `interv`, `status`, `ownerId`, `keeperId`, `petId`) VALUES
(4, '2022-11-16', '2022-11-30', 0, 'pending', 4, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `couponId` int(11) NOT NULL,
  `subtotal` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `codeBook` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inters`
--

CREATE TABLE `inters` (
  `interId` int(10) UNSIGNED NOT NULL,
  `initDate` date NOT NULL,
  `endDate` date NOT NULL,
  `interDays` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keepers`
--

CREATE TABLE `keepers` (
  `keeperId` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telephone` int(12) UNSIGNED DEFAULT NULL,
  `cuil` bigint(11) DEFAULT NULL,
  `availStart` date DEFAULT NULL,
  `availEnd` date DEFAULT NULL,
  `price` float UNSIGNED DEFAULT NULL,
  `stars` int(10) UNSIGNED DEFAULT NULL,
  `disponibilidad` tinyint(4) DEFAULT NULL,
  `existencia` tinyint(4) DEFAULT NULL,
  `typeKeep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `keepers`
--

INSERT INTO `keepers` (`keeperId`, `firstname`, `lastname`, `username`, `password`, `email`, `address`, `telephone`, `cuil`, `availStart`, `availEnd`, `price`, `stars`, `disponibilidad`, `existencia`, `typeKeep`) VALUES
(1, 'keepercito', 'asdkjn', 'keper', '1234', 'asdasd@gmail.com', 'aslkdm 123', 123213123, 213123, '2022-11-10', '2022-11-24', 80, 1, NULL, NULL, 3),
(2, 'dsfggxdfgfsd', 'asds', 'keepero', '1234', 'askdjnaa@gmail.com', '3332asdasd', 6754776, 231456, '2022-11-17', '2022-11-25', 235, 1, NULL, NULL, 2),
(3, 'aaazzzaaa', 'sadbvbb', 'kiip', '1234', 'askldmkeep@gmai.com', 'asjdn332', 776734, 768679, '2022-11-10', '2022-11-19', 10, 1, NULL, NULL, 1),
(4, 'dfghdfg', 'hhhh', 'registrado', '1234', 'reg@gmai.com', 'asd 2', 656654, 234456, '2022-11-10', '2022-11-24', 222, 1, NULL, NULL, 3),
(5, 'skiper', 'kip', 'quiper', '1234', 'sdjkfnmnn@gmai.com', '923 askjdn', 824390, 894598, '2022-11-17', '2022-11-18', 90, 1, NULL, NULL, 2),
(6, 'zzzzzz', 'zzz', 'quip', '1234', 'sdkjlfnm@gmai.com', 'zzz 123', 6785, 545636, '2022-11-10', '2022-11-17', 55, 1, NULL, NULL, 1),
(7, 'zxxczxcc', 'xzccx', 'kip', '1234', '324@gmail.com', '34asdxc', 2345667, 456564, '2022-11-18', '2022-11-25', 56, 1, NULL, NULL, 3),
(8, 'prueba', 'Carla', 'kyper', '123456', 'asdkn@gmail.com', 'asdas 23', 4294967295, 2147483647, '2022-11-18', '2022-12-01', 80, 1, NULL, NULL, 2),
(9, 'aszzxzxzxzx', 'zxxzx', 'kipper', '123456', 'aklsdmmm@gmail.com', 'cxzc 23', 566778888, 99999, '0000-00-00', '0000-00-00', 231, 1, 1, 1, 2),
(10, 'aszxzxzx', 'zxxasdzx', 'kupper', '123456', 'aklsdtmmm@gmail.com', 'cxzc 23', 566778888, 995999, '2022-11-17', '2022-11-30', 21, 1, 1, 1, 2),
(11, 'aszytx', 'ghmnbm', 'keepper', '123456', 'akls666m@gmail.com', 'cxuzct 23', 566778888, 91238293857, '2022-11-17', '2022-11-30', 231, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `owners`
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
-- Volcado de datos para la tabla `owners`
--

INSERT INTO `owners` (`ownerId`, `firstname`, `lastname`, `dni`, `username`, `password`, `email`, `address`, `telephone`) VALUES
(1, 'usernombre', 'userapellido', 123123, 'user', '1234', 'asjkdn@gmail.com', 'asdjn 213', 123123),
(2, 'asdasdasdasd', 'gsdfasd', 312443, 'usuario2', '1234', 'askjdnm@gmail.com', 'asdsd2', 65456),
(3, 'ssssssss', 'ffffffff', 3456666, 'usuario3', '1234', 'aslkdms@gaail.com', 'dasdasd', 343111),
(4, 'zzzzwwww', 'sdgdsfg', 4566723, 'usuarioprueba', '1234', 'pruebbba@gmail.com', 'asdg 223', 89686),
(5, 'asdzzzzzz', 'ccccccc', 234156666, 'usercito', '123456', 'usercito@gmail.com', 'asdas 2312', 345436534);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
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
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`petId`, `name`, `sizeId`, `breed`, `ownerId`, `animalTypeId`) VALUES
(8, 'Ocho', 2, 'Dogo', 3, 1),
(9, 'Novi', 3, 'Fenicio', 3, 2),
(10, 'Michi', 2, 'Egipcio', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `sizeId` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `descrip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`sizeId`, `size`, `descrip`) VALUES
(1, 'small', 'menor cinco kg'),
(2, 'medium', 'mayor cinco kg menor que quince kg'),
(3, 'large', 'mayor veintekg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalId`);

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`codeBook`),
  ADD KEY `FK-idOwnerBook` (`ownerId`),
  ADD KEY `FK-idKeeperBook` (`keeperId`),
  ADD KEY `FK-idPetBook` (`petId`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`couponId`),
  ADD KEY `FK-codeBookCoup` (`codeBook`);

--
-- Indices de la tabla `inters`
--
ALTER TABLE `inters`
  ADD PRIMARY KEY (`interId`);

--
-- Indices de la tabla `keepers`
--
ALTER TABLE `keepers`
  ADD PRIMARY KEY (`keeperId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cuil` (`cuil`),
  ADD KEY `FK-idSize` (`typeKeep`);

--
-- Indices de la tabla `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ownerId`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petId`),
  ADD KEY `FK-OwnerIdPet` (`ownerId`),
  ADD KEY `FK-sizeId` (`sizeId`),
  ADD KEY `FK-AnimTypeId` (`animalTypeId`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeId`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK-idKeeperBook` FOREIGN KEY (`keeperId`) REFERENCES `keepers` (`keeperId`),
  ADD CONSTRAINT `FK-idOwnerBook` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`),
  ADD CONSTRAINT `FK-idPetBook` FOREIGN KEY (`petId`) REFERENCES `pets` (`petId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `FK-codeBookCoup` FOREIGN KEY (`codeBook`) REFERENCES `bookings` (`codeBook`);

--
-- Filtros para la tabla `keepers`
--
ALTER TABLE `keepers`
  ADD CONSTRAINT `FK-idSize` FOREIGN KEY (`typeKeep`) REFERENCES `sizes` (`sizeId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `FK-AnimTypeId` FOREIGN KEY (`animalTypeId`) REFERENCES `animals` (`animalId`),
  ADD CONSTRAINT `FK-OwnerIdPet` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`),
  ADD CONSTRAINT `FK-sizeId` FOREIGN KEY (`sizeId`) REFERENCES `sizes` (`sizeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;