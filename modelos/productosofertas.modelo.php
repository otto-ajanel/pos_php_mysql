<?php

require_once "conexion.php";

class ModeloProductosOfertas{
  //Obtener los productos para ofertas
	static public function mdlMostrarProductosOfertas(){
    $stmt = Conexion::conectar()->prepare("select t0.CODIGO_ASIGNACION, concat(t1.NOMBRE_GENERICO, ' - ', t2.PRESENTACION) NOMBRE_GENERICO
			from asignacion_producto t0
				join producto t1 on t1.CODIGO_PRODUCTO = t0.CODIGO_PRODUCTO
			    join presentacion t2 on t2.CODIGO_PRESENTACION = t0.CODIGO_PRESENTACION
			where t1.visible = 1;");
    $stmt -> execute();
    return $stmt -> fetchAll();
	}
}
