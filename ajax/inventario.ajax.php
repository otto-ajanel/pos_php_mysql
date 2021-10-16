<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxInventario{

    /* EDITAR INVENTARIO */

    public $idInventario;

    public function ajaxEditarInventario(){
        
        $item = "codigo";
        $valor = $this -> idInventario;

        $respuesta = ControladorInventario::ctrMostrarInventarioMaster($item, $valor);

        echo json_decode($respuesta);
    }


}

/*=============================================
EDITAR INVENTARIO
=============================================*/
if(isset($_POST["idInventario"])){

	$editar = new AjaxInventario();
	$editar -> idInventario = $_POST["idInventario"];
	$editar -> ajaxEditarInventario();

}



?>