<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxInventario{
	/*=============================================
	EDITAR INVENTARIO
	=============================================*/
	public $idInventario;
	public function ajaxEditarProductoInventario(){
		$item = "CODIGO_INVENTARIO";
		$valor = $this->idInventario;
		$respuesta = ControladorInventario::ctrMostrarProductoInventario($item, $valor);
		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR INVENTARIO
=============================================*/
if(isset($_POST["idInventario"])){
	$producto = new AjaxInventario();
	$producto -> idInventario = $_POST["idInventario"];
	$producto -> ajaxEditarProductoInventario();
}
