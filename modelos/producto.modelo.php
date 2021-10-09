<?php

require_once "conexion.php";

class ModeloProducto{

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_GENERICO, NOMBRE_COMERCIAL, STOCK_MIN, STOCK_MAX) VALUES (:nuevoNombreGenerico, :nuevoNombreComercial, :nuevoStockMinimo, :nuevoStockMaximo)");
		$stmt->bindParam(":nuevoNombreGenerico", $datos["NOMBRE_GENERICO"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoNombreComercial", $datos["NOMBRE_COMERCIAL"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoStockMinimo", $datos["STOCK_MIN"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoStockMaximo", $datos["STOCK_MAX"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR PRODUCTO
	=============================================*/

	static public function mdlMostrarProducto($tabla, $item, $valor){
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
	EDITAR PRODUCTO
	=============================================*/

	static public function mdlEditarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"UPDATE $tabla
		SET
			NOMBRE_GENERICO = :editarNombreGenerico,
			NOMBRE_COMERCIAL = :editarNombreComercial,
			STOCK_MIN = :editarStockMinimo,
			STOCK_MAX = :editarStockMaximo
		WHERE CODIGO_PRODUCTO = :idProducto");

		$stmt->bindParam(":idProducto", $datos["CODIGO_PRODUCTO"], PDO::PARAM_INT);
		$stmt->bindParam(":editarNombreGenerico", $datos["NOMBRE_GENERICO"], PDO::PARAM_STR);
		$stmt->bindParam(":editarNombreComercial", $datos["NOMBRE_COMERCIAL"], PDO::PARAM_STR);
		$stmt->bindParam(":editarStockMinimo", $datos["STOCK_MIN"], PDO::PARAM_STR);
		$stmt->bindParam(":editarStockMaximo", $datos["STOCK_MAX"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/
	static public function mdlEliminarProducto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET VISIBLE = 0 WHERE CODIGO_PRODUCTO = :idProducto");
		$stmt -> bindParam(":idProducto", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}
}
