<?php

class ControladorInventario{

    /*  MOSTRAR INVENTARIO */

    static public function ctrMostrarInventario($item,$valor){

        $tabla = "inventario_detalle";

        $respuesta = ModeloInventario::MdlMostrarInventario ($tabla, $item, $valor);

        return $respuesta;


    }
}
?>