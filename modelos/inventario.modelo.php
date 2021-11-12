<?php
require_once "conexion.php";
class ModeloInventario{

	/*=============================================
	CREAR INVENTARIO
	=============================================*/

	static public function mdlIngresarProductoInventario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CODIGO_PROVEEDOR, CODIGO_PRODUCTO, CODIGO_BARRA, STOCK, PRECIO_COMPRA, PRECIO_VENTA, FECHA_INGRESO, CADUCIDAD) VALUES (:nuevoProveedorInventario, :nuevoCodigoProductoInventario, :nuevoCodigoProductoInventario, :nuevoCantidadProductoInventario, :nuevoPrecioCompraInventario , :nuevoPrecioVentaInventario , :nuevoFechaIngresoInventario, :nuevoFechaCaducidadInventario)");
		$stmt->bindParam(":nuevoProveedorInventario", $datos["CODIGO_PROVEEDOR"], PDO::PARAM_INT);
		$stmt->bindParam(":nuevoCodigoProductoInventario", $datos["CODIGO_PRODUCTO"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoCodigoProductoInventario", $datos["CODIGO_BARRA"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoCantidadProductoInventario", $datos["STOCK"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoPrecioCompraInventario", $datos["PRECIO_COMPRA"], PDO::PARAM_INT);
		$stmt->bindParam(":nuevoPrecioVentaInventario", $datos["PRECIO_VENTA"], PDO::PARAM_INT);
		$stmt->bindParam(":nuevoFechaIngresoInventario", $datos["FECHA_INGRESO"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoFechaCaducidadInventario", $datos["CADUCIDAD"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR PRODUCTO INVENTARIO
	=============================================*/

	static public function mdlMostrarProductoInventario($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT t0.CODIGO_PROVEEDOR, t0.CODIGO_PRODUCTO,
				T0.CODIGO_INVENTARIO, T2.NOMBRE_PROVEEDOR,
				T1.NOMBRE_GENERICO,  T1.CODIGO_BARRAS, T0.STOCK, T0.PRECIO_COMPRA,
				T0.PRECIO_VENTA, T0.FECHA_INGRESO, T0.CADUCIDAD
                                              FROM INVENTARIO T0
                                              JOIN PRODUCTO T1 ON T1.CODIGO_PRODUCTO = T0.CODIGO_PRODUCTO
                                              JOIN PROVEEDOR T2 ON T2.CODIGO_PROVEEDOR = T0.CODIGO_PROVEEDOR
                                              WHERE T1.VISIBLE = 1 AND T2.VISIBLE = 1
																						AND $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT T0.CODIGO_INVENTARIO, t0.CODIGO_PROVEEDOR, t0.CODIGO_PRODUCTO, T2.NOMBRE_PROVEEDOR, T1.NOMBRE_GENERICO,  T1.CODIGO_BARRAS, T0.STOCK, T0.PRECIO_COMPRA, T0.PRECIO_VENTA, T0.FECHA_INGRESO, T0.CADUCIDAD
                                              FROM INVENTARIO T0
                                              JOIN PRODUCTO T1 ON T1.CODIGO_PRODUCTO = T0.CODIGO_PRODUCTO
                                              JOIN PROVEEDOR T2 ON T2.CODIGO_PROVEEDOR = T0.CODIGO_PROVEEDOR
                                            WHERE T1.VISIBLE = 1 AND T2.VISIBLE = 1");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	EDITAR PRODUCTO DEL INVENTARIO
	=============================================*/

	static public function mdlEditarProductoInventario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"UPDATE $tabla
		SET
		  CODIGO_PROVEEDOR = :editarProveedorInventario,
			CODIGO_PRODUCTO = :editarProductoInventario,
			CODIGO_BARRA = :editarProductoInventario,
			STOCK = :editarCantidadProductoInventario,
			PRECIO_COMPRA = :editarPrecioCompraInventario,
			PRECIO_VENTA = :editarPrecioVentaInventario,
			FECHA_INGRESO = :editarFechaIngresoInventario,
			CADUCIDAD = :editarFechaCaducidadInventario
		WHERE CODIGO_INVENTARIO = :idInventario");

		$stmt->bindParam(":idInventario", $datos["CODIGO_INVENTARIO"], PDO::PARAM_INT);
		$stmt->bindParam(":editarProveedorInventario", $datos["CODIGO_PROVEEDOR"], PDO::PARAM_INT);
		$stmt->bindParam(":editarProductoInventario", $datos["CODIGO_PRODUCTO"], PDO::PARAM_STR);
		$stmt->bindParam(":editarProductoInventario", $datos["CODIGO_BARRA"], PDO::PARAM_STR);
		$stmt->bindParam(":editarCantidadProductoInventario", $datos["STOCK"], PDO::PARAM_STR);
		$stmt->bindParam(":editarPrecioCompraInventario", $datos["PRECIO_COMPRA"], PDO::PARAM_STR);
		$stmt->bindParam(":editarPrecioVentaInventario", $datos["PRECIO_VENTA"], PDO::PARAM_STR);
		$stmt->bindParam(":editarFechaIngresoInventario", $datos["FECHA_INGRESO"], PDO::PARAM_STR);
		$stmt->bindParam(":editarFechaCaducidadInventario", $datos["CADUCIDAD"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR PRODUCTO DEL INVETNARIO
	=============================================*/
	static public function mdlEliminarProductoInventario($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE CODIGO_INVENTARIO = :idInventario");
		$stmt -> bindParam(":idInventario", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt ->close();
		$stmt = null;
	}


	/*PARA DESPLEGAR LOS PROVEEDORES*/
	static public function mdlMostrarProveedorInventarioSelect(){
    $stmt = Conexion::conectar()->prepare(
		"select CODIGO_PROVEEDOR, NOMBRE_PROVEEDOR
		from PROVEEDOR
		where VISIBLE = 1;");
    $stmt -> execute();
    return $stmt -> fetchAll();
	}

	/*PARA DESPLEGAR LOS PRODUCTOS*/
	static public function mdlMostrarProductoSelect(){
    $stmt = Conexion::conectar()->prepare(
		"select t0.CODIGO_PRODUCTO, concat(t0.NOMBRE_GENERICO, ' - ', t1.PRESENTACION) NOMBRE_GENERICO
		from PRODUCTO t0
		    join PRESENTACION t1 on t1.CODIGO_PRESENTACION = t0.CODIGO_PRESENTACION
		where t1.VISIBLE = 1 AND t0.VISIBLE=1;");
    $stmt -> execute();
    return $stmt -> fetchAll();
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

	static public function mdlActualizarInventario($tablaProductos, $item,$item1, $valor, $valor1){
		$stmt=Conexion::conectar()->prepare("update inventario set STOCK = :inventario where CODIGO_INVENTARIO = :id_valor;");
		$stmt->bindParam(":inventario",$valor1,PDO::PARAM_INT);
		$stmt->bindParam(":id_valor",$valor,PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt ->close();
		$stmt = null;
	}


}
