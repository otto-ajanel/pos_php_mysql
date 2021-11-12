<?php

require_once "conexion.php";

class ModeloOferta{

	/*=============================================
	MOSTRAR OFERTA
	=============================================*/

	static public function mdlMostrarOferta($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare(
			"SELECT t0.CODIGO_OFERTA, t0.CODIGO_PRODUCTO, t0.DESCUENTO, t0.FECHA_INICIO, t0.FECHA_FIN
				from oferta t0
		    join producto t1 on t1.CODIGO_PRODUCTO = t0.CODIGO_PRODUCTO
		    join presentacion t2 on t2.CODIGO_PRESENTACION = t1.CODIGO_PRESENTACION
		  where t0.CODIGO_OFERTA = $valor");

			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare(
				"SELECT t0.CODIGO_OFERTA, t0.CODIGO_PRODUCTO, concat(t1.NOMBRE_GENERICO, ' - ', t2.PRESENTACION) CODIGO_PRODUCTO, t0.DESCUENTO, t0.FECHA_INICIO, t0.FECHA_FIN
					from oferta t0
			    join producto t1 on t1.CODIGO_PRODUCTO = t0.CODIGO_PRODUCTO
			    join presentacion t2 on t2.CODIGO_PRESENTACION = t1.CODIGO_PRESENTACION");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	REGISTRO DE OFERTA
	=============================================*/
	static public function mdlIngresarOferta($tabla, $datoCodigoAsignacion,$datodescuento, $datofechainicial, $datofechafinal){
		$stmt = Conexion::conectar()->prepare("INSERT INTO oferta(CODIGO_PRODUCTO, DESCUENTO, FECHA_INICIO, FECHA_FIN) VALUES ($datoCodigoAsignacion, $datodescuento, STR_TO_DATE('$datofechainicial','%Y-%m-%d'), STR_TO_DATE('$datofechafinal','%Y-%m-%d'))");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}

	/*=============================================
	EDITAR OFERTA
	=============================================*/

	static public function mdlEditarOferta($tabla, $datos){
		$sql = "
		UPDATE oferta
			SET
				CODIGO_PRODUCTO = ".$datos["CODIGO_PRODUCTO"].",
				DESCUENTO = ".$datos["DESCUENTO"].",
				FECHA_INICIO = STR_TO_DATE('".$datos["FECHA_INICIO"]."','%Y-%m-%d'),
				FECHA_FIN = STR_TO_DATE('".$datos["FECHA_FIN"]."','%Y-%m-%d')
			WHERE CODIGO_OFERTA = ".$datos["CODIGO_OFERTA"];

			echo "<script>
				window.alert(".$sql.")
			</script>";

		$stmt = Conexion::conectar()->prepare($sql);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
	}

	/*=============================================
	BORRAR OFERTA
	=============================================*/

	static public function mdlBorrarOferta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE CODIGO_OFERTA = :idOferta");
		$stmt -> bindParam(":idOferta", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}
}
