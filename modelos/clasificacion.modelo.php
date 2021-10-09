<?php

require_once "conexion.php";

class ModeloClasificacion{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarClasificacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CLASIFICACION) VALUES (:clasificacion)");

		$stmt->bindParam(":clasificacion", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarClasificacion($tabla, $item, $valor){

		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND VISIBLE = 1");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE VISIBLE = 1");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarclasificacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CLASIFICACION= :categoria WHERE CODIGO_CLASIFICACION = :id");

		$stmt -> bindParam(":categoria", $datos["CLASIFICACION"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["CODIGO_CLASIFICACION"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarClasificacion($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET VISIBLE = 0 WHERE CODIGO_CLASIFICACION= :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}
}
