<?php

require_once "../controladores/proveedor.controlador.php";
require_once "../modelos/proveedor.modelo.php";

class AjaxProveedor{
	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/
	public $idProveedor;
	public function ajaxEditarProveedor(){
		$item = "CODIGO_PROVEEDOR";
		$valor = $this->idProveedor;
		$respuesta = ControladorProveedor::ctrMostrarProveedor($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxProveedorContacto(){
		$item = "CODIGO_PROVEEDOR";
		$valor = $this->idProveedor;
		$respuesta = ControladorProveedor::ctrMostrarProveedor($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxListarContactoProveedor(){
		$item = "CODIGO_PROVEEDOR";
		$valor = $this->idProveedor;
		$respuesta = ControladorProveedor::ctrMostrarListaContactoProveedor($item, $valor);
		echo json_encode($respuesta);
	}

}

/*=============================================
EDITAR PROVEEDOR
=============================================*/
if(isset($_POST["idProveedor"])){
	$proveedor = new AjaxProveedor();
	$proveedor -> idProveedor = $_POST["idProveedor"];
	$proveedor -> ajaxEditarProveedor();
}

if(isset($_POST["idProveedorContacto"])){
	$proveedor = new AjaxProveedor();
	$proveedor -> idProveedor = $_POST["idProveedorContacto"];
	$proveedor -> ajaxProveedorContacto();
}

if(isset($_POST["idListarContactoProveedor"])){
	$proveedor = new AjaxProveedor();
	$proveedor -> idProveedor = $_POST["idListarContactoProveedor"];
	$proveedor -> ajaxListarContactoProveedor();
}
