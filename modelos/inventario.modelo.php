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
            $stmt = Conexion::conectar()-> prepare("SELECT nombre_comercial, unidades, caducidad, precio_venta
            FROM $tabla
            INNER JOIN producto
            WHERE inventario_detalle.codigo_producto = producto.codigo_producto");

            $stmt->execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }


    /* MOSTRAR INVENTARIO  MASTER*/

    static public function MdlMostrarInventarioMaster($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()-> prepare ("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }
        else
        {
            $stmt = Conexion::conectar()-> prepare("SELECT codigo, fecha_ingreso, nombre_comercial, caducidad, precio_compra, precio_venta, unidades
            FROM $tabla
            INNER JOIN producto
            WHERE inventario_detalle.codigo_producto = producto.codigo_producto
            LIMIT 0 , 30");

            $stmt->execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;

        
    }


    /* EDITAR INVENTARIO */

    static public function mdlEditarInventario($tabla, $datos){

        /*
        echo '<script>alert (" id para cambiar '.$datos["codigo"].' en tabla");</script>';
        */
        

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET caducidad = :caducidad,
        precio_compra = :compra, precio_venta = :venta, unidades = :unidades WHERE codigo = :codigo");

        $stmt -> bindParam(":caducidad", $datos["caducidad"], PDO::PARAM_STR);
        $stmt -> bindParam(":compra", $datos["precio_compra"], PDO::PARAM_STR);
        $stmt -> bindParam(":venta", $datos["precio_venta"], PDO::PARAM_STR);
        $stmt -> bindParam(":unidades", $datos["unidades"], PDO::PARAM_STR);
        $stmt -> bindParam(":codigo", $datos["codigo"] , PDO::PARAM_STR);
        

        if($stmt -> execute()){

            return "ok";
        }
        else
        {
            return "error";
        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlBorrarInventario($tabla, $datos){

        $stmt = Conexion::conectar()-> prepare ("DELETE FROM $tabla WHERE codigo = :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){
            return "ok";
        }
        else
        {
            return "error";
        }

        $stmt -> close();

        $stmt = null;

    }

    

}


?>