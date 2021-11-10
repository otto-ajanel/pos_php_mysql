<?php

require_once "conexion.php";

class ModeloInventario{



  /*=============================================
  CREAR INVENTARIO
  =============================================*/

  static public function mdlIngresarProductoInventario($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CODIGO_PROVEEDOR, CODIGO_PRODUCTO, STOCK, CODIGO_BARRAS, PRECIO_COMPRA, PRECIO_VENTA, FECHA_INGRESO, CADUCIDAD) VALUES (:idProducto, :nuevoProveedorPedido, :nuevoCantidadProductoInventario, :nuevoPrecioCompraInventario, :nuevoPrecioVentaInventario , :nuevoFechaIngresoInventario , :nuevoFechaCaducidadInventario)");
    $stmt->bindParam(":idProducto", $datos["CODIGO_PRODUCTO"], PDO::PARAM_INT);
    $stmt->bindParam(":nuevoProveedorPedido", $datos["CODIGO_PROVEEDOR"], PDO::PARAM_STR);
    $stmt->bindParam(":nuevoCantidadProductoInventario", $datos["STOCK"], PDO::PARAM_STR);
    $stmt->bindParam(":nuevoPrecioCompraInventario", $datos["PRECIO_COMPRA"], PDO::PARAM_STR);
    $stmt->bindParam(":nuevoPrecioVentaInventario", $datos["PRECIO_VENTA"], PDO::PARAM_STR);
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


    /* MOSTRAR INVENTARIO */
    static public function MdlMostrarInventario($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()-> prepare ("SELECT T1.nombre_comercial, T0.stock, T0.caducidad, T0.precio_venta
                                                        FROM inventario T0
                                                        INNER JOIN producto T1 ON T0.CODIGO_PRODUCTO = T1.CODIGO_PRODUCTO
                                                        WHERE T1.VISIBLE = 1
                                                        AND $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }
        else
        {
            $stmt = Conexion::conectar()-> prepare("SELECT T1.nombre_comercial, T0.stock, T0.caducidad, T0.precio_venta
                                                        FROM inventario T0
                                                        INNER JOIN producto T1 ON T0.CODIGO_PRODUCTO = T1.CODIGO_PRODUCTO
                                                        WHERE T1.VISIBLE = 1");

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


    /* MOSTRAR INVENTARIO  MASTER*/

    static public function MdlMostrarInventarioMaster($tabla, $item, $valor){

        if($item != null){
            /*

            $stmt = Conexion::conectar()-> prepare ("SELECT * FROM $tabla WHERE $item = :$item");
            */



            $stmt = Conexion::conectar()-> prepare ("SELECT T1.nombre_comercial, T0.stock, T0.caducidad, T0.precio_venta, T0.fecha_ingreso, T0.precio_compra, T0.codigo_inventario
            FROM inventario T0
            INNER JOIN producto T1 ON T0.CODIGO_PRODUCTO = T1.CODIGO_PRODUCTO
            WHERE T1.VISIBLE = 1
            AND $item = :$item
            ");


            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }
        else
        {

            $stmt = Conexion::conectar()-> prepare("SELECT T1.nombre_comercial, T0.stock, T0.caducidad, T0.precio_venta, T0.fecha_ingreso, T0.precio_compra, T0.codigo_inventario
            FROM inventario T0
            INNER JOIN producto T1 ON T0.CODIGO_PRODUCTO = T1.CODIGO_PRODUCTO
            WHERE T1.VISIBLE = 1");

            $stmt->execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;


    }


    /* EDITAR INVENTARIO */

    static public function mdlEditarInventario($tabla, $datos){


        /*
        echo '<script>alert (" id para cambiar '.$datos["codigo_inventario"].' en tabla");</script>';

        echo '<script>alert (" venta para cambiar '.$datos["precio_venta"].' en tabla");</script>';


        echo '<script>alert (" compra para cambiar '.$datos["precio_compra"].' en tabla");</script>';

        echo '<script>alert (" vencimiento para cambiar '.$datos["caducidad"].' en tabla");</script>';

        echo '<script>alert (" stock para cambiar '.$datos["stock"].' en tabla");</script>';*/





        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET precio_venta = :precioventa,
        precio_compra = :preciocompra, caducidad = :caducidad, stock = :stock
        WHERE CODIGO_INVENTARIO = :idinventario");

            $stmt->bindParam(":idinventario", $datos["codigo_inventario"], PDO::PARAM_STR);
            $stmt->bindParam(":precioventa", $datos["precio_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":preciocompra", $datos["precio_compra"], PDO::PARAM_STR);
            $stmt->bindParam(":caducidad", $datos["caducidad"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);

            if($stmt->execute()){

                echo'<script> alert("Entro a modelo editar return ok "); </script>';

                return "ok";

            }
            else
            {

                echo'<script> alert("Entro a modelo editar return error "); </script>';

                return "error";
            }
            $stmt->close();

            $stmt = null;


    }






    static public function mdlBorrarInventario($tabla, $datos){

        $stmt = Conexion::conectar()-> prepare ("DELETE FROM $tabla WHERE codigo_inventario = :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_STR);

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
