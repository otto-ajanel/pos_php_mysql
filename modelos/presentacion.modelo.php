<?php

require_once "conexion.php";

class ModeloPresentacion{

	/*=============================================
	CREAR Presentacion
	=============================================*/

	static public function mdlIngresarPresentacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(PRESENTACION) VALUES (:presentacion)");

		$stmt->bindParam(":presentacion", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR Presentacion
	=============================================*/

	static public function mdlMostrarPresentacion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR Presentación
	=============================================*/

	static public function mdlEditarPresentacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET PRESENTACION= :Presentacion WHERE CODIGO_PRESENTACION = :id");

		$stmt -> bindParam(":Presentacion", $datos["PRESENTACION"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["CODIGO_PRESENTACION"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR Presentacion
	=============================================*/

	static public function mdlBorrarPresentacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE CODIGO_PRESENTACION= :id");

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