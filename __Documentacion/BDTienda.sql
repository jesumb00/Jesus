-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2022 a las 10:00:15
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
                           `id` int(3) NOT NULL,
                           `productoId` int(3) NOT NULL,
                           `precio` int(3) NOT NULL,
                           `cantidad` int(3) NOT NULL,
                           `fecha` datetime NOT NULL,
                           `usuarioId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
                                                                               (1, 4, 3, '2.45'),
                                                                               (1, 1, 34, '1.90'),
                                                                               (2, 5, 54, '5.00'),
                                                                               (2, 7, 23, '7.89'),
                                                                               (2, 6, 12, '5.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
                            `id` int(2) NOT NULL,
                            `denominacion` varchar(30) NOT NULL,
                            `tipo` varchar(30) NOT NULL,
                            `precioUnidad` int(3) NOT NULL,
                            `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `denominacion`, `tipo`, `precioUnidad`, `stock`) VALUES
                                                                                   (1, 'Patatas', 'Otros', 1, 29),
                                                                                   (2, 'Pizza', 'Pastas', 2, 9),
                                                                                   (3, 'Lechuga', 'Verduras', 0, 8),
                                                                                   (4, 'Pimiento', 'Verduras', 1, 4),
                                                                                   (5, 'Fresas', 'Frutas', 2, 40),
                                                                                   (6, 'Napolitana', 'Galletas', 1, 60),
                                                                                   (7, 'Chocolate', 'Postres', 2, 45),
                                                                                   (8, 'Manzana', 'Frutas', 1, 50),
                                                                                   (9, 'Pera', 'Frutas', 1, 29),
                                                                                   (10, 'milka', 'Postres', 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
                          `id` int(3) NOT NULL,
                          `denominacion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`