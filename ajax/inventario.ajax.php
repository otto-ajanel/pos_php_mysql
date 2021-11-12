<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxInventario{
<<<<<<< HEAD

    /* EDITAR INVENTARIO */

    public $idinventario;

    public function ajaxEditarInventario(){
        
        $item = "codigo_inventario";
        $valor = $this -> idinventario;

        $respuesta = ControladorInventario::ctrMostrarInventarioMaster($item, $valor);

        echo json_encode($respuesta);
    }


=======
	/*=============================================
	EDITAR INVENTARIO
	=============================================*/
	public $idInventario;
	public function ajaxEditarProductoInventario(){
		$item = "CODIGO_INVENTARIO";
		$valor = $this->idInventario;
		$respuesta = ControladorInventario::ctrMostrarProductoInventario($item, $valor);
		echo json_encode($respuesta);
	}
>>>>>>> origin/rocio
}

/*=============================================
EDITAR INVENTARIO
=============================================*/
<<<<<<< HEAD
if(isset($_POST["idinventario"])){

	$editar = new AjaxInventario();
	$editar -> idinventario = $_POST["idinventario"];
	$editar -> ajaxEditarInventario();

=======
if(isset($_POST["idInventario"])){
	$producto = new AjaxInventario();
	$producto -> idInventario = $_POST["idInventario"];
	$producto -> ajaxEditarProductoInventario();
>>>>>>> origin/rocio
}
