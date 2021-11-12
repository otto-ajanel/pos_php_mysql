<?php

require_once "../controladores/presentacion.controlador.php";
require_once "../modelos/presentacion.modelo.php";

class AjaxPresentacion{

	/*=============================================
	EDITAR PRESENTACION
	=============================================*/

	public $idPresentacion;

	public function ajaxEditarPresentacion(){

		$item = "CODIGO_PRESENTACION";
		$valor = $this->idPresentacion;

		$respuesta = ControladorPresentacion::ctrMostrarPresentacion($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR PRESENTACION
=============================================*/
if(isset($_POST["idPresentacion"])){

	$presentacion = new AjaxPresentacion();
	$presentacion -> idPresentacion = $_POST["idPresentacion"];
	$presentacion -> ajaxEditarPresentacion();
}
