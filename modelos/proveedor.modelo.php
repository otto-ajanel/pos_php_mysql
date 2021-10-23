<?php

require_once "conexion.php";

class ModeloProveedor{

	/*=============================================
	CREAR PROVEEDOR
	=============================================*/

	static public function mdlIngresarProveedor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_PROVEEDOR, NIT, DIRECCION) VALUES (:nuevoProveedor, :nuevoNitProveedor, :nuevaDireccionProveedor)");
		$stmt->bindParam(":nuevoProveedor", $datos["NOMBRE_PROVEEDOR"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoNitProveedor", $datos["NIT"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevaDireccionProveedor", $datos["DIRECCION"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		}else{
			echo '<script>
				window.alert("'.$datos["NOMBRE_PROVEEDOR"].'");
			</script>';
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR PROVEEDOR
	=============================================*/

	static public function mdlMostrarProveedor($tabla, $item, $valor){
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
	MOSTRAR LISTA CONTACTOS
	=============================================*/

	static public function mdlMostrarListaContactoProveedor($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("
				select *
				from proveedor t0
					left outer join contacto_proveedor t1 on t0.CODIGO_PROVEEDOR = t1.CODIGO_PROVEEDOR
				where t0.CODIGO_PROVEEDOR = :CODIGO_PROVEEDOR;
			");

		$stmt -> bindParam(":CODIGO_PROVEEDOR", $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/

	static public function mdlEditarProveedor($tabla, $datos){
		$sql = "UPDATE $tabla
		SET
			NOMBRE_PROVEEDOR = '".$datos["NOMBRE_PROVEEDOR"]."',
			NIT = '".$datos["NIT"]."',
			DIRECCION = '".$datos["DIRECCION"]."'
		WHERE CODIGO_PROVEEDOR = ".$datos["CODIGO_PROVEEDOR"];
		$stmt = Conexion::conectar()->prepare($sql);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}

	/*=============================================
	EDITAR CONTACTO PROVEEDOR
	=============================================*/
	static public function mdlIngresarContactoProveedor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"INSERT INTO $tabla(CODIGO_PROVEEDOR, TELEFONO)VALUES(:idProveedorContacto, :editarTelefonoProveedor)");

		$stmt->bindParam(":idProveedorContacto", $datos["CODIGO_PROVEEDOR"], PDO::PARAM_INT);
		$stmt->bindParam(":editarTelefonoProveedor", $datos["TELEFONO"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR PROVEEDOR
	=============================================*/
static public function mdlEliminarProveedor($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET VISIBLE = 0 WHERE CODIGO_PROVEEDOR = :idProveedor");
	$stmt -> bindParam(":idProveedor", $datos, PDO::PARAM_INT);
	if($stmt -> execute()){
		return "ok";
	}else{
		return "error";
	}
	$stmt -> close();
	$stmt = null;
}
}
