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

    

}


?>