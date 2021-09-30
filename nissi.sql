-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 11:41:14
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nissi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_producto`
--

CREATE TABLE `asignacion_producto` (
  `CODIGO_ASIGNACION` int(11) NOT NULL,
  `CODIGO_PRODUCTO` int(11) NOT NULL,
  `CODIGO_PRESENTACION` int(11) NOT NULL,
  `CODIGO_TIPO` int(11) NOT NULL,
  `CODIGO_CLASIFICACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `CODIGO_CLASIFICACION` int(11) NOT NULL,
  `CLASIFICACION` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`CODIGO_CLASIFICACION`, `CLASIFICACION`) VALUES
(1, 'apastillas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CODIGO_CLIENTE` int(11) NOT NULL,
  `NIT` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE_CLIENTE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CODIGO_CLIENTE`, `NIT`, `NOMBRE_CLIENTE`, `DIRECCION`) VALUES
(1, '62463482', 'Santiago', '7 AV 27-22 Z-8'),
(2, '98324321', 'Maria', '7 Av 34 - 12 Zona 8'),
(3, '23949823', 'Juan', 'Calzada Roosevelt Kilómetro 14'),
(4, '79024132', 'Andrea', '19 Avenida 8 - 10 Zona 11'),
(5, '84939201', 'Rodrigo', 'Boulevar Proceres 18-41 Zona 10'),
(6, '34534584', 'Vera', '1 Cl 18-92 Z 1'),
(7, '56298329', 'Carlos', '7av. 8-51, zona 1'),
(8, '82467213', 'Pamela', '12 avenida 12-54 zona 1'),
(9, '49237682', 'Joel', '5ta. Av. Zona 12'),
(10, '78623671', 'Elena', '19-30 Zona 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_cliente`
--

CREATE TABLE `contacto_cliente` (
  `CODIGO_CONTACTO_C` int(11) NOT NULL,
  `CODIGO_CLIENTE` int(11) NOT NULL,
  `TELEFONO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto_cliente`
--

INSERT INTO `contacto_cliente` (`CODIGO_CONTACTO_C`, `CODIGO_CLIENTE`, `TELEFONO`) VALUES
(1, 1, 55556932),
(2, 2, 52018384),
(3, 3, 36619404),
(4, 4, 36967455),
(5, 5, 54658342),
(6, 6, 59828606),
(7, 7, 54621931),
(8, 8, 41638954),
(9, 9, 55335402),
(10, 10, 42615606);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_proveedor`
--

CREATE TABLE `contacto_proveedor` (
  `CODIGO_CONTACTO_P` int(11) NOT NULL,
  `CODIGO_PROVEEDOR` int(11) NOT NULL,
  `TELEFONO` int(10) NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto_proveedor`
--

INSERT INTO `contacto_proveedor` (`CODIGO_CONTACTO_P`, `CODIGO_PROVEEDOR`, `TELEFONO`, `CORREO`) VALUES
(1, 1, 53556932, 'batres@gmail.com'),
(2, 2, 82218384, 'Suiva@yahoo.es'),
(3, 3, 99319404, 'drogueriamerced@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `CODIGO_OFERTA` int(11) NOT NULL,
  `CODIGO_ASIGNACION` int(11) NOT NULL,
  `DESCUENTO` double(10,2) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `NO_ORDEN` int(11) NOT NULL,
  `CODIGO_PROVEEDOR` int(11) NOT NULL,
  `FECHA_PEDIDO` date NOT NULL,
  `FECHA_ESTIMADA` date NOT NULL,
  `CANTIDAD` int(10) NOT NULL,
  `PRECIO` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `CODIGO_PP` int(11) NOT NULL,
  `NO_ORDEN` int(11) NOT NULL,
  `CODIGO_ASIGNACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `CODIGO_PERMISO` int(11) NOT NULL,
  `PERMISO` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `CODIGO_PRESENTACION` int(11) NOT NULL,
  `PRESENTACION` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`CODIGO_PRESENTACION`, `PRESENTACION`) VALUES
(2, 'pastilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `CODIGO_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_GENERICO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE_COMERCIAL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `STOCK_MIN` int(10) NOT NULL,
  `STOCK_MAX` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `CODIGO_PROVEEDOR` int(11) NOT NULL,
  `NIT` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`CODIGO_PROVEEDOR`, `NIT`, `NOMBRE_PROVEEDOR`, `DIRECCION`, `CORREO`, `TELEFONO`) VALUES
(1, '43463482', 'Batres', '5ta. Av. Zona 12', 'osa@miumg.com', '(502) 5465-4654'),
(2, '75324321', 'Suiva', '19-30 Zona 10', '', '0'),
(3, '98949823', 'Drogrería Merced', '14, 6 - 38 Zona 2', '', '0'),
(4, '21024132', 'Farmacia de la Comunidad', '12 avenida 12-54 zona 1', '', '0'),
(5, '34939201', 'Farmacia Galeno', '1 Cl 18-92 Z 1', '', '0'),
(12, '10', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ottonielajanel@gamil.com', '2147483647'),
(13, '10', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ottonielajanel@gamil.com', '2147483647'),
(14, '10', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ottonielajanel@gamil.com', '2147483647'),
(15, '10', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ottonielajanel@gamil.com', '2147483647'),
(19, '4', 'wer', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ottonielajanel@gamil.com', '0'),
(20, '4', 'oyyo Akaamsl', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ottonielajanel@gamil.com', '49720012'),
(21, '35458778', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'oajanelm@miumg.edu.gt', '0'),
(22, '35458778', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'oajanelm@miumg.edu.gt', '0'),
(23, '35458778', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'oajanelm@miumg.edu.gt', '0'),
(24, '46787987987', 'Juan Villegas', 'sector Molino Z 1', 'jua@gmail.com', '0'),
(25, '46787987987', 'Juan Villegas', 'sector Molino Z 1', 'jua@gmail.com', '0'),
(26, '46787987987', 'Juan Villegas', 'sector Molino Z 1', 'jua@gmail.com', '0'),
(27, '4654654', 'Ajanel', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ajanal@gmail.com', '0'),
(28, '4654654', 'Ajanel', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ajanal@gmail.com', '0'),
(29, '4654654', 'Ajanel', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ajanal@gmail.com', '0'),
(30, '1234564546', 'oscar', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', '45ajana@gmail.com', '0'),
(31, '1234564546', 'oscar', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', '45ajana@gmail.com', '0'),
(32, '1234564546', 'oscar', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', '45ajana@gmail.com', '0'),
(33, '1234564546', 'oscar', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', '45ajana@gmail.com', '(502) 7894-5612'),
(34, '165465423121', 'otto', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ajaanl@gmail', '(502) 1456-5445'),
(35, '165465423121', 'otto', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ajaanl@gmail', '(502) 1456-5445'),
(36, '454654', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'oahjao@mig.gt', '(502) 6549-8732'),
(37, '454654', 'Otto René', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'oahjao@mig.gt', '(502) 6549-8732'),
(38, '4654654', 'tuti', '1c 14-1- zona 1, chicua 1, chichicastenango, Quiche', 'ajanal@iumg', '(502) 4654-6546');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `CODIGO_ROL` int(11) NOT NULL,
  `ROL` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`CODIGO_ROL`, `ROL`) VALUES
(1, 'Especial'),
(2, 'Administrador'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `CODIGO_RP` int(11) NOT NULL,
  `CODIGO_ROL` int(11) NOT NULL,
  `CODIGO_PERMISO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `CODIGO_TIPO` int(11) NOT NULL,
  `TIPO_PRODUCTO` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_ROL` int(11) NOT NULL,
  `NOMBRE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CONTRASEÑA` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `URL` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CODIGO_USUARIO`, `CODIGO_ROL`, `NOMBRE`, `USUARIO`, `CONTRASEÑA`, `URL`, `ESTADO`) VALUES
(2, 2, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', '', 1),
(6, 2, 'otto', 'otto', '$2a$07$asxx54ahjppf45sd87a5aukged6bq6SOMVtuR6oiIdyQPrK0NzEUy', 'vistas/img/usuarios/otto/929.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `CODIGO_VENTA` int(11) NOT NULL,
  `CODIGO_CLIENTE` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `NO_FACTURA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_producto`
--
ALTER TABLE `asignacion_producto`
  ADD PRIMARY KEY (`CODIGO_ASIGNACION`),
  ADD KEY `CODIGO_PRODUCTO` (`CODIGO_PRODUCTO`),
  ADD KEY `CODIGO_PRESENTACION` (`CODIGO_PRESENTACION`),
  ADD KEY `CODIGO_TIPO` (`CODIGO_TIPO`),
  ADD KEY `CODIGO_CLASIFICACION` (`CODIGO_CLASIFICACION`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`CODIGO_CLASIFICACION`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CODIGO_CLIENTE`);

--
-- Indices de la tabla `contacto_cliente`
--
ALTER TABLE `contacto_cliente`
  ADD PRIMARY KEY (`CODIGO_CONTACTO_C`),
  ADD KEY `CODIGO_CLIENTE` (`CODIGO_CLIENTE`);

--
-- Indices de la tabla `contacto_proveedor`
--
ALTER TABLE `contacto_proveedor`
  ADD PRIMARY KEY (`CODIGO_CONTACTO_P`),
  ADD KEY `CODIGO_PROVEEDOR` (`CODIGO_PROVEEDOR`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`CODIGO_OFERTA`),
  ADD KEY `CODIGO_ASIGNACION` (`CODIGO_ASIGNACION`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`NO_ORDEN`),
  ADD KEY `CODIGO_PROVEEDOR` (`CODIGO_PROVEEDOR`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`CODIGO_PP`),
  ADD KEY `NO_ORDEN` (`NO_ORDEN`),
  ADD KEY `CODIGO_ASIGNACION` (`CODIGO_ASIGNACION`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`CODIGO_PERMISO`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`CODIGO_PRESENTACION`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`CODIGO_PRODUCTO`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`CODIGO_PROVEEDOR`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`CODIGO_ROL`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`CODIGO_RP`),
  ADD KEY `CODIGO_ROL` (`CODIGO_ROL`),
  ADD KEY `CODIGO_PERMISO` (`CODIGO_PERMISO`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`CODIGO_TIPO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CODIGO_USUARIO`),
  ADD KEY `CODIGO_ROL` (`CODIGO_ROL`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`CODIGO_VENTA`),
  ADD KEY `CODIGO_CLIENTE` (`CODIGO_CLIENTE`),
  ADD KEY `CODIGO_USUARIO` (`CODIGO_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_producto`
--
ALTER TABLE `asignacion_producto`
  MODIFY `CODIGO_ASIGNACION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `CODIGO_CLASIFICACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CODIGO_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto_cliente`
--
ALTER TABLE `contacto_cliente`
  MODIFY `CODIGO_CONTACTO_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto_proveedor`
--
ALTER TABLE `contacto_proveedor`
  MODIFY `CODIGO_CONTACTO_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `CODIGO_OFERTA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `NO_ORDEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `CODIGO_PP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `CODIGO_PERMISO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `CODIGO_PRESENTACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `CODIGO_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `CODIGO_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `CODIGO_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `CODIGO_RP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `CODIGO_TIPO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `CODIGO_VENTA` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_producto`
--
ALTER TABLE `asignacion_producto`
  ADD CONSTRAINT `asignacion_producto_ibfk_1` FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `producto` (`CODIGO_PRODUCTO`),
  ADD CONSTRAINT `asignacion_producto_ibfk_2` FOREIGN KEY (`CODIGO_PRESENTACION`) REFERENCES `presentacion` (`CODIGO_PRESENTACION`),
  ADD CONSTRAINT `asignacion_producto_ibfk_3` FOREIGN KEY (`CODIGO_TIPO`) REFERENCES `tipo_producto` (`CODIGO_TIPO`),
  ADD CONSTRAINT `asignacion_producto_ibfk_4` FOREIGN KEY (`CODIGO_CLASIFICACION`) REFERENCES `clasificacion` (`CODIGO_CLASIFICACION`);

--
-- Filtros para la tabla `contacto_cliente`
--
ALTER TABLE `contacto_cliente`
  ADD CONSTRAINT `contacto_cliente_ibfk_1` FOREIGN KEY (`CODIGO_CLIENTE`) REFERENCES `cliente` (`CODIGO_CLIENTE`);

--
-- Filtros para la tabla `contacto_proveedor`
--
ALTER TABLE `contacto_proveedor`
  ADD CONSTRAINT `contacto_proveedor_ibfk_1` FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `proveedor` (`CODIGO_PROVEEDOR`);

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`CODIGO_ASIGNACION`) REFERENCES `asignacion_producto` (`CODIGO_ASIGNACION`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `proveedor` (`CODIGO_PROVEEDOR`);

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `pedido_producto_ibfk_1` FOREIGN KEY (`NO_ORDEN`) REFERENCES `pedido` (`NO_ORDEN`),
  ADD CONSTRAINT `pedido_producto_ibfk_2` FOREIGN KEY (`CODIGO_ASIGNACION`) REFERENCES `asignacion_producto` (`CODIGO_ASIGNACION`);

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`CODIGO_ROL`) REFERENCES `rol` (`CODIGO_ROL`),
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`CODIGO_PERMISO`) REFERENCES `permiso` (`CODIGO_PERMISO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`CODIGO_ROL`) REFERENCES `rol` (`CODIGO_ROL`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`CODIGO_CLIENTE`) REFERENCES `cliente` (`CODIGO_CLIENTE`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `usuario` (`CODIGO_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
