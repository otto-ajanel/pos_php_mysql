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

        if(isset($_POST["fvencimiento"])){

            echo'

                    <script text="javascript">

                        console.log("la variable si esta ");

                

                        alert("SI SI esta definida la variable");

                    </script>


          

            ';

            $tabla = "inventario_detalle";

            /*$idcambio = $_GET["idInventario"];*/

            $datos = array(
                "caducidad" => $_POST["fvencimiento"],
                "unidades" => $_POST["unidades"],
                "precio_compra" => $_POST["preciocompra"],
                "precio_venta" => $_POST["precioventa"],
                "codigo" => $_POST["idinventario1"]
            );


            
            $respuesta = ModeloInventario::mdlEditarInventario($tabla, $datos);

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

                                        window.location.href;

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

									window.location.href;

									}
								})

					</script>
                ';
            }
            

        }
        else
        {
            echo'

                    <script text="javascript">

                        console.log("la variable no esta definida");

                

                        alert("no esta definida la variable");

                    </script>


          

            ';
        }
       
        
    }
}
?>