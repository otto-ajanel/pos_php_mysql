<?php

require_once "../controladores/oferta.controlador.php";
require_once "../modelos/oferta.modelo.php";

class AjaxOferta{

	/*=============================================
	EDITAR OFERTA
	=============================================*/

	public $idOferta;

	public function ajaxEditarOferta(){

		$item = "CODIGO_OFERTA";
		$valor = $this->idOferta;
		$respuesta = ControladorOferta::ctrMostrarOferta($item, $valor);
		echo json_encode($respuesta);

		}
}

/*=============================================
EDITAR OFERTA
=============================================*/
if(isset($_POST["idOferta"])){
	$oferta = new AjaxOferta();
	$oferta -> idOferta = $_POST["idOferta"];
	$oferta -> ajaxEditarOferta();
}
