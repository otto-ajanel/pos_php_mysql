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
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CODIGO_ASIGNACION, DESCUENTO, FECHA_INICIO, FECHA_FIN) VALUES (:codigoAsignacion :descuento, :fechaIncio, :fechaFin)");

		$stmt->bindParam(":codigoAsignacion", $datos["CODIGO_ASIGNACION"], PDO::PARAM_STR);
		$stmt->bindParam(":descuento", $datos["DESCUENTO"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIncio", $datos["FECHA_INICIO"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaFin", $datos["FECHA_FIN"], PDO::PARAM_STR);

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
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CODIGO_ASIGNACION = :codigoAsignacion, DESCUENTO = :descuento, FECHA_INICIO = :fechaIncio, FECHA_FIN = :fechaFin");

		$stmt->bindParam(":codigoAsignacion", $datos["CODIGO_ASIGNACION"], PDO::PARAM_STR);
		$stmt->bindParam(":descuento", $datos["DESCUENTO"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIncio", $datos["FECHA_INICIO"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaFin", $datos["FECHA_FIN"], PDO::PARAM_STR);

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
