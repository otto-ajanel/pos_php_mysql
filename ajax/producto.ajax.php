<?php

require_once "../controladores/producto.controlador.php";
require_once "../modelos/producto.modelo.php";

class AjaxProducto{
	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	public $idProducto;
	public function ajaxEditarProducto(){
		$item = "CODIGO_PRODUCTO";
		$valor = $this->idProducto;
		$respuesta = ControladorProducto::ctrMostrarProducto($item, $valor);
		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR PRODUCTO
=============================================*/
if(isset($_POST["idProducto"])){
	$producto = new AjaxProducto();
	$producto -> idProducto = $_POST["idProducto"];
	$producto -> ajaxEditarProducto();
}
