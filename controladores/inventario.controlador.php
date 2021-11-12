<?php
class ControladorInventario{

	/*=============================================
	CREAR INVENTARIO
	=============================================*/

	static public function ctrCrearInventario(){

		if(isset($_POST["nuevoProveedorInventario"]) &&
			 isset($_POST["nuevoCodigoProductoInventario"]) &&
		   isset($_POST["nuevoPrecioCompraInventario"]) &&
		 	 isset($_POST["nuevoPrecioVentaInventario"]) &&
       isset($_POST["nuevoFechaIngresoInventario"]) &&
       isset($_POST["nuevoFechaCaducidadInventario"])){

			if(preg_match('/^[0-9.]+$/', $_POST["nuevoCantidadProductoInventario"]) &&
			   preg_match('/^[0-9. ]+$/', $_POST["nuevoPrecioCompraInventario"]) &&
				 preg_match('/^[0-9. ]+$/', $_POST["nuevoPrecioVentaInventario"])){

			   	$tabla = "INVENTARIO";
			   	$datos = array(
												 "CODIGO_PROVEEDOR"=>$_POST["nuevoProveedorInventario"],
												 "CODIGO_PRODUCTO"=>$_POST["nuevoCodigoProductoInventario"],
							           "CODIGO_BARRA"=>$_POST["nuevoCodigoProductoInventario"],
												 "STOCK"=>$_POST["nuevoCantidadProductoInventario"],
												 "PRECIO_COMPRA"=>$_POST["nuevoPrecioCompraInventario"],
												 "PRECIO_VENTA"=>$_POST["nuevoPrecioVentaInventario"],
												 "FECHA_INGRESO"=>$_POST["nuevoFechaIngresoInventario"],
							           "CADUCIDAD"=>$_POST["nuevoFechaCaducidadInventario"]);

					echo '<scrip> alert(" venta = '.$datos["PRECIO_VENTA"].'")</scrip>';



					$respuesta = ModeloInventario::mdlIngresarProductoInventario($tabla, $datos);

			   	if($respuesta == "ok"){
					echo'<script>

					swal({
						  type: "success",
						  title: "El registro del producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inventario";
									}
								})
					</script>';
				}

			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "inventario";
							}
						})
			  	</script>';
			}
		}
	}


	/*=============================================
	MOSTRAR INVENTARIO
	=============================================*/
	static public function ctrMostrarProductoInventario($item, $valor){
		$tabla = "INVENTARIO";
		$respuesta = ModeloInventario::mdlMostrarProductoInventario($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	EDITAR INVENTARIO
	=============================================*/
	static public function ctrEditarProductoInventario(){

		if(isset($_POST["editarProveedorInventario"]) &&
			 isset($_POST["editarProductoInventario"]) &&
			 isset($_POST["editarCantidadProductoInventario"]) &&
			 isset($_POST["editarPrecioCompraInventario"]) &&
			 isset($_POST["editarPrecioVentaInventario"]) &&
		 	 isset($_POST["editarFechaIngresoInventario"]) &&
	     isset($_POST["editarFechaCaducidadInventario"])){

				if(preg_match('/^[0-9.]+$/', $_POST["editarCantidadProductoInventario"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompraInventario"]) &&
   				 preg_match('/^[0-9. ]+$/', $_POST["editarPrecioVentaInventario"])){

				$tabla = "INVENTARIO";

				$datos = array("CODIGO_INVENTARIO"=>$_POST["idInventario"],
											 "CODIGO_PROVEEDOR"=>$_POST["editarProveedorInventario"],
											 "CODIGO_PRODUCTO"=>$_POST["editarProductoInventario"],
											 "CODIGO_BARRA"=>$_POST["editarProductoInventario"],
											 "STOCK"=>$_POST["editarCantidadProductoInventario"],
											 "PRECIO_COMPRA"=>$_POST["editarPrecioCompraInventario"],
											 "PRECIO_VENTA"=>$_POST["editarPrecioVentaInventario"],
											 "FECHA_INGRESO"=>$_POST["editarFechaIngresoInventario"],
											 "CADUCIDAD"=>$_POST["editarFechaCaducidadInventario"]);

				$respuesta = ModeloInventario::mdlEditarProductoInventario($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El registro del producto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inventario";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inventario";
							}
						})
			  	</script>';
			}
		}
	}

	/*=============================================
	ELIMINAR INVENTARIO
	=============================================*/
	static public function ctrEliminarProductoInventario(){

		if(isset($_GET["idInventario"])){
			$tabla ="INVENTARIO";
			$datos = $_GET["idInventario"];
			$respuesta = ModeloInventario::mdlEliminarProductoInventario($tabla, $datos);

			if($respuesta == "ok"){
				echo'<script>
					swal({
						  type: "success",
						  title: "El registro ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inventario";
									}
								})
					</script>';
			}
		}
	}

<<<<<<< HEAD
        $tabla = "inventario";

        $respuesta = ModeloInventario::MdlMostrarInventario($tabla, $item, $valor);
=======

>>>>>>> origin/rocio

 /*PARA MOSTRAR EL PROVEEDOR DE INVENTARIO*/
	static public function ctrMostrarProveedorInventario(){
		$respuesta = ModeloInventario::mdlMostrarProveedorInventarioSelect();
		return $respuesta;
	}

	/*PARA MOSTRAR El PRODUCTO DEL INVENTARIO*/
 	static public function ctrMostrarInventarioProducto(){
 		$respuesta = ModeloInventario::mdlMostrarProductoSelect();
 		return $respuesta;
 	}

<<<<<<< HEAD
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
=======
}
>>>>>>> origin/rocio
