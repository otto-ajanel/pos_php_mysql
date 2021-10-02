<?php

require_once "conexion.php";

class ModeloProductosOfertas{
  //Obtener los productos para ofertas
	static public function mdlMostrarProductosOfertas(){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM PRODUCTO");
    $stmt -> execute();
    return $stmt -> fetchAll();
	}
}
