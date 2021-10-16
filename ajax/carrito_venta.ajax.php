<?php

require_once "../controladores/producto.controlador.php";
require_once "../modelos/producto.modelo.php";

class AjaxProductoVenta{
	/*=============================================
	BUSCAR INFORMACION DE PRODUCTO QUE SE AGREGUE EN EL CARRITO DE COMPRAS
	=============================================*/
	public $idProducto;
	public function ajaxEditarProducto(){
		$item = "CODIGO_INVENTARIO";
		$valor = $this->idProducto;
		$respuesta = ControladorProducto::ctrMostrarProductoVenta($item, $valor);
		echo json_encode($respuesta);
	}
}

/*=============================================
VALIDANDO EL METTHOD POST SI VIENE CON UNA VARIABLE ID DE PRODUCTO
=============================================*/
if(isset($_POST["idProducto"])){
	$producto = new AjaxProductoVenta();
	$producto -> idProducto = $_POST["idProducto"];
	$producto -> ajaxEditarProducto();
}