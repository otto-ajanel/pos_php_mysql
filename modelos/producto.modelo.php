<?php
require_once "conexion.php";
class ModeloProducto{

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CODIGO_BARRAS, NOMBRE_GENERICO, NOMBRE_COMERCIAL, CODIGO_PRESENTACION, CODIGO_CLASIFICACION, CODIGO_TIPO, STOCK_MIN, STOCK_MAX) VALUES (:nuevoCodigoBarras, :nuevoNombreGenerico, :nuevoNombreComercial, :presentacionProducto, :clasificacionProducto , :tipoproductoProducto , :nuevoStockMinimo, :nuevoStockMaximo)");
		$stmt->bindParam(":nuevoCodigoBarras", $datos["CODIGO_BARRAS"], PDO::PARAM_INT);
		$stmt->bindParam(":nuevoNombreGenerico", $datos["NOMBRE_GENERICO"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoNombreComercial", $datos["NOMBRE_COMERCIAL"], PDO::PARAM_STR);
		$stmt->bindParam(":presentacionProducto", $datos["CODIGO_PRESENTACION"], PDO::PARAM_STR);
		$stmt->bindParam(":clasificacionProducto", $datos["CODIGO_CLASIFICACION"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoproductoProducto", $datos["CODIGO_TIPO"], PDO::PARAM_STR);
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
			$stmt = Conexion::conectar()->prepare("SELECT t0.CODIGO_PRODUCTO, t0.CODIGO_BARRAS, t0.NOMBRE_GENERICO, t0.NOMBRE_COMERCIAL, t1.PRESENTACION, t2.CLASIFICACION, t3.TIPO_PRODUCTO, t0.STOCK_MIN, t0.STOCK_MAX
																								FROM producto t0
																								JOIN presentacion t1 ON t1.CODIGO_PRESENTACION = t0.CODIGO_PRESENTACION
																								JOIN clasificacion t2 ON t2.CODIGO_CLASIFICACION = t0.CODIGO_CLASIFICACION
																								JOIN tipo_producto t3 ON t3.CODIGO_TIPO = t0.CODIGO_TIPO
																								WHERE T0.VISIBLE = 1
																								AND $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT t0.CODIGO_PRODUCTO, t0.CODIGO_BARRAS, t0.NOMBRE_GENERICO, t0.NOMBRE_COMERCIAL, t1.PRESENTACION, t2.CLASIFICACION, t3.TIPO_PRODUCTO, t0.STOCK_MIN, t0.STOCK_MAX
																								FROM producto t0
																								JOIN presentacion t1 ON t1.CODIGO_PRESENTACION = t0.CODIGO_PRESENTACION
																								JOIN clasificacion t2 ON t2.CODIGO_CLASIFICACION = t0.CODIGO_CLASIFICACION
																								JOIN tipo_producto t3 ON t3.CODIGO_TIPO = t0.CODIGO_TIPO
																								WHERE T0.VISIBLE = 1");
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
		  CODIGO_BARRAS = :editarCodigoBarras,
			NOMBRE_GENERICO = :editarNombreGenerico,
			NOMBRE_COMERCIAL = :editarNombreComercial,
			CODIGO_PRESENTACION = :editarpresentacionProducto,
			CODIGO_CLASIFICACION = :editarclasificacionProducto,
			CODIGO_TIPO = :editartipoproductoProducto,
			STOCK_MIN = :editarStockMinimo,
			STOCK_MAX = :editarStockMaximo
		WHERE CODIGO_PRODUCTO = :idProducto");

		$stmt->bindParam(":idProducto", $datos["CODIGO_PRODUCTO"], PDO::PARAM_INT);
		$stmt->bindParam(":editarCodigoBarras", $datos["CODIGO_BARRAS"], PDO::PARAM_INT);
		$stmt->bindParam(":editarNombreGenerico", $datos["NOMBRE_GENERICO"], PDO::PARAM_STR);
		$stmt->bindParam(":editarNombreComercial", $datos["NOMBRE_COMERCIAL"], PDO::PARAM_STR);
		$stmt->bindParam(":editarpresentacionProducto", $datos["CODIGO_PRESENTACION"], PDO::PARAM_STR);
		$stmt->bindParam(":editarclasificacionProducto", $datos["CODIGO_CLASIFICACION"], PDO::PARAM_STR);
		$stmt->bindParam(":editartipoproductoProducto", $datos["CODIGO_TIPO"], PDO::PARAM_STR);
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
		$stmt ->close();
		$stmt = null;
	}
	/* Mostar inventario*/
	static public function mdlMostrarInventario($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT CODIGO_INVENTARIO, CODIGO_BARRA, STOCK,NOMBRE_GENERICO,URL,CLASIFICACION,TIPO_PRODUCTO,PRESENTACION FROM $tabla I
		INNER JOIN producto P
		ON I.CODIGO_PRODUCTO=P.CODIGO_PRODUCTO
		INNER JOIN clasificacion C
		ON P.CODIGO_CLASIFICACION=C.CODIGO_CLASIFICACION
		INNER JOIN presentacion PRE
		on P.CODIGO_PRESENTACION=PRE.CODIGO_PRESENTACION
		INNER JOIN tipo_producto T
		on P.CODIGO_TIPO = T.CODIGO_TIPO");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
	}
	/* Traer informacion de un producto en la tabla de inventario */
	static public function mdlMostrarProductoVenta($tabla,$item,$valor){
		$stmt=Conexion::conectar()->prepare("SELECT CODIGO_INVENTARIO, PRECIO_VENTA,STOCK,NOMBRE_GENERICO FROM $tabla I
		INNER JOIN producto P
		ON I.CODIGO_PRODUCTO=P.CODIGO_PRODUCTO
		WHERE $item=$valor
		");
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt=NULL;
	}


	/*PARA DESPLEGAR LAS PRESENTACIONES QUE ESTEN VISIBLES*/
	static public function mdlMostrarPresentacionProducto(){
		$stmt = Conexion::conectar()->prepare(
		"select CODIGO_PRESENTACION, PRESENTACION
		from PRESENTACION
		where visible = 1;");
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	/*PARA DESPLEGAR LAS CLASIFICACION QUE ESTEN VISIBLES*/
	static public function mdlMostrarClasificacionProducto(){
		$stmt = Conexion::conectar()->prepare(
		"select CODIGO_CLASIFICACION, CLASIFICACION
		from CLASIFICACION
		where visible = 1;");
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	/*PARA DESPLEGAR LAS TIPO DE PRODUCTO QUE ESTEN VISIBLES*/
	static public function mdlMostrarTipoProducto(){
		$stmt = Conexion::conectar()->prepare(
		"select CODIGO_TIPO, TIPO_PRODUCTO
		from TIPO_PRODUCTO
		where visible = 1;");
		$stmt -> execute();
		return $stmt -> fetchAll();
	}
}
