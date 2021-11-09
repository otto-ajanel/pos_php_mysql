-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2021 a las 01:38:39
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



-- BASE DE DATOS: `NISSI`

CREATE TABLE `CLIENTE` (
  `CODIGO_CLIENTE` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primari del cliente, identificador único',
  `NIT` VARCHAR(20) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nit del cliente',
  `NOMBRE_CLIENTE` VARCHAR(50) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre del cliente',
  `DIRECCION` VARCHAR(50) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Dirección para la factura del cliente',
  `VISIBLE` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado del cliente, activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_CLIENTE`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO CLIENTE(CODIGO_CLIENTE,NIT,NOMBRE_CLIENTE,DIRECCION) VALUES
(1, '62463482','Santiago','7 AV 27-22 Z-8'),
(2, '98324321','Maria','7 Av 34 - 12 Zona 8'),
(3, '23949823','Juan','Calzada Roosevelt Kilómetro 14'),
(4, '79024132','Andrea','19 Avenida 8 - 10 Zona 11'),
(5, '84939201','Rodrigo','Boulevar Proceres 18-41 Zona 10');

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `CONTACTO_CLIENTE` (
  `CODIGO_CONTACTO_C` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del contacto del cliente, identificador único',
  `CODIGO_CLIENTE` INT(11) NOT NULL COMMENT 'Clave secundaria de la tabla cliente, para identificar al cliente',
  `TELEFONO` INT(10) NOT NULL COMMENT 'Número de teléfono del cliente',
  PRIMARY KEY (`CODIGO_CONTACTO_C`),
  FOREIGN KEY (`CODIGO_CLIENTE`) REFERENCES `CLIENTE` (`CODIGO_CLIENTE`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO CONTACTO_CLIENTE(CODIGO_CONTACTO_C,TELEFONO,CODIGO_CLIENTE) VALUES
(1, '55556932',1),
(2, '52018384',2),
(3, '36619404',3),
(4, '36967455',4),
(5, '54658342',5);

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `PROVEEDOR` (
  `CODIGO_PROVEEDOR` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del proveedor, identificador único',
  `NIT` VARCHAR(20) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nit del proveedor',
  `NOMBRE_PROVEEDOR` VARCHAR(100) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre del proveedor',
  `DIRECCION` VARCHAR(100) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Dirección del proveedor',
  `VISIBLE` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado del proveedor, activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_PROVEEDOR`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO PROVEEDOR(CODIGO_PROVEEDOR,NIT,NOMBRE_PROVEEDOR,DIRECCION) VALUES
(1, '43463482','Batres','5ta. Av. Zona 12'),
(2, '75324321','Suiva','19-30 Zona 10'),
(3, '98949823','Drogrería Merced','14, 6 - 38 Zona 2'),
(4, '21024132','Farmacia de la Comunidad','12 avenida 12-54 zona 1'),
(5, '34939201','Farmacia Galeno','1 Cl 18-92 Z 1');

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `CONTACTO_PROVEEDOR` (
  `CODIGO_CONTACTO_P` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del contacto del proveedor, identificador único',
  `CODIGO_PROVEEDOR` INT(11) NOT NULL COMMENT 'Clave secundaria de la tabla proveedor, para identificar al proveedor',
  `TELEFONO` INT(10) NOT NULL COMMENT 'Número de teléfono del proveedor',
  PRIMARY KEY (`CODIGO_CONTACTO_P`),
  FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `PROVEEDOR` (`CODIGO_PROVEEDOR`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO CONTACTO_PROVEEDOR(CODIGO_CONTACTO_P,TELEFONO,CODIGO_PROVEEDOR) VALUES
(1, 53556932,1),
(2, 82218384,2),
(3, 99319404,3),
(4, 83927455,4),
(5, 29158342,5);

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `PRESENTACION` (
  `CODIGO_PRESENTACION` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la presentación del producto, identificador único',
  `PRESENTACION` VARCHAR(25) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre de la presentación del producto, ejemplo: tableta',
  `VISIBLE` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado de la presentación del producto, activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_PRESENTACION`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO PRESENTACION(CODIGO_PRESENTACION,PRESENTACION) VALUES
(1, 'ENVASE'),
(2, 'CAPSULA'),
(3, 'TABLETA'),
(4, 'AMPOLLA'),
(5, 'CREMA');

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `CLASIFICACION` (
  `CODIGO_CLASIFICACION` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la clasificación del producto, identificador único',
  `CLASIFICACION` VARCHAR(25) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre de la clasificación del producto, ejemplo: Analgésico',
  `VISIBLE` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado de la clasificación del producto, activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_CLASIFICACION`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO CLASIFICACION(CODIGO_CLASIFICACION,CLASIFICACION) VALUES
(1, 'ANTIINFLAMATORIOS'),
(2, 'ANTICONCEPTIVOS'),
(3, 'ANTIINFECCIOSOS'),
(4, 'MUCULITICOS'),
(5, 'ANTIDIAREICOS');

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `TIPO_PRODUCTO` (
  `CODIGO_TIPO` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del tipo de producto, identificador único',
  `TIPO_PRODUCTO` VARCHAR(25) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre del tipo de producto, puede ser producto de marca o producto genérico',
  `VISIBLE` INT(1) COLLATE UTF8_SPANISH_CI NOT NULL DEFAULT '1' COMMENT 'Estado del tipo de producto, activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_TIPO`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO TIPO_PRODUCTO(CODIGO_TIPO,TIPO_PRODUCTO) VALUES
(1, 'GENERICAS'),
(2, 'MARCA');
/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `PRODUCTO` (
  `CODIGO_PRODUCTO` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria del producto, identificador único',
  `NOMBRE_GENERICO` VARCHAR(50) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre genérico del producto ingresado',
  `NOMBRE_COMERCIAL` VARCHAR(50) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre comercial del producto ingresado',
  `CODIGO_PRESENTACION` INT(11) NOT NULL COMMENT 'Clave secundaria para la identificación de la presentación del producto',
  `CODIGO_CLASIFICACION` INT(11) NOT NULL COMMENT 'Clave secundaria para la identificación de la clasificación del producto',  
  `CODIGO_TIPO` INT(11) NOT NULL COMMENT 'Clave secundaria para la identifación del tipo de producto',
  `STOCK_MIN` INT(10) NOT NULL COMMENT 'Indicador de la cantidad mínima que debe de haber de producto',
  `STOCK_MAX` INT(10) NOT NULL COMMENT 'Indicador de la cantidad máxima que debe de haber de producto',
  `VISIBLE` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado del producto, activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_PRODUCTO`),
  FOREIGN KEY (`CODIGO_PRESENTACION`) REFERENCES `PRESENTACION` (`CODIGO_PRESENTACION`),
  FOREIGN KEY (`CODIGO_CLASIFICACION`) REFERENCES `CLASIFICACION` (`CODIGO_CLASIFICACION`),
  FOREIGN KEY (`CODIGO_TIPO`) REFERENCES `TIPO_PRODUCTO` (`CODIGO_TIPO`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO PRODUCTO(CODIGO_PRODUCTO, NOMBRE_GENERICO, NOMBRE_COMERCIAL, CODIGO_PRESENTACION, CODIGO_CLASIFICACION, CODIGO_TIPO, STOCK_MIN, STOCK_MAX) VALUES
(1, 'FENITOINA','DILATIN', 1, 1, 1, 5,100),
(2, 'AMPILICINA','AMINOXIDEN',2, 2, 1, 5,50),
(3, 'MONONITRATO DE ISOSORBIDE','ELATAN', 3, 3, 1, 5,100),
(4, 'ACEITE DE HIGADO DE BACALAO','ALLIXON', 4, 4, 1, 5,75),
(5, 'ACEITE DE LINAZA','COLESTEVAR',5, 5, 1, 5,100),
(6, 'ACETANOMINAFEN','NORSINA', 1, 1, 2, 5,100),
(7, 'OMEGA 3','MAX VITAL', 2, 2, 2, 5,50),
(8, 'ACICLOVIR','VIRULAX',3, 3, 2, 5,100),
(9, 'ACETATO DE FLUOROMETOLONA','FLUMETOL', 4, 4, 2, 5,50),
(10, 'ACIDO ACETICO','DUVAGIN',5, 5, 2, 5,100);

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `OFERTA` (
  `CODIGO_OFERTA` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para la oferta, identificador único',
  `CODIGO_PRODUCTO` INT(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
  `DESCUENTO` DOUBLE(10,2) NOT NULL COMMENT 'El porcentaje de descuento que se asignará al producto',
  `FECHA_INICIO` DATE NOT NULL COMMENT 'Fecha en la que inicia la oferta',
  `FECHA_FIN` DATE NOT NULL COMMENT 'Fecha en la que finaliza la oferta',
  PRIMARY KEY (`CODIGO_OFERTA`),
  FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `PRODUCTO` (`CODIGO_PRODUCTO`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO OFERTA(CODIGO_OFERTA,CODIGO_PRODUCTO,DESCUENTO,FECHA_INICIO,FECHA_FIN) VALUES
(1, 1, 0.05, STR_TO_DATE('2021-08-01','%Y-%m-%d'), STR_TO_DATE('2021-09-01','%Y-%m-%d')),
(2, 2, 0.10, STR_TO_DATE('2021-08-01','%Y-%m-%d'), STR_TO_DATE('2021-09-01','%Y-%m-%d')),
(3, 3, 0.05, STR_TO_DATE('2021-08-01','%Y-%m-%d'), STR_TO_DATE('2021-09-01','%Y-%m-%d')),
(4, 4, 0.10, STR_TO_DATE('2021-08-01','%Y-%m-%d'), STR_TO_DATE('2021-09-01','%Y-%m-%d')),
(5, 5, 0.05, STR_TO_DATE('2021-08-01','%Y-%m-%d'), STR_TO_DATE('2021-09-01','%Y-%m-%d'));

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `PEDIDO` (
  `NO_ORDEN` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para distinguir los pedidos, identificador único',
  `CODIGO_PROVEEDOR` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar el proveedor a quien se hará el pedido',
  `FECHA_PEDIDO` DATE NOT NULL COMMENT 'Fecha en la que se está haciendo el pedido',
  `FECHA_ESTIMADA` DATE NOT NULL COMMENT 'Fecha que se estima que llegará el producto',
  `VISIBLE` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado del pedido, activo = 1, desactivo = 0',
  PRIMARY KEY (`NO_ORDEN`), 
  FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `PROVEEDOR` (`CODIGO_PROVEEDOR`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO PEDIDO(NO_ORDEN,CODIGO_PROVEEDOR,FECHA_PEDIDO,FECHA_ESTIMADA) VALUES
(1, 1, STR_TO_DATE('2021-08-01','%Y-%m-%d'), STR_TO_DATE('2021-09-01','%Y-%m-%d')),
(2, 2, STR_TO_DATE('2021-08-02','%Y-%m-%d'), STR_TO_DATE('2021-09-02','%Y-%m-%d')),
(3, 3, STR_TO_DATE('2021-08-03','%Y-%m-%d'), STR_TO_DATE('2021-09-03','%Y-%m-%d')),
(4, 4, STR_TO_DATE('2021-08-04','%Y-%m-%d'), STR_TO_DATE('2021-09-04','%Y-%m-%d')),
(5, 5, STR_TO_DATE('2021-08-05','%Y-%m-%d'), STR_TO_DATE('2021-09-05','%Y-%m-%d'));

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `DETALLE_PEDIDO` (
  `CODIGO_DETALLE_PEDIDO` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar el pedido y los productos, identificador único',
  `NO_ORDEN` INT(11) NOT NULL COMMENT 'Clave secundara para identificar el pedido',
  `CODIGO_PRODUCTO` INT(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
  `CANTIDAD` INT(10) NOT NULL COMMENT 'Cantidad del producto que se pedirá al proveedor',
  `PRECIO_UNITARIO` DOUBLE(10,2) NOT NULL COMMENT 'Precio unitario del producto',
  PRIMARY KEY (`CODIGO_DETALLE_PEDIDO`),
  FOREIGN KEY (`NO_ORDEN`) REFERENCES `PEDIDO` (`NO_ORDEN`),
  FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `PRODUCTO` (`CODIGO_PRODUCTO`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO DETALLE_PEDIDO(CODIGO_DETALLE_PEDIDO, NO_ORDEN, CODIGO_PRODUCTO, CANTIDAD, PRECIO_UNITARIO) VALUES
(1, 1, 1, 20, 1.50),
(2, 2, 2, 20, 2.00),
(3, 3, 3, 20, 2.50),
(4, 4, 4, 20, 1.50),
(5, 5, 5, 20, 1.00);

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `ROL` (
  `CODIGO_ROL` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para los roles que existiran en el sistema, identificador único',
  `ROL` VARCHAR(25) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Rol que existirá en el sistema ejemplo: administrador, vendedor, entre otros',
  PRIMARY KEY (`CODIGO_ROL`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO `ROL` (`CODIGO_ROL`, `ROL`) VALUES
(1, 'ESPECIAL'),
(2, 'ADMINISTRADOR'),
(3, 'VENDEDOR');

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `USUARIO` (
  `CODIGO_USUARIO` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para el usuario, identificador único',
  `CODIGO_ROL` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar el rol',
  `NOMBRE` VARCHAR(25) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre de la persona que trabajará en la farmacia',
  `USUARIO` VARCHAR(25) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Nombre de usuario que identifique a la persona para iniciar sesión en el sistema',
  `CONTRASEÑA` VARCHAR(75) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'Contraseña para iniciar sesión en el sistema',
  `URL` VARCHAR(70) COLLATE UTF8_SPANISH_CI NOT NULL COMMENT 'dirección para la imagen que identifique al usuario',
  `ESTADO` INT(2) NOT NULL COMMENT 'Estado del usuario, Activo = 1, desactivo = 0',
  PRIMARY KEY (`CODIGO_USUARIO`),
  FOREIGN KEY (`CODIGO_ROL`) REFERENCES `ROL` (`CODIGO_ROL`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;


INSERT INTO `usuario` (`CODIGO_USUARIO`, `CODIGO_ROL`, `NOMBRE`, `USUARIO`, `CONTRASEÑA`, `URL`, `ESTADO`) VALUES
(1, 2, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', '', 1),
(2, 1, 'otto', 'otto', '$2a$07$asxx54ahjppf45sd87a5aukged6bq6SOMVtuR6oiIdyQPrK0NzEUy', 'vistas/img/usuarios/otto/929.png', 1);

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `VENTA` (
  `CODIGO_VENTA` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar las ventas realizadas, identificador único',
  `CODIGO_CLIENTE` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar al cliente al cual le corresponde la venta',
  `CODIGO_USUARIO` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar que usuario realizó la venta',
  `NO_FACTURA` INT(11) NOT NULL COMMENT 'Número de factura para identificar la venta.',
  `FECHA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Lleva el control de la fecha de venta',
  PRIMARY KEY (`CODIGO_VENTA`),
  FOREIGN KEY (`CODIGO_CLIENTE`) REFERENCES `CLIENTE` (`CODIGO_CLIENTE`),
  FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `USUARIO` (`CODIGO_USUARIO`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

INSERT INTO `venta` (`CODIGO_VENTA`, `CODIGO_CLIENTE`, `CODIGO_USUARIO`, `NO_FACTURA`, `FECHA`) VALUES
(1, 1, 1, 1, '2021-10-15 04:33:53'),
(2, 2, 2, 2, '2021-10-20 05:34:22'),
(3, 3, 1, 3, '2021-10-20 05:37:03'),
(4, 4, 2, 4, '2021-10-20 05:38:26'),
(5, 5, 1, 5, '2021-10-20 05:38:30'),
(6, 1, 2, 6, '2021-10-22 05:28:19'),
(7, 2, 1, 7, '2021-10-22 20:28:38'),
(8, 3, 2, 8, '2021-10-23 04:03:06'),
(9, 4, 1, 9, '2021-10-23 04:25:22');

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE `INVENTARIO`(
	`CODIGO_INVENTARIO` INT (11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar el inventario, identificador único',
	`CODIGO_BARRAS` INT (11) NOT NULL COMMENT 'Codigo de barra para identificar el producto', 
	`FECHA_INGRESO` DATE NOT NULL COMMENT 'Fecha de ingreso del producto a la farmacia', 
	`CADUCIDAD` DATE NOT NULL COMMENT 'Fecha de vencimiento del producto', 
	`PRECIO_COMPRA` FLOAT(10,2) NOT NULL COMMENT 'Precio a como se compró el producto',
	`PRECIO_VENTA` FLOAT(10,2) NOT NULL COMMENT 'Precio a como se venderá el producto', 
	`CANTIDAD_PRODUCTO` INT(11) NOT NULL COMMENT 'Cantidad total de producto disponible', 
	`CODIGO_PRODUCTO` INT(11) NOT NULL COMMENT 'Clave primaria del producto, identificador único',
	`CODIGO_PROVEEDOR` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar al proveedor',
	PRIMARY KEY (`CODIGO_INVENTARIO`),
	FOREIGN KEY (`CODIGO_PRODUCTO`) REFERENCES `PRODUCTO` (`CODIGO_PRODUCTO`),
	FOREIGN KEY (`CODIGO_PROVEEDOR`) REFERENCES `PROVEEDOR` (`CODIGO_PROVEEDOR`)
)ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

/*-------------------------------------------------------------------------------------------------------------------------*/

CREATE TABLE DETALLE_INVENTARIO (
	`CODIGO_DETALLE` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria para identificar el detalle de inventario, identificador único',
	`CODIGO_VENTA` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar la venta que se está realizando', 
	`CODIGO_INVENTARIO` INT(11) NOT NULL COMMENT 'Clave secundaria para identificar el producto que se encuentra en inventario y póder descontarlo del inventario al hacer la venta',
	PRIMARY KEY (`CODIGO_DETALLE`),
	FOREIGN KEY (`CODIGO_VENTA`) REFERENCES `VENTA` (`CODIGO_VENTA`),
	FOREIGN KEY (`CODIGO_INVENTARIO`) REFERENCES `INVENTARIO` (`CODIGO_INVENTARIO`)
)ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_SPANISH_CI;

/*-------------------------------------------------------------------------------------------------------------------------*/


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;