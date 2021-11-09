<?php

require_once "conexion.php";

class ModeloCaducidad{

	/*=============================================
	MOSTRAR CADUCIDAD
	=============================================*/
	static public function mdlMostrarCaducidad($tabla, $item, $valor){

		if($item != null){
			$stmt = Conexion::conectar()->prepare(
        "SELECT T0.CODIGO_INVENTARIO, T2.NOMBRE_GENERICO, T3.PRESENTACION, T4.TIPO_PRODUCTO, T0.CANTIDAD_PRODUCTO, T0.CADUCIDAD
          	FROM INVENTARIO T0
          	JOIN ASIGNACION_PRODUCTO T1 ON T0.CODIGO_ASIGNACION = T1.CODIGO_ASIGNACION
          	JOIN PRODUCTO T2 ON T1.CODIGO_PRODUCTO = T2.CODIGO_PRODUCTO
          	JOIN PRESENTACION T3 ON T1.CODIGO_PRESENTACION = T3.CODIGO_PRESENTACION
              JOIN TIPO_PRODUCTO T4 ON T1.CODIGO_TIPO = T4.CODIGO_TIPO
          WHERE T2.VISIBLE = 1;
          AND $item = $valor"
      );

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT T0.CODIGO_INVENTARIO, T2.NOMBRE_GENERICO, T3.PRESENTACION, T4.TIPO_PRODUCTO, T0.CANTIDAD_PRODUCTO, T0.CADUCIDAD
          FROM INVENTARIO T0
          JOIN ASIGNACION_PRODUCTO T1 ON T0.CODIGO_ASIGNACION = T1.CODIGO_ASIGNACION
          JOIN PRODUCTO T2 ON T1.CODIGO_PRODUCTO = T2.CODIGO_PRODUCTO
          JOIN PRESENTACION T3 ON T1.CODIGO_PRESENTACION = T3.CODIGO_PRESENTACION
            JOIN TIPO_PRODUCTO T4 ON T1.CODIGO_TIPO = T4.CODIGO_TIPO
        WHERE T2.VISIBLE = 1");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;

	}
}
