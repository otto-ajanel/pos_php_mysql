<?php

class ControladorProductosOfertas{
  //
	static public function ctrMostrarProductosOfertas(){
		$respuesta = ModeloProductosOfertas::mdlMostrarProductosOfertas();
		return $respuesta;
	}
}
