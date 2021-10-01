<?php

require_once "conexion.php";

class ModeloOferta{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarOferta($tabla, $item, $valor){
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
	REGISTRO DE USUARIO
	=============================================*/
	static public function mdlIngresarOferta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(DESCUENTO, FECHA_INICIO, FECHA_FIN) VALUES (:descuento, :fecha_inicio, :fecha_fin)");
		$stmt->bindParam(":descuento", $datos["DESCUENTO"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["FECHA_INICIO"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["FECHA_FIN"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarOferta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET DESCUENTO = :descuento, FECHA_INICIO = :fecha_inicio, FECHA_FIN = :fecha_fin");
    $stmt->bindParam(":descuento", $datos["DESCUENTO"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha_inicio", $datos["FECHA_INICIO"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha_fin", $datos["FECHA_FIN"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarOferta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE CODIGO_OFERTA = :id");
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
