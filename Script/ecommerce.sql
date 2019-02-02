-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2019 a las 20:31:22
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `nombre_articulo` varchar(170) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(7,2) DEFAULT NULL,
  `iva` decimal(2,2) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0',
  `carrousel` tinyint(1) NOT NULL DEFAULT '0',
  `usr_modif` varchar(50) DEFAULT NULL,
  `fecha_modif` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `baja`, `carrousel`, `usr_modif`, `fecha_modif`) VALUES
(1, 1, NULL, 1, 'Rueda', 'Grande', '45.00', '0.21', 0, 1, 'adm4', '2019-01-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `baja`) VALUES
(1, 'montaÃ±a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadopedido`
--

INSERT INTO `estadopedido` (`id_estado`, `estado`, `baja`) VALUES
(1, 'Inicial', 0),
(2, 'Preparación', 0),
(3, 'Enviado', 0),
(4, 'Entregado', 0),
(5, 'Cancelado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `comentario` varchar(170) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id_log`, `comentario`, `fecha`) VALUES
(1, '1,2,3', '2019-01-03 11:11:58'),
(2, '1,2,3', '2019-01-03 11:12:56'),
(3, '1,2,3', '2019-01-03 14:48:47'),
(4, '1,2,3', '2019-01-03 14:48:54'),
(5, '1,2,3', '2019-01-03 17:35:05'),
(6, 'antes de recuperar usr session', '2019-01-08 20:13:40'),
(7, 'valor de usuario admjavieras', '2019-01-08 20:13:40'),
(8, 'id pedido guardado', '2019-01-08 20:13:40'),
(9, 'Antes del foreach', '2019-01-08 20:13:40'),
(10, 'Dentro del foreach', '2019-01-08 20:13:40'),
(11, 'id pedido parametro', '2019-01-08 20:13:40'),
(12, 'INSERT INTO pedidoDetalle ( id_pedido ,id_articulo, precio,iva,cantidad, baja) VALUES ( ,1,45.00,0.21,1 ,0 );', '2019-01-08 20:13:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`, `baja`) VALUES
(1, 'BH', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `FechaPedido` date NOT NULL,
  `id_tienda` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `FechaPedido`, `id_tienda`, `id_usuario`, `id_estado`, `baja`) VALUES
(1, '2019-01-08', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodetalle`
--

CREATE TABLE `pedidodetalle` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_articulo` int(11) DEFAULT NULL,
  `precio` decimal(7,2) DEFAULT NULL,
  `iva` decimal(2,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `baja`) VALUES
(1, 'usuario', 0),
(2, 'adm', 0),
(3, 'empleado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id_subcategoria` int(11) NOT NULL,
  `nombre_subcategoria` varchar(50) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id_tienda` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `cif` varchar(15) DEFAULT NULL,
  `telf` varchar(15) DEFAULT NULL,
  `pais` varchar(15) DEFAULT NULL,
  `provincia` varchar(15) DEFAULT NULL,
  `ciudad` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id_tienda`, `nombre`, `direccion`, `cif`, `telf`, `pais`, `provincia`, `ciudad`, `email`, `baja`) VALUES
(1, 'Bros, SL', 'Poeta Miguel Hernandez 115', 'B-53522146', '965465450', 'España', 'Alicante', 'Elche', 'pedidos@bros.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nick` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` char(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rellenado` tinyint(1) NOT NULL DEFAULT '0',
  `baja` tinyint(1) NOT NULL DEFAULT '0',
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nick`, `password`, `nombre`, `apellidos`, `email`, `direccion`, `provincia`, `poblacion`, `telefono`, `rellenado`, `baja`, `id_rol`) VALUES
(1, 'adm4', 'jujo34', 'Juan Carlos', 'Ros Muñoz', 'jcros84@gmail.com', 'Mi casa', NULL, NULL, NULL, 0, 0, 3),
(2, 'adm25', 'jujo34', 'Juan Carlos', 'Ros Muñoz', 'jcros84@gmail.com', 'Mi casa', NULL, NULL, NULL, 0, 0, 2),
(3, 'javi1', 'javi1', 'profesor', 'prof', '', 'Mi casa', NULL, NULL, NULL, 0, 0, 1),
(4, 'javi2', 'javi2', 'profesor', 'prof', '', 'Mi casa', NULL, NULL, NULL, 0, 0, 2),
(5, 'javieras', 'jame47l', 'Javier', 'Aznar', 'javieras79@gmail.com', 'Doctor gregorio maraÃ±on 25', 'Alicante', 'Elche', '680415480', 1, 0, 1),
(6, 'javierass', 'jame47l', 'Javier', 'aznar', 'garinol@msn.com', 'doctor gregorio maraÃ±on', 'Alicante', 'Elche', '234234', 1, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `pedidodetalle`
--
ALTER TABLE `pedidodetalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidodetalle`
--
ALTER TABLE `pedidodetalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
