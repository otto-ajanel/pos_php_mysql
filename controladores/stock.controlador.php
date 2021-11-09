<?php

class ControladorStock{

	/*=============================================
	MOSTRAR STOCK
	=============================================*/
	static public function ctrMostrarStock($item, $valor){
		$tabla = "INVENTARIO";
		$respuesta = ModeloStock::mdlMostrarStock($tabla, $item, $valor);
		return $respuesta;
	}
}
