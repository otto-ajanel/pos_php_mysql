<?php

require_once "../controladores/clasificacion.controlador.php";
require_once "../modelos/clasificacion.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "CODIGO_CLASIFICACION";
		$valor = $this->idCategoria;

		$respuesta = ControladorClasificacion::ctrMostrarClasificacion($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCategoria"])){

	$categoria = new AjaxCategorias();
	$categoria -> idCategoria = $_POST["idCategoria"];
	$categoria -> ajaxEditarCategoria();
}
