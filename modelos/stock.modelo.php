<?php

require_once "conexion.php";

class ModeloStock{

	/*=============================================
	MOSTRAR STOCK
	=============================================*/
	static public function mdlMostrarStock($tabla, $item, $valor){

		if($item != null){
			$stmt = Conexion::conectar()->prepare(
        "SELECT T1.NOMBRE_GENERICO, T2.PRESENTACION, T3.CLASIFICACION, T4.TIPO_PRODUCTO, T1.STOCK_MIN, T0.STOCK
          	FROM INVENTARIO T0
          	JOIN PRODUCTO T1 ON T1.CODIGO_PRODUCTO = T0.CODIGO_PRODUCTO
          	JOIN PRESENTACION T2 ON T2.CODIGO_PRESENTACION = T1.CODIGO_PRESENTACION
            JOIN CLASIFICACION T3 ON T3.CODIGO_CLASIFICACION = T1.CODIGO_CLASIFICACION
            JOIN TIPO_PRODUCTO T4 ON T4.CODIGO_TIPO = T1.CODIGO_TIPO
          WHERE T1.VISIBLE = 1
          ORDER BY T0.STOCK ASC
          AND $item = $valor");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{
			$stmt = Conexion::conectar()->prepare(
			"SELECT T1.NOMBRE_GENERICO, T2.PRESENTACION, T3.CLASIFICACION, T4.TIPO_PRODUCTO, T1.STOCK_MIN, T0.STOCK
      	FROM INVENTARIO T0
      	JOIN PRODUCTO T1 ON T1.CODIGO_PRODUCTO = T0.CODIGO_PRODUCTO
      	JOIN PRESENTACION T2 ON T2.CODIGO_PRESENTACION = T1.CODIGO_PRESENTACION
        JOIN CLASIFICACION T3 ON T3.CODIGO_CLASIFICACION = T1.CODIGO_CLASIFICACION
        JOIN TIPO_PRODUCTO T4 ON T4.CODIGO_TIPO = T1.CODIGO_TIPO
      WHERE T1.VISIBLE = 1
      ORDER BY T0.STOCK ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;

	}
}
