<?php

require_once "conexion.php";

class ModeloProductosOfertas{
  //Obtener los productos para ofertas
	static public function mdlMostrarProductosOfertas(){
    $stmt = Conexion::conectar()->prepare("select t0.CODIGO_PRODUCTO, concat(t0.NOMBRE_GENERICO, ' - ', t1.PRESENTACION) NOMBRE_GENERICO
			from producto t0
			    join presentacion t1 on t1.CODIGO_PRESENTACION = t0.CODIGO_PRESENTACION
			where t1.visible = 1;");
    $stmt -> execute();
    return $stmt -> fetchAll();
	}
}
