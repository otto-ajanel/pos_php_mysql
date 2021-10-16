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

    /* controlador editar inventario */

    static public function ctrEditarInventario(){

        if(isset($_POST["editarInventario"])){

            $tabla = "inventario_detalle";

            $datos = array(
                "caducidad" => $_POST["fvencimiento"],
                "precio_compra" => $_POST["unidades"],
                "precio_venta" => $_POST["preciocompra"],
                "precioventa" => $_POST["precioventa"]
            );
            
            $respuesta = ModeloInventrio::mdlEditarInventario($tabla, $datos);

            if($respuesta == "ok"){
                echo'
                <script>

					swal({
						  type: "success",
						  title: "inventario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "ingreso-inventario15776.php";

									}
								})

					</script>
                ';
            }
            else
            {
                echo'
                <script>

					swal({
						  type: "success",
						  title: "Error inesperado en el cambio",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "ingreso-inventario15776.php";

									}
								})

					</script>
                ';
            }
            

        }
    }
}
?>