<?php

require_once "conexion.php";

class ModeloTipo{

	/*=============================================
	CREAR TIPO DE PRODUCTO
	=============================================*/

	static public function mdlIngresarTipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(TIPO_PRODUCTO) VALUES (:tipoproducto)");

		$stmt->bindParam(":tipoproducto", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR TIPO DE PRODUCTO
	=============================================*/

	static public function mdlMostrarTipo($tabla, $item, $valor){

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
	EDITAR TIPO DE PRODUCTO
	=============================================*/

	static public function mdlEditarTipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET TIPO_PRODUCTO= :tipoproducto WHERE CODIGO_TIPO = :id");

		$stmt -> bindParam(":tipoproducto", $datos["TIPO_PRODUCTO"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["CODIGO_TIPO"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR TIPO PRODUCTO
	=============================================*/

	static public function mdlBorrarTipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE CODIGO_TIPO= :id");

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
