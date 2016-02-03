-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2015 a las 14:41:03
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--
CREATE DATABASE IF NOT EXISTS `gestion` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `pass`, `id_usuario`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL,
  `referencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `proveedor` int(11) NOT NULL,
  `fecha_recepcion` datetime NOT NULL,
  `totalpedido` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `referencia`, `fecha`, `proveedor`, `fecha_recepcion`, `totalpedido`) VALUES
(1, 'pp', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, '33', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, '22', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'P1', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'p2', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'ddd', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, '1111', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, '1214', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, '12341', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'Prueba 1', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, '323', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'ddddd', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'asdasdas', '2015-12-02 00:00:00', 3, '0000-00-00 00:00:00', 220),
(14, 'adasdasd', '2015-12-02 00:00:00', 3, '0000-00-00 00:00:00', 220),
(15, 'Pedido 1', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'Pedido 1', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'Pedido Dani', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'p1', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, '123', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'asda', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'asdasd', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'asdasd', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'aaa', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'adsas', '2015-12-02 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_linea`
--

CREATE TABLE IF NOT EXISTS `pedido_linea` (
  `id` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` datetime NOT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido_linea`
--

INSERT INTO `pedido_linea` (`id`, `idpedido`, `idproducto`, `cantidad`, `fecha`, `precio`) VALUES
(1, 10, 1, 22, '2015-12-02 00:00:00', 220),
(2, 11, 7, 233, '2015-12-02 00:00:00', 7689),
(3, 11, 2, 22, '2015-12-02 00:00:00', 484),
(4, 11, 5, 33, '2015-12-02 00:00:00', 132),
(5, 11, 1, 11, '2015-12-02 00:00:00', 165),
(6, 12, 1, 22, '2015-12-02 00:00:00', 220),
(7, 12, 4, 22, '2015-12-02 00:00:00', 220),
(8, 13, 1, 22, '2015-12-02 00:00:00', 220),
(9, 14, 1, 22, '2015-12-02 00:00:00', 220),
(10, 15, 1, 22, '2015-12-02 00:00:00', 220),
(11, 15, 4, 22, '2015-12-02 00:00:00', 220),
(12, 17, 1, 12, '2015-12-02 00:00:00', 120),
(13, 18, 1, 3, '2015-12-02 00:00:00', 0),
(14, 19, 1, 123, '2015-12-02 00:00:00', 0),
(15, 20, 1, 12, '2015-12-02 00:00:00', 120),
(16, 21, 1, 22, '2015-12-02 00:00:00', 220),
(17, 22, 1, 123, '2015-12-02 00:00:00', 1230),
(18, 23, 1, 11, '2015-12-02 00:00:00', 110),
(19, 23, 7, 233, '2015-12-02 00:00:00', 23300),
(20, 24, 1, 22, '2015-12-02 00:00:00', 220),
(21, 24, 7, 22, '2015-12-02 00:00:00', 2200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `stock` float NOT NULL,
  `activo` bit(1) DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`, `activo`) VALUES
(1, 'Patatas', 10, 3, b'1'),
(2, 'tomates', 4, 6, b'1'),
(3, 'pimientos', 8, 0, b'1'),
(4, 'chocolate', 2, 200, b'1'),
(5, 'coca cola', 5, 2, b'1'),
(6, 'harina', 2, 200, b'1'),
(7, 'Smartphone Samsung', 200, 250, b'1'),
(8, 'McLaren-Honda MP4/31', 15, 150, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE IF NOT EXISTS `producto_proveedor` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto_proveedor`
--

INSERT INTO `producto_proveedor` (`id`, `id_producto`, `id_proveedor`, `fecha`, `precio`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', 10),
(2, 7, 1, '0000-00-00 00:00:00', 100),
(3, 1, 3, '0000-00-00 00:00:00', 10),
(4, 2, 4, '0000-00-00 00:00:00', 22),
(5, 2, 1, '0000-00-00 00:00:00', 1),
(6, 7, 4, '0000-00-00 00:00:00', 33),
(7, 1, 4, '0000-00-00 00:00:00', 15),
(8, 5, 1, '0000-00-00 00:00:00', 1),
(9, 5, 4, '0000-00-00 00:00:00', 4),
(10, 4, 1, '0000-00-00 00:00:00', 12),
(11, 4, 3, '0000-00-00 00:00:00', 10),
(12, 8, 1, '0000-00-00 00:00:00', 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `direccion`, `email`, `telefono`, `provincia`, `activo`) VALUES
(1, 'pepito', 'su casa', 'notiene@gmail.com', '34992343127047', 'bizkaia', b'1'),
(2, 'Jorge el botellero', 'su casa', 'notiene@gmail.com', '34992343127047', 'bizkaia', b'0'),
(3, 'Raul', 'su casa', 'notiene@hotmail.com', '34992343127047', 'Bizkaia', b'1'),
(4, 'Mr. Proveedor', 'su casa', 'notiene@gmail.com', '34992343127047', 'bizkaia', b'1'),
(5, 'Caca', 'GB', 'mclaren@mclaren.com', '333333333333', 'Gran Bretaña', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `apellidos` varchar(100) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `email_pass` varchar(255) DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `email_pass`) VALUES
(1, 'Administrador', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido_linea`
--
ALTER TABLE `pedido_linea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idpedido` (`idpedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `pedido_linea`
--
ALTER TABLE `pedido_linea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `pedido_linea`
--
ALTER TABLE `pedido_linea`
  ADD CONSTRAINT `pedido_linea_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `pedido_linea_ibfk_2` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`id`);

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `producto_proveedor_ibfk_3` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
