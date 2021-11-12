<?php
class ControladorPedido{

	/*=============================================
	CREAR PEDIDO
	=============================================*/

	static public function ctrCrearPedido(){

			if(isset($_POST["nuevoProveedorPedido"]) &&
				 isset($_POST["nuevaFechaPedido"]) &&
			   isset($_POST["nuevaFechaEstimada"])){
				   	$tabla = "PEDIDO";
				   	$datos = array("CODIGO_PROVEEDOR"=>$_POST["nuevoProveedorPedido"],
								           "FECHA_PEDIDO"=>$_POST["nuevaFechaPedido"],
								           "FECHA_ESTIMADA"=>$_POST["nuevaFechaEstimada"]);

		   	$respuesta = ModeloPedido::mdlIngresarPedido($tabla, $datos);

		   	if($respuesta == "ok"){
				echo'<script>

				swal({
					  type: "success",
					  title: "El pedido ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "pedido";
								}
							})
				</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR PEDIDO
	=============================================*/
	static public function ctrMostrarPedido($item, $valor){
		$tabla = "PEDIDO";
		$respuesta = ModeloPedido::mdlMostrarPedido($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	MOSTRAR LISTA PEDIDO
	=============================================*/
	static public function ctrMostrarListaProducto($item, $valor){
		$tabla = "PEDIDO";
		$respuesta = ModeloPedido::mdlMostrarListaProducto($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	EDITAR PEDIDO
	=============================================*/
	static public function ctrEditarPedido(){

		if(isset($_POST["editarProveedorPedido"]) &&
			 isset($_POST["editarFechaPedido"]) &&
			 isset($_POST["editarFechaEstimada"])){
					$tabla = "PEDIDO";
					$datos = array("NO_ORDEN"=>$_POST["idPedido"],
												 "CODIGO_PROVEEDOR"=>$_POST["editarProveedorPedido"],
												 "FECHA_PEDIDO"=>$_POST["editarFechaPedido"],
												 "FECHA_ESTIMADA"=>$_POST["editarFechaEstimada"]);

				$respuesta = ModeloPedido::mdlEditarPedido($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El pedido ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pedido";
									}
								})
					</script>';
				}
			}
  	}


	/*=============================================
	CREAR DETALLE DEL PEDIDO
	=============================================*/
	static public function ctrCrearDetallePedido(){

		if(isset($_POST["editarCodigoAsignacionDetalle"]) &&
		   isset($_POST["editarCantidadDetallePedido"]) &&
			 isset($_POST["editarPrecioDetallePedido"])
				){

			if(preg_match('/^[0-9]+$/', $_POST["editarCantidadDetallePedido"]) &&
		     preg_match('/^[0-9.]+$/', $_POST["editarPrecioDetallePedido"])){

			   	$tabla = "DETALLE_PEDIDO";
			   	$datos = array("NO_ORDEN"=>$_POST["idDetallePedidoEval"],
							           "CODIGO_PRODUCTO"=>$_POST["editarCodigoAsignacionDetalle"],
												 "CANTIDAD"=>$_POST["editarCantidadDetallePedido"],
												 "PRECIO_UNITARIO"=>$_POST["editarPrecioDetallePedido"]
											 );

			   	$respuesta = ModeloPedido::mdlIngresarDetallePedido($tabla, $datos);

			   	if($respuesta == "ok"){
						echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido agregado al pedido",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "pedido";
										}
									})
						</script>';
					}else{
						echo'<script>
						swal({
							  type: "error",
							  title: "Ocurrió un error en la Base de Datos",
							  showConfirmButton: true,
							  confirmButtonText: "pedido"
							  })
						</script>';
					}

			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡Debe ingresar valores correctos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "pedido";
							}
						})
			  	</script>';
			}
		}
	}




	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/
	static public function ctrEliminarPedido(){

		if(isset($_GET["idPedido"])){
			$tabla ="PEDIDO";
			$datos = $_GET["idPedido"];
			$respuesta = ModeloPedido::mdlEliminarPedido($tabla, $datos);

			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El pedido ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "pedido";
								}
							})

				</script>';

			}
		}
	}

	static public function ctrMostrarProveedorPedido(){
		$respuesta = ModeloPedido::mdlMostrarProveedoresPedidos();
		return $respuesta;
	}

	static public function ctrMostrarProductosPedido(){
		$respuesta = ModeloPedido::mdlMostrarProductoPedido();
		return $respuesta;
	}


}
