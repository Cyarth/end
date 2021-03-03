-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2019 a las 08:28:54
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stock`
--
CREATE DATABASE IF NOT EXISTS `stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stock`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `rutContacto` varchar(10) NOT NULL,
  `nombreContacto` varchar(30) NOT NULL,
  `emailContacto` varchar(45) NOT NULL,
  `telefonoContacto` varchar(15) NOT NULL,
  `empresa_codigoEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `codigoEmpresa` int(11) NOT NULL,
  `rutEmpresa` varchar(10) NOT NULL,
  `nombreEmpresa` varchar(30) NOT NULL,
  `passwordEmpresa` varchar(10) NOT NULL,
  `direccionEmpresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `codigoParticular` int(9) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`codigoParticular`, `rut`, `direccion`, `name`, `email`, `username`, `password`) VALUES
(1, '', '', 'mairon', 'maironiv@icloud.com', 'mairon13', '6bf84a3fdafef01b267e21d52873df74'),
(2, '', '', 'Diego', 'diego@duoc.cl', 'diego', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, '', '', 'franko', 'fra.torresl@alumnos.duoc.cl', 'franko', '202cb962ac59075b964b07152d234b70'),
(4, '19999999-5', 'las shiet12', 'mai', 'mai@gmail.com', 'mai', '202cb962ac59075b964b07152d234b70'),
(5, '19888888-5', 'Lad Cobra', 'ff', 'ff@gmail.com', 'ff', '202cb962ac59075b964b07152d234b70'),
(6, '22222', '22222', 'ff', 'ff@gmail.com', 'fra', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `inventario` enum('Panol','Punto Estudiantil') NOT NULL,
  `photo` varchar(200) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `qty`, `inventario`, `photo`, `login_id`) VALUES
(4, 'Pelota de futbol', 80, 'Punto Estudiantil', 'fotos/pelot.jpg', 2),
(5, 'Basket ball', 12, 'Punto Estudiantil', 'fotos/basket.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `nombreAlumno` varchar(200) NOT NULL,
  `rut` int(9) NOT NULL,
  `numeroCel` int(9) NOT NULL,
  `emailAlumno` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaReserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaEntrega` date NOT NULL,
  `loginId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idReserva`, `nombreAlumno`, `rut`, `numeroCel`, `emailAlumno`, `cantidad`, `fechaReserva`, `fechaEntrega`, `loginId`) VALUES
(5, 'Mairon', 198181552, 123, 'mairon13@mairon2.cl', 123, '2019-06-10 10:25:05', '2019-06-27', 1),
(6, '123123', 123123, 123123, '123@123123.123', 123123, '2019-06-10 10:27:00', '2019-06-19', 1),
(9, '123123123', 123123, 12213, '123@123.123', 123123, '2019-06-10 10:33:25', '2019-05-29', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD KEY `empresa_codigoEmpresa` (`empresa_codigoEmpresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`codigoEmpresa`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`codigoParticular`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `loginId` (`loginId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `codigoEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `codigoParticular` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`empresa_codigoEmpresa`) REFERENCES `empresa` (`codigoEmpresa`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`codigoParticular`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`loginId`) REFERENCES `login` (`codigoParticular`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
