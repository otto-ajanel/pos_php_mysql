<?php

require_once "conexion.php";

class ModeloProveedores{

	/*=============================================
	CREAR proveedor
	=============================================*/

	static public function mdlIngresarProveedor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NIT,NOMBRE_PROVEEDOR, DIRECCION, CORREO, TELEFONO) VALUES (:documento,:nombre,:direccion,:email,:telefono)");

		$stmt->bindParam(":documento", $datos["NIT"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["DIRECCION"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["EMAIL"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["TELEFONO"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PROEDORES
	=============================================*/

	static public function mdlMostrarProveedor($tabla, $item, $valor){

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
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarProveedor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE_PROVEEDOR = :nombre, NIT = :documento, CORREO = :email, TELEFONO = :telefono, DIRECCION= :direccion  WHERE CODIGO_PROVEEDOR = :id");

		$stmt->bindParam(":id", $datos["CODIGO_PROVEEDOR"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["NOMBRE_PROVEEDOR"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["NIT"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["CORREO"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["TELEFONO"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["DIRECCION"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR Proveedor
	=============================================*/

	static public function mdlEliminarProveedor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE CODIGO_PROVEEDOR = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}