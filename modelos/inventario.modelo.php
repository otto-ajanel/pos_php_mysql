<?php

require_once "conexion.php";

class ModeloInventario{

    /* MOSTRAR INVENTARIO */

    static public function MdlMostrarInventario($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()-> prepare ("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }
        else
        {
            $stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }
    static public function MdlActualizarInventario($tabla, $item,$item1, $valor, $valor1){
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item1=:valor1 WHERE $item=:valor");
        $stmt->bindParam(":valor",$valor,PDO::PARAM_INT);
        $stmt->bindParam(":valor1",$valor1,PDO::PARAM_INT);
        if ($stmt->execute()) {
            # code...
            return "ok";
        }else {
            # code...
            return "error";
        }
            
        $stmt->close();
        $stmt=null;
    }

}

?>