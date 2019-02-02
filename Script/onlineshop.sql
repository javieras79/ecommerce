-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2019 a las 20:48:31
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
-- Base de datos: `onlineshop`
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
  `nombre_articulo` varchar(130) NOT NULL,
  `descripcion` varchar(220) NOT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `iva` decimal(8,2) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `tablon` tinyint(1) NOT NULL DEFAULT '0',
  `usr_modif` varchar(45) DEFAULT NULL,
  `fecha_modif` date NOT NULL,
  `imagen` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `id_categoria`, `id_subcategoria`, `id_marca`, `nombre_articulo`, `descripcion`, `precio`, `iva`, `activo`, `tablon`, `usr_modif`, `fecha_modif`, `imagen`) VALUES
(1, 1, 1, 1, 'G36', 'Fusil de Asalto', '125.00', '21.00', 1, 1, '', '0000-00-00', '1.jpg'),
(2, 1, 1, 2, 'M4', 'Fusil de Asalto', '130.00', '21.00', 1, 1, '', '0000-00-00', '2.jpg'),
(3, 1, 1, 3, 'M16 A2', 'Fusil de Asalto', '115.00', '21.00', 1, 1, 'usuario', '0000-00-00', '3.jpg'),
(4, 1, 2, 4, 'Mp5', 'Subfusil de Asalto', '110.00', '21.00', 1, 1, '', '0000-00-00', '4.jpg'),
(5, 1, 3, 5, 'P226', 'Pistola', '90.00', '21.00', 1, 1, '', '0000-00-00', '5.jpg'),
(6, 1, 3, 3, 'Beretta', 'Pistola', '130.00', '21.00', 1, 1, '', '0000-00-00', '6.jpg'),
(7, 1, 2, 3, 'S635', 'Subfusil de Asalto', '120.00', '21.00', 1, 1, '', '0000-00-00', '7.jpg'),
(8, 2, 5, 2, 'Chaqueta', 'Camuflaje Woodlands', '35.00', '21.00', 1, 1, 'javier', '0000-00-00', '8.jpg'),
(9, 3, 4, 4, 'Municion reciclable', '0.20mm recycled', '12.00', '21.00', 1, 1, 'javier', '0000-00-00', '9.jpg'),
(10, 1, 1, 2, 'L CQB MK16 MOD 0', 'Fusil de Asalto', '135.00', '21.00', 1, 1, '', '0000-00-00', '10.jpg'),
(11, 1, 1, 4, 'KeyModx 9.5 LTS', 'Fusil de Asalto', '401.43', '21.00', 1, 1, '', '0000-00-00', '11.jpg'),
(12, 1, 1, 2, 'Sig Sauer 556 Shorty CQB', 'Fusil de Asalto', '416.27', '21.00', 1, 1, '', '0000-00-00', '14.jpg'),
(13, 1, 1, 3, 'Go 999RAS rifle replica GBB', 'Fusil de Asalto', '411.91', '21.00', 1, 1, '', '0000-00-00', '13.jpg'),
(14, 1, 1, 4, 'LCK74MN NV', 'Fusil de Asalto', '401.43', '21.00', 1, 1, '', '0000-00-00', '14.jpg'),
(15, 1, 1, 3, 'Ak 47', 'Fusil de Asalto', '114.84', '21.00', 1, 1, '', '0000-00-00', '15.jpg'),
(16, 1, 1, 1, 'Srt-09', 'Fusil de Asalto', '116.15', '21.00', 1, 1, '', '0000-00-00', '16.jpg'),
(31, 1, 3, 2, 'Windgun AG-HX2002', 'Pistola de asalto', '220.00', '21.00', 1, 1, 'javier', '0000-00-00', 'awo-40-020.jpg'),
(32, 6, 5, 2, 'Cinturón evilla', 'Cinturón de uniforme', '18.00', '21.00', 1, 1, 'javieras', '0000-00-00', 'sin_resultados.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `activo`) VALUES
(1, 'Réplicas', 1),
(2, 'Accesorios', 1),
(3, 'Consumibles', 1),
(4, 'Servicio Técnico', 1),
(5, 'Equipamiento', 1),
(6, 'Militaria', 1),
(7, 'Armería', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_articulo` int(11) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `iva` decimal(8,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id_detalle`, `id_pedido`, `id_articulo`, `precio`, `iva`, `cantidad`, `activo`) VALUES
(1, 1, 16, '116.00', '21.00', 3, 1),
(2, 1, 1, '125.00', '21.00', 1, 1),
(3, 2, 31, '220.00', '21.00', 2, 1),
(4, 2, 1, '125.00', '21.00', 2, 1),
(5, 2, 16, '116.00', '21.00', 1, 1),
(6, 2, 2, '130.00', '21.00', 3, 1),
(7, 3, 7, '120.00', '21.00', 2, 1),
(8, 3, 6, '130.00', '21.00', 1, 1),
(9, 4, 16, '116.00', '21.00', 2, 1),
(10, 5, 31, '220.00', '21.00', 1, 1),
(11, 6, 16, '116.00', '21.00', 2, 1),
(12, 7, 1, '125.00', '21.00', 3, 1),
(13, 7, 16, '116.00', '21.00', 1, 1),
(14, 8, 1, '125.00', '21.00', 2, 1),
(15, 8, 16, '116.00', '21.00', 3, 1),
(16, 8, 2, '130.00', '21.00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadopedido`
--

INSERT INTO `estadopedido` (`id_estado`, `estado`, `activo`) VALUES
(1, 'Abierto', 1),
(2, 'cerrado', 0),
(3, 'En curso', 2),
(4, 'Tramitado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`, `activo`) VALUES
(1, 'Ging-Gong', 1),
(2, 'D-Boys', 1),
(3, 'Marui', 1),
(4, 'Star', 1),
(5, 'Cyma', 1);

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
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `FechaPedido`, `id_tienda`, `id_usuario`, `id_estado`, `activo`) VALUES
(1, '2019-01-20', 1, 1, 2, 0),
(2, '2019-01-21', 1, 1, 4, 0),
(3, '2019-01-28', 1, 2, 3, 0),
(4, '2019-01-29', 1, 1, 2, 0),
(5, '2019-01-29', 1, 2, 2, 0),
(6, '2019-01-29', 1, 1, 1, 0),
(7, '2019-01-29', 1, 14, 1, 0),
(8, '2019-01-29', 1, 13, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `activo`) VALUES
(1, 'usuario', 0),
(2, 'adm', 0),
(3, 'empleado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id_subcategoria` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_subcategoria` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id_subcategoria`, `id_categoria`, `nombre_subcategoria`, `activo`) VALUES
(1, 1, 'Fusiles', 1),
(2, 1, 'Subfusiles', 1),
(3, 1, 'Pistolas', 1),
(4, 3, 'Bolas', 1),
(5, 2, 'Ropa', 1),
(6, 4, 'Despiece', 1),
(7, 1, 'Revólveres', 1);

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
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nick` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` char(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nick`, `password`, `nombre`, `apellidos`, `email`, `direccion`, `provincia`, `poblacion`, `telefono`, `activo`, `id_rol`) VALUES
(1, 'javieras', 'jame47l', 'Javier', 'Aznar Serna', 'javieras79@gmail.com', 'Doctor Gregorio Marañon 25', 'Alicante', 'Elche', '680415480', 1, 1),
(2, 'admjavieras', '$2y$10$.yQHVlykhxA0fn9F68X4pOsYMCh4QAchi8vDwJfSN6oOLGcw4i1oe', 'Javier', 'Aznar', 'javieras79@gmail.com', 'Doctor Gregorio Marañon 25', 'Alicante', 'Elche', '680415480', 1, 2),
(13, 'inesas', '$2y$10$AaCXuc5Qpq/WAo/Ri5THCuCYznP/pHDO87XRhqdNrsxdIMBTjD4oq', 'ines', 'Aznar Serna', 'garinol@msn.com', 'doctor gregorio marañon', 'Alicante', 'Elche', '234234', 0, 1),
(14, 'admjavierll', '$2y$10$.yQHVlykhxA0fn9F68X4pOsYMCh4QAchi8vDwJfSN6oOLGcw4i1oe', 'Javier', 'Llorens Llorens', 'javierll@gmail.com', 'Jose Javaloyets Orts', 'Alicante', 'Elche', '2215465', 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `fk_id_categoria` (`id_categoria`),
  ADD KEY `fk_id_subcategoria` (`id_subcategoria`),
  ADD KEY `fk_id_marca` (`id_marca`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_idpedido` (`id_pedido`),
  ADD KEY `fk_idarticulo` (`id_articulo`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_idusuario` (`id_usuario`),
  ADD KEY `fk_idestado` (`id_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id_subcategoria`),
  ADD KEY `fk_idcategoria` (`id_categoria`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `fk_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `fk_id_subcategoria` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id_subcategoria`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_idarticulo` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `fk_idpedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_idestado` FOREIGN KEY (`id_estado`) REFERENCES `estadopedido` (`id_estado`),
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `fk_idcategoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
