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

}
