<?php

require_once "../controladores/pedido.controlador.php";
require_once "../modelos/pedido.modelo.php";

class AjaxPedido{
	/*=============================================
	EDITAR PEDIDO
	=============================================*/
	public $idPedido;
	public function ajaxEditarPedido(){
		$item = "NO_ORDEN";
		$valor = $this->idPedido;
		$respuesta = ControladorPedido::ctrMostrarPedido($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxDetallePedido(){
		$item = "NO_ORDEN";
		$valor = $this->idPedido;
		$respuesta = ControladorPedido::ctrMostrarPedido($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxListarProductoPedido(){
		$item = "NO_ORDEN";
		$valor = $this->idPedido;
		$respuesta = ControladorPedido::ctrMostrarListaProducto($item, $valor);
		echo json_encode($respuesta);
	}

}

/*=============================================
EDITAR PEDIDO
=============================================*/
if(isset($_POST["idPedido"])){
	$pedido = new AjaxPedido();
	$pedido -> idPedido = $_POST["idPedido"];
	$pedido -> ajaxEditarPedido();
}

if(isset($_POST["idDetallePedido"])){
	$pedido = new AjaxPedido();
	$pedido -> idPedido = $_POST["idDetallePedido"];
	$pedido -> ajaxDetallePedido();
}

if(isset($_POST["idListarDetallePedido"])){
	$pedido = new AjaxPedido();
	$pedido -> idPedido = $_POST["idListarDetallePedido"];
	$pedido -> ajaxListarProductoPedido();
}
