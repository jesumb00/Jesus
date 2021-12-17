-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 01:37:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `ticketId` int(3) NOT NULL,
  `productoId` int(3) NOT NULL,
  `unidades` int(3) NOT NULL,
  `precioUnidad` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`ticketId`, `productoId`, `unidades`, `precioUnidad`) VALUES
(1, 2, 55, '4.99'),
(2, 4, 3, '2.45'),
(3, 1, 34, '1.90'),
(4, 5, 54, '5.00'),
(5, 7, 23, '7.89'),
(6, 6, 12, '5.99'),
(7, 2, 11, '1.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(2) NOT NULL,
  `denominacion` varchar(30) NOT NULL,
  `precioUnidad` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `denominacion`, `precioUnidad`, `stock`) VALUES
(1, 'Patatas', 1, 29),
(2, 'Pizza', 2, 9),
(3, 'Lechuga', 0, 8),
(4, 'Pimiento', 1, 4),
(5, 'Fresas', 2, 40),
(6, 'Napolitana', 1, 60),
(7, 'Chocolate', 2, 45),
(8, 'Manzana', 1, 50),
(9, 'Pera', 1, 29),
(10, 'Platano', 1, 69),
(11, 'Berenjena', 2, 29),
(12, 'Zapote negro', 3, 55),
(13, 'Sapo', 3, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id` int(3) NOT NULL,
  `denominacion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id`, `denominacion`) VALUES
(1, 'Cajero'),
(2, 'Reponedor'),
(3, 'Encargado'),
(4, 'Mozo almacén'),
(5, 'Dueño'),
(6, 'Auditor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(3) NOT NULL,
  `apertura` datetime NOT NULL,
  `cierre` datetime DEFAULT NULL,
  `empleadoId` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `apertura`, `cierre`, `empleadoId`) VALUES
(1, '2021-04-15 16:00:00', '2021-04-15 20:30:00', 4),
(2, '2021-04-15 16:01:55', '2021-04-15 20:30:00', 2),
(3, '2021-04-15 16:01:56', '2021-04-15 20:30:00', 2),
(4, '2021-04-15 16:03:01', '2021-04-15 20:30:00', 5),
(5, '2021-04-15 15:00:00', '2021-04-15 20:30:00', 7),
(6, '2021-04-15 17:00:00', '2021-04-15 20:30:00', 8),
(7, '2021-04-15 18:00:00', '2021-04-15 20:30:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD KEY `ticketId` (`ticketId`),
  ADD KEY `productoId` (`productoId`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `ticketId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `linea`
--
ALTER TABLE `linea`
  ADD CONSTRAINT `linea_ibfk_1` FOREIGN KEY (`ticketId`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `linea_ibfk_2` FOREIGN KEY (`productoId`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
