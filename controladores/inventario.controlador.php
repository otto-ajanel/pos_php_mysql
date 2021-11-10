<?php

class ControladorInventario{

  /*=============================================
  CREAR INVENTARIO
  =============================================*/

  static public function ctrCrearTablaInventario(){

    if(isset($_POST["idProducto"]) &&
       isset($_POST["nuevoProveedorPedido"]) &&
       isset($_POST["nuevoCantidadProductoInventario"]) &&
       isset($_POST["nuevoPrecioCompraInventario"]) &&
       isset($_POST["nuevoPrecioVentaInventario"]) &&
       isset($_POST["nuevoFechaIngresoInventario"]) &&
       isset($_POST["nuevoFechaCaducidadInventario"])){

      if(preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompraInventario"]) &&
         preg_match('/^[0-9. ]+$/', $_POST["nuevoPrecioVentaInventario"])){

          $tabla = "INVENTARIO";
          $datos = array(
                         "CODIGO_PRODUCTO"=>$_POST["idProducto"],
                         "CODIGO_INVENTARIO"=>$_POST["nuevoProveedorPedido"],
                         "STOCK"=>$_POST["nuevoCantidadProductoInventario"],
                         "PRECIO_COMPRA"=>$_POST["nuevoPrecioCompraInventario"],
                         "PRECIO_VENTA"=>$_POST["nuevoPrecioVentaInventario"],
                         "FECHA_INGRESO"=>$_POST["nuevoFechaIngresoInventario"],
                         "CADUCIDAD"=>$_POST["nuevoFechaCaducidadInventario"]);

          $respuesta = ModeloInventario::mdlIngresarProductoInventario($tabla, $datos);

          if($respuesta == "ok"){
          echo'<script>

          swal({
              type: "success",
              title: "El producto ha sido guardado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                  if (result.value) {

                  window.location = "ingreso-inventario-producto";
                  }
                })
          </script>';
        }

      }else{
        echo'<script>
          swal({
              type: "error",
              title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
              if (result.value) {
              window.location = "ingreso-inventario-producto";
              }
            })
          </script>';
      }
    }
  }



  /*  MOSTRAR INVENTARIO */

    static public function ctrMostrarInventario($item,$valor){

        $tabla = "inventario";

        $respuesta = ModeloInventario::MdlMostrraInventario ($tabla, $item, $valor);

        return $respuesta;


    }

    static public function ctrMostrarInventarioMaster($item,$valor){

        $tabla = "inventario";

        $respuesta = ModeloInventario::MdlMostrarInventarioMaster ($tabla, $item, $valor);

        return $respuesta;


    }

    /*=============================================
  	MOSTRAR LISTA INVENTARIO
  	=============================================*/
  	static public function ctrMostrarListaInventario($item, $valor){
  		$tabla = "INVENTARIO";
  		$respuesta = ModeloInventario::mdlMostrarListaInventario($tabla, $item, $valor);
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
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
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
  }

/*BORRAR USUARIO*/

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
