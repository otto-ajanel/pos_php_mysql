<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxInventario{

    /* EDITAR INVENTARIO */

    public $idinventario;

    public function ajaxEditarInventario(){

        $item = "codigo_inventario";
        $valor = $this -> idinventario;

        $respuesta = ControladorInventario::ctrMostrarInventarioMaster($item, $valor);

        echo json_encode($respuesta);
    }


}

/*=============================================
EDITAR INVENTARIO
=============================================*/
if(isset($_POST["idinventario"])){

	$editar = new AjaxInventario();
	$editar -> idinventario = $_POST["idinventario"];
	$editar -> ajaxEditarInventario();

}
