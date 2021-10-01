<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clasificacion.controlador.php";
require_once "controladores/presentacion.controlador.php";
require_once "controladores/tipoproducto.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/productosofertas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/clasificacion.modelo.php";
require_once "modelos/presentacion.modelo.php";
require_once "modelos/tipoproducto.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/productosofertas.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
