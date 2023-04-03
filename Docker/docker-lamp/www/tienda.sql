-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2023 a las 19:52:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni` varchar(10) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `nacim` date DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `usuario`, `nombre`, `apellidos`, `mail`, `nacim`, `pass`) VALUES
('0231489J', 'Toral', 'Sergio', 'Toral Garcia', 'toral@toral.es', '1998-03-16', 'Villabalter1'),
('0421938G', 'juan', 'juan', 'alvarez perez', 'juan@juan.es', '1999-06-05', 'Villabalter1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(3) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` float(10,2) DEFAULT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `id_tipo` varchar(30) DEFAULT NULL,
  `cantidad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `precio`, `imagen`, `id_tipo`, `cantidad`) VALUES
(1, 'Auriculares gaming inalambricos logitech G435', 54.99, 'cascos.png', '1', 80),
(2, 'Ordenador portatil Lenovo V15', 319.74, 'Portatil.png', '2', 30),
(3, 'Smartphone Oppo Find X3 Neo', 620.41, 'oppo.png', '5', 150),
(4, 'PcCom Gold Elite Intel Core i5 11400f', 1034.31, 'torre.png', '3', 5),
(5, 'Apple iPhone 13 256GB', 969.00, 'iphone13.png', '5', 27),
(6, 'Samsung Galaxy M53 8/128GB', 368.99, 'galaxi.png', '5', 300),
(7, 'Acer Aspire 5 A515-57-76BV Intel core i7-1266U', 748.99, 'acer.png', '2', 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'perifericos'),
(2, 'portatiles'),
(3, 'Torres'),
(4, 'Tablets'),
(5, 'Smartphones'),
(6, 'consolas'),
(7, 'smartTV');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
