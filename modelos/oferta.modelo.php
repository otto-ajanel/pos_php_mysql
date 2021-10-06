<?php

require_once("conexion.php");

class ModeloOfertas{
    static public function mdlMostrarOfertas($tabla, $item, $valor){
        /* Este if es para hacer una consulta con el ID de oferta*/
        if ($item !=NULL) {
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
        }
        else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		$stmt -> close();

		$stmt = null;
    }
    /*=============================================
	REGISTRO DE OFERTAS
	=============================================*/
    static public function mdlIngresarOfertas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE, USUARIO, CONTRASEÑA, CODIGO_ROL, URL) VALUES (:nombre, :usuario, :password, :perfil, :foto)");

		$stmt->bindParam(":codigo de barras", $datos["CODIGO DE BARRAS"], PDO::PARAM_STR);
		$stmt->bindParam(":producto", $datos["PRODUCTO"], PDO::PARAM_STR);
		$stmt->bindParam(":prentacion", $datos["PRESENTACION"], PDO::PARAM_STR);
		$stmt->bindParam(":oferta", $datos["OFERTA"], PDO::PARAM_STR);
		$stmt->bindParam(":desde", $datos["DESDE"], PDO::PARAM_STR);
        $stmt->bindParam(":hasta", $datos["DESDE"], PDO::PARAM_STR);
        if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
}