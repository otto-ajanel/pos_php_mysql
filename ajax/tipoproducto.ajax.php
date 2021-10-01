<?php

require_once "../controladores/tipoproducto.controlador.php";
require_once "../modelos/tipoproducto.modelo.php";

class AjaxTipo{

	/*=============================================
	EDITAR TIPO DE PRODUCTO
	=============================================*/

	public $idTipo;

	public function ajaxEditarTipo(){

		$item = "CODIGO_TIPO";
		$valor = $this->idTipo;

		$respuesta = ControladorTipo::ctrMostrarTipo($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR TIPO DE PRODUCTO
=============================================*/
if(isset($_POST["idTipo"])){

	$tipoproducto = new AjaxTipo();
	$tipoproducto -> idTipo = $_POST["idTipo"];
	$tipoproducto -> ajaxEditarTipo();
}
