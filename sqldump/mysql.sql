-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 01-04-2022 a las 18:50:14
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpmotors`
--
CREATE DATABASE IF NOT EXISTS `phpmotors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `phpmotors`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `clientId` int UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(15, 'Tony', 'Stark', 'TonyStark@gmail.com', '$2y$10$lPlyNFDvR1ghtW.gcMfe..Sqn.AGNHOZagkTArctEOtnyi4UFrpeC', '1', NULL),
(17, 'Cristian', 'Alegre', 'cristiannahuelalegrebustos@gmail.com', '$2y$10$GP9rfb21no/rjww8mYM54e1dFJ3F65P4d9mvD2Dofj6nXmrQdtF/6', '3', NULL),
(19, 'Admin', 'User', 'admin@cse340.net', '$2y$10$hWw9NM.Dn037OpbOlK00yeaat30Iq.v/bQ2pDMHFi1EO6jRSABHeq', '3', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `imgId` int NOT NULL,
  `invId` int NOT NULL,
  `imgName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgPrimary` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(5, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2022-03-23 19:04:24', 1),
(6, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2022-03-23 19:04:24', 1),
(7, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2022-03-23 19:34:32', 1),
(8, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2022-03-23 19:34:32', 1),
(9, 4, 'monster.jpg', '/phpmotors/images/vehicles/monster.jpg', '2022-03-23 22:07:41', 1),
(10, 4, 'monster-tn.jpg', '/phpmotors/images/vehicles/monster-tn.jpg', '2022-03-23 22:07:41', 1),
(11, 5, 'mechanic.jpg', '/phpmotors/images/vehicles/mechanic.jpg', '2022-03-23 22:10:47', 0),
(12, 5, 'mechanic-tn.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '2022-03-23 22:10:47', 0),
(13, 7, 'mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van.jpg', '2022-03-23 22:13:48', 1),
(14, 7, 'mystery-van-tn.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '2022-03-23 22:13:48', 1),
(15, 9, 'crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic.jpg', '2022-03-23 22:14:56', 1),
(16, 9, 'crown-vic-tn.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '2022-03-23 22:14:56', 1),
(17, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2022-03-23 22:15:48', 1),
(18, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2022-03-23 22:15:48', 1),
(19, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2022-03-23 22:16:30', 1),
(20, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2022-03-23 22:16:30', 1),
(21, 14, 'fbi.jpg', '/phpmotors/images/vehicles/fbi.jpg', '2022-03-23 22:18:40', 1),
(22, 14, 'fbi-tn.jpg', '/phpmotors/images/vehicles/fbi-tn.jpg', '2022-03-23 22:18:40', 1),
(25, 1, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2022-03-23 22:27:10', 1),
(26, 1, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2022-03-23 22:27:10', 1),
(29, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2022-03-23 22:31:38', 1),
(30, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2022-03-23 22:31:38', 1),
(31, 1, 'DeLoren-red.jpg', '/phpmotors/images/vehicles/DeLoren-red.jpg', '2022-03-23 22:38:45', 0),
(32, 1, 'DeLoren-red-tn.jpg', '/phpmotors/images/vehicles/DeLoren-red-tn.jpg', '2022-03-23 22:38:45', 0),
(33, 5, 'ms.jpg', '/phpmotors/images/vehicles/ms.jpg', '2022-03-23 22:46:05', 0),
(34, 5, 'ms-tn.jpg', '/phpmotors/images/vehicles/ms-tn.jpg', '2022-03-23 22:46:05', 0),
(35, 9, 'FDvictoria.png', '/phpmotors/images/vehicles/FDvictoria.png', '2022-03-23 22:51:32', 0),
(36, 9, 'FDvictoria-tn.png', '/phpmotors/images/vehicles/FDvictoria-tn.png', '2022-03-23 22:51:32', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

CREATE TABLE `inventory` (
  `invId` int NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'DMC', 'Delorean', 'So fast its almost like traveling in time.Coolest ride on the road.I&#39;m feeling Marty Mcfly.The most futuristic ride of our day. The 80&#39;s livin and love it!', '../images/vehicles/delorean.jpg', '../images/vehicles/delorean-tn.jpg', '100000', 12, 'white', 3),
(4, 'Monster', 'Truck', '                Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.        ', '../images/vehicles/monster.jpg', '../images/vehicles/monster-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', '        Not sure where this car came from. However, with a little tender loving care it will run as good a new.    ', '../images/vehicles/ms.jpg', '../images/vehicles/ms-tn.jpg', '100', 1, 'Rust', 5),
(7, 'Mystery', 'Machine', '                                        Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.                    ', '../images/vehicles/mystery-van.jpg', '../images/vehicles/mystery-van-tn.jpg', '1000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', '                Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.        ', '../images/vehicles/fire-truck.jpg', '../images/vehicles/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', '        After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.    ', '../images/vehicles/crown-vic.jpg', '../images/vehicles/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(11, 'Cadillac', 'Escalade', '        This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.    ', '../images/vehicles/escalade.jpg', '../images/vehicles/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', '        Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.    ', '../images/vehicles/hummer.jpg', '../images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', '                                Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!                ', '../images/vehicles/aerocar.jpg', '../images/vehicles/aerocar-tn.jpg', '1000000', 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', '                Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month.         ', '../images/vehicles/fbi.jpg', '../images/vehicles/fbi-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', '                        Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.            ', '../images/vehicles/no-image.png', '../images/vehicles/no-image-tn.png', '35000', 1, 'Brown', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int NOT NULL,
  `clientId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(16, 'I preffer an helicopter...!', '2022-04-01 17:49:21', 13, 19),
(17, 'I want one for my birthday', '2022-04-01 17:59:17', 4, 19),
(18, 'Enter something', '2022-04-01 18:19:09', 13, 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `imgDate` (`invId`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `invId` (`invId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
