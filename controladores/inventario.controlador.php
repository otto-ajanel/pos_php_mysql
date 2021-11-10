<?php

class ControladorInventario{

    /*  MOSTRAR INVENTARIO */

    static public function ctrMostrarInventario($item,$valor){

        $tabla = "inventario";

        $respuesta = ModeloInventario::MdlMostrarInventario($tabla, $item, $valor);

        return $respuesta;


    }

    static public function ctrMostrarInventarioMaster($item,$valor){

        $tabla = "inventario";

        $respuesta = ModeloInventario::MdlMostrarInventarioMaster ($tabla, $item, $valor);

        return $respuesta;


    }

    /* controlador editar inventario */

    static public function ctrEditarInventario(){


        if(isset($_POST["precioventa"]) &&
			 isset($_POST["preciocompra"]) &&
			 isset($_POST["fvencimiento"]) &&
			 isset($_POST["stock"])
			){

				if( preg_match('/^[0-9.]+$/', $_POST["precioventa"]) &&
					preg_match('/^[0-9.]+$/', $_POST["preciocompra"])){


				        $tabla = "inventario";

                        $datos = array("codigo_inventario"=>$_POST["idinventario"],
                                        "precio_venta"=>$_POST["precioventa"],
                                        "precio_compra"=>$_POST["preciocompra"],
                                        "caducidad"=>$_POST["fvencimiento"],
                                        "stock"=>$_POST["stock"]);

                                        echo'<script> alert("Entro a controladro "); </script>';

                        $respuesta = ModeloInventario::mdlEditarInventario($tabla, $datos);
                
				        if($respuesta == "ok"){
                        echo'<script>
                        swal({
                            type: "success",
                            title: "El producto ha sido cambiado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {

                                            window.location = "ingreso-inventario15776";
                                        }
                                    })
                        </script>';
                    }
			else{
				echo'<script>
					swal({
						  type: "error",
						  title: "Error inesperado no se puede modificar stock",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

                                window.location = "ingreso-inventario15776";
							}
						})
			  	</script>';
			}
		}



        /*
        if(isset($_POST["fvencimiento"]) &&
           isset($_POST["stock"]) &&
           isset($_POST["preciocompra"]) &&
           isset($_POST["precioventa"])
        ){

            if( preg_match('/^[0-9.]+$/', $_POST["stock"]) &&
				preg_match('/^[0-9.]+$/', $_POST["preciocompra"])
                preg_match('/^[0-9.]+$/', $_POST["precioventa"])                     
                ){

				$tabla = "inventario";

            /*echo'

                    <script text="javascript">

                        console.log("la variable si esta ");

                

                        alert("SI SI esta definida la variable");

                    </script>


          

            ';

            $tabla = "inventario";

            $datos = array(
                "caducidad" => $_POST["fvencimiento"],
                "stock" => $_POST["stock"],
                "precio_compra" => $_POST["preciocompra"],
                "precio_venta" => $_POST["precioventa"],
                "codigo_inventario" => $_POST["idinventario"]
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

                                        window.location = "ingreso-inventario15776";

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

                                        window.location = "ingreso-inventario15776";

									}
								})

					</script>
                ';
            }
            

        }
        /*else
            {
            echo'

                    <script text="javascript">

                        console.log("la variable no esta definida");

                

                        alert("no esta definida la variable");

                    </script>


          

            ';
            }*/
       
        
    }

}

    /*
BORRAR USUARIO
*/

    static public function crtBorrarInventario(){

        if(isset($_GET["idInventario"])){

            echo'<script> alert("SI esta definida la variable para borrar"); </script>';
            $tabla = "inventario";
            $datos = $_GET["idInventario"];

            $respuesta = ModeloInventario::mdlBorrarInventario($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "ingreso-inventario15776";

								}
							})

				</script>';
                
            }
            else
            {

                echo'
                <script>

					swal({
						  type: "success",
						  title: "Error inesperado !! no se puede borrar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

                                        window.location = "ingreso-inventario15776";

									}
								})

					</script>
                ';
            }



            
        }
        else
        {
            echo'<script> alert("NO esta definida la variable para borrar"); </script>';
        }


    }
}


?>