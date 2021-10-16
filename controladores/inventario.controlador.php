<?php

class ControladorInventario{

    /*  MOSTRAR INVENTARIO */

    static public function ctrMostrarInventario($item,$valor){

        $tabla = "inventario_detalle";

        $respuesta = ModeloInventario::MdlMostrarInventario ($tabla, $item, $valor);

        return $respuesta;


    }

    static public function ctrMostrarInventarioMaster($item,$valor){

        $tabla = "inventario_detalle";

        $respuesta = ModeloInventario::MdlMostrarInventarioMaster ($tabla, $item, $valor);

        return $respuesta;


    }
}
?>