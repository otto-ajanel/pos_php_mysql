<?php

require_once "../controladores/cliente.controlador.php";
require_once "../modelos/cliente.modelo.php";

class AjaxCliente{
	/*=============================================
	EDITAR CLIENTE
	=============================================*/
	public $idCliente;
	public function ajaxEditarCliente(){
		$item = "CODIGO_CLIENTE";
		$valor = $this->idCliente;
		$respuesta = ControladorCliente::ctrMostrarCliente($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxClienteContacto(){
		$item = "CODIGO_CLIENTE";
		$valor = $this->idCliente;
		$respuesta = ControladorCliente::ctrMostrarCliente($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxListarContacto(){
		$item = "CODIGO_CLIENTE";
		$valor = $this->idCliente;
		$respuesta = ControladorCliente::ctrMostrarListaContacto($item, $valor);
		echo json_encode($respuesta);
	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/
if(isset($_POST["idCliente"])){
	$cliente = new AjaxCliente();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();
}

if(isset($_POST["idClienteContacto"])){
	$cliente = new AjaxCliente();
	$cliente -> idCliente = $_POST["idClienteContacto"];
	$cliente -> ajaxClienteContacto();
}

if(isset($_POST["idListarContacto"])){
	$cliente = new AjaxCliente();
	$cliente -> idCliente = $_POST["idListarContacto"];
	$cliente -> ajaxListarContacto();
}
