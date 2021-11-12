<?php

require_once "conexion.php";

class ModeloPedido{

	/*=============================================
	CREAR PEDIDO
	=============================================*/

	static public function mdlIngresarPedido($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO PEDIDO(CODIGO_PROVEEDOR, FECHA_PEDIDO, FECHA_ESTIMADA) VALUES (".$datos['CODIGO_PROVEEDOR'].", STR_TO_DATE('".$datos['FECHA_PEDIDO']."','%Y-%m-%d'), STR_TO_DATE('".$datos['FECHA_ESTIMADA']."','%Y-%m-%d'))");

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}

	/*=============================================
	MOSTRAR PEDIDO EN LA TABLA PRINCIPAL
	=============================================*/

	static public function mdlMostrarPedido($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT t0.NO_ORDEN, t0.CODIGO_PROVEEDOR, t1.NOMBRE_PROVEEDOR, t0.FECHA_PEDIDO, t0.FECHA_ESTIMADA
																							FROM pedido t0
																							JOIN proveedor t1 ON t1.CODIGO_PROVEEDOR = t0.CODIGO_PROVEEDOR
																							WHERE t0.VISIBLE = 1
																						AND $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT t0.NO_ORDEN, t1.NOMBRE_PROVEEDOR, t0.FECHA_PEDIDO, t0.FECHA_ESTIMADA
																							FROM pedido t0
																							JOIN proveedor t1 ON t1.CODIGO_PROVEEDOR = t0.CODIGO_PROVEEDOR
																						WHERE t0.VISIBLE = 1");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR LISTA CONTACTOS
	=============================================*/

	static public function mdlMostrarListaProducto($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("
		select t1.CODIGO_DETALLE_PEDIDO, concat(t2.NOMBRE_GENERICO, ' - ', t3.PRESENTACION) as nombre,
					t1.CANTIDAD, t1.PRECIO_UNITARIO, (t1.CANTIDAD * t1.PRECIO_UNITARIO) as subtotal
		from detalle_pedido t1
			join producto t2 on t2.CODIGO_PRODUCTO = t1.CODIGO_PRODUCTO
			join presentacion t3 on t3.CODIGO_PRESENTACION = t2.CODIGO_PRESENTACION
		where t1.NO_ORDEN = :NO_ORDEN;
			");

		$stmt -> bindParam(":NO_ORDEN", $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	/*=============================================
	EDITAR PEDIDO
	=============================================*/

	static public function mdlEditarPedido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"UPDATE $tabla
		SET
			CODIGO_PROVEEDOR = :editarProveedorPedido,
			FECHA_PEDIDO = :editarFechaPedido,
			FECHA_ESTIMADA = :editarFechaEstimada
		WHERE NO_ORDEN = :idPedido");

		$stmt->bindParam(":idPedido", $datos["NO_ORDEN"], PDO::PARAM_INT);
		$stmt->bindParam(":editarProveedorPedido", $datos["CODIGO_PROVEEDOR"], PDO::PARAM_STR);
		$stmt->bindParam(":editarFechaPedido", $datos["FECHA_PEDIDO"], PDO::PARAM_STR);
		$stmt->bindParam(":editarFechaEstimada", $datos["FECHA_ESTIMADA"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}



	/*=============================================
	EDITAR DETALLE PEDIDO
	=============================================*/
	static public function mdlIngresarDetallePedido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"INSERT INTO $tabla(NO_ORDEN, CODIGO_PRODUCTO, CANTIDAD, PRECIO_UNITARIO)VALUES(:idDetallePedido, :editarCodigoAsignacionDetalle, :editarCantidadDetallePedido, :editarPrecioDetallePedido)");

		$stmt->bindParam(":idDetallePedido", $datos["NO_ORDEN"], PDO::PARAM_INT);
		$stmt->bindParam(":editarCodigoAsignacionDetalle", $datos["CODIGO_PRODUCTO"], PDO::PARAM_STR);
		$stmt->bindParam(":editarCantidadDetallePedido", $datos["CANTIDAD"], PDO::PARAM_INT);
		$stmt->bindParam(":editarPrecioDetallePedido", $datos["PRECIO_UNITARIO"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}

	/*=============================================
	ELIMINAR PEDIDO
	=============================================*/
	static public function mdlEliminarPedido($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET VISIBLE = 0 WHERE NO_ORDEN = :idPedido");
		$stmt -> bindParam(":idPedido", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}


	/*PARA DESPLEGAR LOS PROVEEDORES QUE ESTEN VISIBLES*/
	static public function mdlMostrarProveedoresPedidos(){
    $stmt = Conexion::conectar()->prepare(
		"select CODIGO_PROVEEDOR, NOMBRE_PROVEEDOR
		from PROVEEDOR
		where visible = 1;");
    $stmt -> execute();
    return $stmt -> fetchAll();
	}

	/*PARA DESPLEGAR LOS PRODUCTO QUE ESTEN VISIBLES*/
	static public function mdlMostrarProductoPedido(){
		$stmt = Conexion::conectar()->prepare(
		"select t0.CODIGO_PRODUCTO, concat(t0.NOMBRE_GENERICO, ' - ', t1.PRESENTACION) NOMBRE_GENERICO
			from producto t0
					join presentacion t1 on t1.CODIGO_PRESENTACION = t0.CODIGO_PRESENTACION
			where t1.visible = 1;");
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

}
