-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2021 a las 05:58:00
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
-- Base de datos: `nissi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `CODIGO_CLASIFICACION` int(11) NOT NULL COMMENT 'Clave primaria de la clasificación del producto, identificador único',
  `CLASIFICACION` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la clasificación del producto, ejemplo: Analgésico',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado de la clasificación del producto, activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`CODIGO_CLASIFICACION`, `CLASIFICACION`, `VISIBLE`) VALUES
(1, 'ANTIINFLAMATORIOS', 1),
(2, 'ANTICONCEPTIVOS', 1),
(3, 'ANTIINFECCIOSOS', 1),
(4, 'MUCULITICOS', 1),
(5, 'ANTIDIAREICOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CODIGO_CLIENTE` int(11) NOT NULL COMMENT 'Clave primari del cliente, identificador único',
  `NIT` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nit del cliente',
  `NOMBRE_CLIENTE` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del cliente',
  `DIRECCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección para la factura del cliente',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado del cliente, activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CODIGO_CLIENTE`, `NIT`, `NOMBRE_CLIENTE`, `DIRECCION`, `VISIBLE`) VALUES
(1, '62463482', 'Santiago', '7 AV 27-22 Z-8', 1),
(2, '98324321', 'Maria', '7 Av 34 - 12 Zona 8', 1),
(3, '23949823', 'Juan', 'Calzada Roosevelt Kilómetro 14', 1),
(4, '79024132', 'Andrea', '19 Avenida 8 - 10 Zona 11', 1),
(5, '84939201', 'Rodrigo', 'Boulevar Proceres 18-41 Zona 10', 1),
(6, '12475825', 'Mogollón', 'ciudad', 0),
(7, '12475825', 'Mogollón', 'ciudad', 1),
(11111111, 'C/F', 'Default', 'Default', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_cliente`
--

CREATE TABLE `contacto_cliente` (
  `CODIGO_CONTACTO_C` int(11) NOT NULL COMMENT 'Clave primaria del contacto del cliente, identificador único',
  `CODIGO_CLIENTE` int(11) NOT NULL COMMENT 'Clave secundaria de la tabla cliente, para identificar al cliente',
  `TELEFONO` int(10) NOT NULL COMMENT 'Número de teléfono del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto_cliente`
--

INSERT INTO `contacto_cliente` (`CODIGO_CONTACTO_C`, `CODIGO_CLIENTE`, `TELEFONO`) VALUES
(1, 1, 55556932),
(2, 2, 52018384),
(3, 3, 36619404),
(4, 4, 36967455),
(5, 5, 54658342);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_proveedor`
--

CREATE TABLE `contacto_proveedor` (
  `CODIGO_CONTACTO_P` int(11) NOT NULL COMMENT 'Clave primaria del contacto del proveedor, identificador único',
  `CODIGO_PROVEEDOR` int(11) NOT NULL COMMENT 'Clave secundaria de la tabla proveedor, para identificar al proveedor',
  `TELEFONO` int(10) NOT NULL COMMENT 'Número de teléfono del proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto_proveedor`
--

INSERT INTO `contacto_proveedor` (`CODIGO_CONTACTO_P`, `CODIGO_PROVEEDOR`, `TELEFONO`) VALUES
(1, 1, 53556932),
(2, 2, 82218384),
(3, 3, 99319404),
(4, 4, 83927455),
(5, 5, 29158342);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `CODIGO_DETALLE` int(11) NOT NULL COMMENT 'Clave primaria para identificar el detalle de inventario, identificador único',
  `CODIGO_VENTA` int(11) NOT NULL COMMENT 'Clave secundaria para identificar la venta que se está realizando',
  `CODIGO_INVENTARIO` int(11) NOT NULL COMMENT 'Clave secundaria para identificar el producto que se encuentra en inventario y póder descontarlo del inventario al hacer la venta',
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`CODIGO_DETALLE`, `CODIGO_VENTA`, `CODIGO_INVENTARIO`, `CANTIDAD`) VALUES
(14, 28, 11, 3),
(15, 28, 12, 1),
(16, 29, 11, 5),
(17, 29, 12, 1),
(18, 30, 12, 1),
(19, 30, 11, 1),
(20, 30, 14, 1),
(21, 31, 16, 1),
(22, 32, 11, 4),
(23, 32, 14, 1),
(24, 32, 15, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `CODIGO_DETALLE_PEDIDO` int(11) NOT NULL COMMENT 'Clave primaria para identificar el pedido y los productos, identificador único',
  `NO_ORDEN` int(11) NOT NULL COMMENT 'Clave secundara para identificar el pedido',
  `CODIGO_PRODUCTO` int(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
  `CANTIDAD` int(10) NOT NULL COMMENT 'Cantidad del producto que se pedirá al proveedor',
  `PRECIO_UNITARIO` double(10,2) NOT NULL COMMENT 'Precio unitario del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`CODIGO_DETALLE_PEDIDO`, `NO_ORDEN`, `CODIGO_PRODUCTO`, `CANTIDAD`, `PRECIO_UNITARIO`) VALUES
(1, 1, 1, 20, 1.50),
(2, 2, 2, 20, 2.00),
(3, 3, 3, 20, 2.50),
(4, 4, 4, 20, 1.50),
(5, 5, 5, 20, 1.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `CODIGO_INVENTARIO` int(11) NOT NULL COMMENT 'Clave primaria para identificar el inventario, identificador único',
  `CODIGO_BARRA` int(11) NOT NULL COMMENT 'Codigo de barra para identificar el producto',
  `FECHA_INGRESO` date NOT NULL COMMENT 'Fecha de ingreso del producto a la farmacia',
  `CADUCIDAD` date NOT NULL COMMENT 'Fecha de vencimiento del producto',
  `PRECIO_COMPRA` float(10,2) NOT NULL COMMENT 'Precio a como se compró el producto',
  `PRECIO_VENTA` float(10,2) NOT NULL COMMENT 'Precio a como se venderá el producto',
  `STOCK` int(11) NOT NULL COMMENT 'Cantidad total de producto disponible',
  `CODIGO_PRODUCTO` int(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
  `CODIGO_PROVEEDOR` int(11) NOT NULL COMMENT 'Clave secundaria para identificar al proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`CODIGO_INVENTARIO`, `CODIGO_BARRA`, `FECHA_INGRESO`, `CADUCIDAD`, `PRECIO_COMPRA`, `PRECIO_VENTA`, `STOCK`, `CODIGO_PRODUCTO`, `CODIGO_PROVEEDOR`) VALUES
(11, 8, '2021-11-10', '2021-11-25', 20.00, 30.00, 12, 8, 2),
(12, 5, '2021-11-10', '2021-11-17', 200.00, 200.00, 197, 5, 4),
(13, 1, '2021-11-11', '2021-11-18', 10.00, 10.00, 10, 1, 1),
(14, 10, '2021-11-10', '2021-11-17', 40.00, 50.00, 38, 10, 5),
(15, 4, '2021-11-10', '2021-11-17', 40.00, 40.00, 38, 4, 3),
(16, 13, '2021-11-10', '2021-11-25', 5.00, 6.00, 49, 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `CODIGO_OFERTA` int(11) NOT NULL COMMENT 'Clave primaria para la oferta, identificador único',
  `CODIGO_PRODUCTO` int(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
  `DESCUENTO` double(10,2) NOT NULL COMMENT 'El porcentaje de descuento que se asignará al producto',
  `FECHA_INICIO` date NOT NULL COMMENT 'Fecha en la que inicia la oferta',
  `FECHA_FIN` date NOT NULL COMMENT 'Fecha en la que finaliza la oferta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`CODIGO_OFERTA`, `CODIGO_PRODUCTO`, `DESCUENTO`, `FECHA_INICIO`, `FECHA_FIN`) VALUES
(1, 10, 5.00, '2021-08-01', '2021-09-01'),
(2, 1, 10.00, '2021-08-01', '2021-09-01'),
(3, 1, 5.00, '2021-08-01', '2021-09-01'),
(4, 1, 10.00, '2021-08-01', '2021-09-01'),
(5, 1, 5.00, '2021-08-01', '2021-09-01'),
(6, 13, 5.00, '2021-11-13', '2021-11-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `NO_ORDEN` int(11) NOT NULL COMMENT 'Clave primaria para distinguir los pedidos, identificador único',
  `CODIGO_PROVEEDOR` int(11) NOT NULL COMMENT 'Clave secundaria para identificar el proveedor a quien se hará el pedido',
  `FECHA_PEDIDO` date NOT NULL COMMENT 'Fecha en la que se está haciendo el pedido',
  `FECHA_ESTIMADA` date NOT NULL COMMENT 'Fecha que se estima que llegará el producto',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado del pedido, activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`NO_ORDEN`, `CODIGO_PROVEEDOR`, `FECHA_PEDIDO`, `FECHA_ESTIMADA`, `VISIBLE`) VALUES
(1, 1, '2021-11-10', '2021-11-17', 1),
(2, 2, '2021-08-02', '2021-09-02', 1),
(3, 3, '2021-08-03', '2021-09-03', 1),
(4, 4, '2021-08-04', '2021-09-04', 1),
(5, 5, '2021-08-05', '2021-09-05', 0),
(6, 2, '2021-11-10', '2021-11-17', 0),
(7, 3, '2021-11-12', '2021-11-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `CODIGO_PRESENTACION` int(11) NOT NULL COMMENT 'Clave primaria de la presentación del producto, identificador único',
  `PRESENTACION` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la presentación del producto, ejemplo: tableta',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado de la presentación del producto, activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`CODIGO_PRESENTACION`, `PRESENTACION`, `VISIBLE`) VALUES
(1, 'ENVASE', 1),
(2, 'CAPSULA', 1),
(3, 'TABLETA', 1),
(4, 'AMPOLLA', 1),
(5, 'CREMA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `CODIGO_PRODUCTO` int(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
  `NOMBRE_GENERICO` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre genérico del producto ingresado',
  `NOMBRE_COMERCIAL` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre comercial del producto ingresado',
  `URL` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `CODIGO_PRESENTACION` int(11) NOT NULL COMMENT 'Clave secundaria para la identificación de la presentación del producto',
  `CODIGO_CLASIFICACION` int(11) NOT NULL COMMENT 'Clave secundaria para la identificación de la clasificación del producto',
  `CODIGO_TIPO` int(11) NOT NULL COMMENT 'Clave secundaria para la identifación del tipo de producto',
  `STOCK_MIN` int(10) NOT NULL COMMENT 'Indicador de la cantidad mínima que debe de haber de producto',
  `STOCK_MAX` int(10) NOT NULL COMMENT 'Indicador de la cantidad máxima que debe de haber de producto',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado del producto, activo = 1, desactivo = 0',
  `CODIGO_BARRAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`CODIGO_PRODUCTO`, `NOMBRE_GENERICO`, `NOMBRE_COMERCIAL`, `URL`, `CODIGO_PRESENTACION`, `CODIGO_CLASIFICACION`, `CODIGO_TIPO`, `STOCK_MIN`, `STOCK_MAX`, `VISIBLE`, `CODIGO_BARRAS`) VALUES
(1, 'FENITOINA', 'DILATIN', '', 1, 1, 1, 5, 100, 1, NULL),
(2, 'AMPILICINA HOLA', 'AMINOXIDEN HOLA', '', 2, 2, 2, 8, 46, 1, NULL),
(3, 'MONONITRATO DE ISOSORBIDE', 'ELATAN', '', 1, 1, 1, 50, 100, 1, NULL),
(4, 'ACEITE DE HIGADO DE BACALAO', 'ALLIXON', '', 1, 1, 1, 5, 75, 1, NULL),
(5, 'ACEITE DE LINAZA', 'COLESTEVAR', '', 1, 1, 1, 5, 100, 1, NULL),
(6, 'ACETANOMINAFEN', 'NORSINA', '', 1, 1, 1, 5, 100, 1, NULL),
(8, 'ACICLOVIR', 'VIRULAX', '', 1, 1, 1, 5, 100, 1, NULL),
(9, 'ACETATO DE FLUOROMETOLONA', 'FLUMETOL', '', 1, 1, 1, 5, 50, 1, NULL),
(10, 'ACIDO ACETICO', 'DUVAGIN', '', 1, 1, 1, 5, 100, 1, NULL),
(11, 'ASPIRINA', 'ASPIRINA', '', 3, 1, 2, 5, 10, 0, NULL),
(12, 'TESTUNO', 'TEST', '', 1, 1, 1, 50, 100, 0, NULL),
(13, 'TEST', 'TEST', '', 4, 5, 2, 5, 10, 1, NULL),
(14, 'TEST TEST', 'TEST TEST', '', 5, 4, 2, 5, 6, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `CODIGO_PROVEEDOR` int(11) NOT NULL COMMENT 'Clave primaria del proveedor, identificador único',
  `NIT` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nit del proveedor',
  `NOMBRE_PROVEEDOR` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del proveedor',
  `DIRECCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección del proveedor',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado del proveedor, activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`CODIGO_PROVEEDOR`, `NIT`, `NOMBRE_PROVEEDOR`, `DIRECCION`, `VISIBLE`) VALUES
(1, '43463482', 'Batres', '5ta. Av. Zona 12', 1),
(2, '75324321', 'Suiva', '19-30 Zona 10', 1),
(3, '98949823', 'Drogrería Merced', '14, 6 - 38 Zona 2', 1),
(4, '21024132', 'Farmacia de la Comunidad', '12 avenida 12-54 zona 1', 1),
(5, '34939201', 'Farmacia Galeno', '1 Cl 18-92 Z 1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `CODIGO_ROL` int(11) NOT NULL COMMENT 'Clave primaria para los roles que existiran en el sistema, identificador único',
  `ROL` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Rol que existirá en el sistema ejemplo: administrador, vendedor, entre otros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`CODIGO_ROL`, `ROL`) VALUES
(1, 'ESPECIAL'),
(2, 'ADMINISTRADOR'),
(3, 'VENDEDOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `CODIGO_TIPO` int(11) NOT NULL COMMENT 'Clave primaria del tipo de producto, identificador único',
  `TIPO_PRODUCTO` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de producto, puede ser producto de marca o producto genérico',
  `VISIBLE` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado del tipo de producto, activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`CODIGO_TIPO`, `TIPO_PRODUCTO`, `VISIBLE`) VALUES
(1, 'GENERICAS', 1),
(2, 'MARCA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CODIGO_USUARIO` int(11) NOT NULL COMMENT 'Clave primaria para el usuario, identificador único',
  `CODIGO_ROL` int(11) NOT NULL COMMENT 'Clave secundaria para identificar el rol',
  `NOMBRE` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la persona que trabajará en la farmacia',
  `USUARIO` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de usuario que identifique a la persona para iniciar sesión en el sistema',
  `CONTRASEÑA` varchar(75) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contraseña para iniciar sesión en el sistema',
  `URL` varchar(70) COLLATE utf8_spanish_ci NOT NULL COMMENT 'dirección para la imagen que identifique al usuario',
  `ESTADO` int(2) NOT NULL COMMENT 'Estado del usuario, Activo = 1, desactivo = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CODIGO_USUARIO`, `CODIGO_ROL`, `NOMBRE`, `USUARIO`, `CONTRASEÑA`, `URL`, `ESTADO`) VALUES
(1, 2, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', '', 1),
(2, 1, 'otto', 'otto', '$2a$07$asxx54ahjppf45sd87a5aukged6bq6SOMVtuR6oiIdyQPrK0NzEUy', 'vistas/img/usuarios/otto/929.png', 1),
(3, 2, 'saenz', 'saenz', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'vistas/img/usuarios/saenz/602.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `CODIGO_VENTA` int(11) NOT NULL COMMENT 'Clave primaria para identificar las ventas realizadas, identificador único',
  `CODIGO_CLIENTE` int(11) NOT NULL COMMENT 'Clave secundaria para identificar al cliente al cual le corresponde la venta',
  `CODIGO_USUARIO` int(11) NOT NULL COMMENT 'Clave secundaria para identificar que usuario realizó la venta',
  `NO_FACTURA` int(11) NOT NULL COMMENT 'Número de factura para identificar la venta.',
  `FECHA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Lleva el control de la fecha de venta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`CODIGO_VENTA`, `CODIGO_CLIENTE`, `CODIGO_USUARIO`, `NO_FACTURA`, `FECHA`) VALUES
(1, 1, 1, 1, '2021-10-15 10:33:53'),
(2, 2, 2, 2, '2021-10-20 11:34:22'),
(3, 3, 1, 3, '2021-10-20 11:37:03'),
(4, 4, 2, 4, '2021-10-20 11:38:26'),
(5, 5, 1, 5, '2021-10-20 11:38:30'),
(6, 1, 2, 6, '2021-10-22 11:28:19'),
(7, 2, 1, 7, '2021-10-23 02:28:38'),
(8, 3, 2, 8, '2021-10-23 10:03:06'),
(9, 4, 1, 9, '2021-10-23 10:25:22'),
(11, 6, 3, 10, '2021-11-09 07:18:43'),
(12, 6, 3, 11, '2021-11-09 07:19:46'),
(14, 6, 3, 12, '2021-11-09 07:21:50'),
(15, 6, 3, 13, '2021-11-09 07:22:34'),
(16, 11111111, 3, 14, '2021-11-09 07:27:19'),
(17, 11111111, 3, 15, '2021-11-09 23:40:06'),
(18, 7, 3, 16, '2021-11-10 19:02:34'),
(19, 6, 3, 17, '2021-11-10 19:06:59'),
(20, 6, 3, 18, '2021-11-10 19:14:58'),
(21, 7, 3, 19, '2021-11-10 19:15:27'),
(22, 7, 3, 20, '2021-11-10 19:21:36'),
(23, 6, 3, 21, '2021-11-10 19:33:47'),
(24, 6, 3, 22, '2021-11-10 19:34:39'),
(25, 3, 3, 23, '2021-11-10 19:37:50'),
(26, 4, 3, 24, '2021-11-10 19:44:17'),
(27, 11111111, 3, 25, '2021-11-10 19:45:31'),
(28, 6, 3, 26, '2021-11-11 01:12:36'),
(29, 11111111, 3, 27, '2021-11-11 01:22:42'),
(30, 11111111, 3, 28, '2021-11-11 01:55:02'),
(31, 11111111, 3, 29, '2021-11-11 02:18:16'),
(32, 11111111, 3, 30, '2021-11-11 03:29:40');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`CODIGO_DETALLE`),
  ADD KEY `CODIGO_VENTA` (`CODIGO_VENTA`),
  ADD KEY `CODIGO_INVENTARIO` (`CODIGO_INVENTARIO`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`CODIGO_DETALLE_PEDIDO`),
  ADD KEY `NO_ORDEN` (`NO_ORDEN`),
  ADD KEY `CODIGO_PRODUCTO` (`CODIGO_PRODUCTO`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`CODIGO_INVENTARIO`),
  ADD KEY `CODIGO_PRODUCTO` (`CODIGO_PRODUCTO`),
  ADD KEY `CODIGO_PROVEEDOR` (`CODIGO_PROVEEDOR`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`CODIGO_OFERTA`),
  ADD KEY `CODIGO_PRODUCTO` (`CODIGO_PRODUCTO`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`NO_ORDEN`),
  ADD KEY `CODIGO_PROVEEDOR` (`CODIGO_PROVEEDOR`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`CODIGO_PRESENTACION`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`CODIGO_PRODUCTO`),
  ADD KEY `CODIGO_PRESENTACION` (`CODIGO_PRESENTACION`),
  ADD KEY `CODIGO_CLASIFICACION` (`CODIGO_CLASIFICACION`),
  ADD KEY `CODIGO_TIPO` (`CODIGO_TIPO`);

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
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `CODIGO_CLASIFICACION` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la clasificación del producto, identificador único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CODIGO_CLIENTE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primari del cliente, identificador único', AUTO_INCREMENT=11111112;

--
-- AUTO_INCREMENT de la tabla `contacto_cliente`
--
ALTER TABLE `contacto_cliente`
  MODIFY `CODIGO_CONTACTO_C` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del contacto del cliente, identificador único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contacto_proveedor`
--
ALTER TABLE `contacto_proveedor`
  MODIFY `CODIGO_CONTACTO_P` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del contacto del proveedor, identificador único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `CODIGO_DETALLE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar el detalle de inventario, identificador único', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `CODIGO_DETALLE_PEDIDO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar el pedido y los productos, identificador único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `CODIGO_INVENTARIO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar el inventario, identificador único', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `CODIGO_OFERTA` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para la oferta, identificador único', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `NO_ORDEN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para distinguir los pedidos, identificador único', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `CODIGO_PRESENTACION` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la presentación del producto, identificador único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `CODIGO_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del producto, identificador único', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `CODIGO_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del proveedor, identificador único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `CODIGO_ROL` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para los roles que existiran en el sistema, identificador único', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `CODIGO_TIPO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del tipo de producto, identificador único', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para el usuario, identificador único', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `CODIGO_VENTA` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar las ventas realizadas, identificador único', AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`CODIGO_VENTA`) REFERENCES `venta` (`CODIGO_VENTA`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`CODIGO_INVENTARIO`) REFERENCES `inventario` (`CODIGO_INVENTARIO`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`NO_ORDEN`) REFERENCES `pedido` (`NO_ORDEN`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `producto` (`CODIGO_PRODUCTO`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `producto` (`CODIGO_PRODUCTO`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `proveedor` (`CODIGO_PROVEEDOR`);

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `producto` (`CODIGO_PRODUCTO`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `proveedor` (`CODIGO_PROVEEDOR`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`CODIGO_PRESENTACION`) REFERENCES `presentacion` (`CODIGO_PRESENTACION`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`CODIGO_CLASIFICACION`) REFERENCES `clasificacion` (`CODIGO_CLASIFICACION`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`CODIGO_TIPO`) REFERENCES `tipo_producto` (`CODIGO_TIPO`);

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
