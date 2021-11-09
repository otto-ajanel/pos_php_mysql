<?php

class ControladorCaducidad{

	/*=============================================
	MOSTRAR STOCK
	=============================================*/
	static public function ctrMostrarCaducidad($item, $valor){
		$tabla = "INVENTARIO";
		$respuesta = ModeloCaducidad::mdlMostrarCaducidad($tabla, $item, $valor);
		return $respuesta;
	}
}
