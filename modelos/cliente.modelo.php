<?php

require_once "conexion.php";

class ModeloCliente{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_CLIENTE, NIT, DIRECCION) VALUES (:nuevoCliente, :nuevoNit, :nuevaDireccion)");
		$stmt->bindParam(":nuevoCliente", $datos["NOMBRE_CLIENTE"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoNit", $datos["NIT"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevaDireccion", $datos["DIRECCION"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		}else{
			echo '<script>
				window.alert("'.$datos["NOMBRE_CLIENTE"].'");
			</script>';
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarCliente($tabla, $item, $valor){
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

	static public function mdlMostrarListaContacto($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("
				select *
				from cliente t0
					left outer join contacto_cliente t1 on t0.CODIGO_CLIENTE = t1.CODIGO_CLIENTE
				where t0.CODIGO_CLIENTE = :CODIGO_CLIENTE;
			");

		$stmt -> bindParam(":CODIGO_CLIENTE", $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"UPDATE $tabla
		SET
			NOMBRE_CLIENTE = :editarCliente,
			NIT = :editarNit,
			DIRECCION = :editarDireccion
		WHERE CODIGO_CLIENTE = :idCliente");

		$stmt->bindParam(":idCliente", $datos["CODIGO_CLIENTE"], PDO::PARAM_INT);
		$stmt->bindParam(":editarCliente", $datos["NOMBRE_CLIENTE"], PDO::PARAM_STR);
		$stmt->bindParam(":editarNit", $datos["NIT"], PDO::PARAM_STR);
		$stmt->bindParam(":editarDireccion", $datos["DIRECCION"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}



	/*=============================================
	EDITAR CONTACTO CLIENTE
	=============================================*/
	static public function mdlIngresarContactoCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"INSERT INTO $tabla(CODIGO_CLIENTE, TELEFONO)VALUES(:idClienteContacto, :editarTelefonoCliente)");

		$stmt->bindParam(":idClienteContacto", $datos["CODIGO_CLIENTE"], PDO::PARAM_INT);
		$stmt->bindParam(":editarTelefonoCliente", $datos["TELEFONO"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}




	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/
static public function mdlEliminarCliente($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET VISIBLE = 0 WHERE CODIGO_CLIENTE = :idCliente");
	$stmt -> bindParam(":idCliente", $datos, PDO::PARAM_INT);
	if($stmt -> execute()){
		return "ok";
	}else{
		return "error";
	}
	$stmt -> close();
	$stmt = null;
}
}
