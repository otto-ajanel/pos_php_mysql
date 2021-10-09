<?php
class ControladorProducto{

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){

		if(isset($_POST["nuevoNombreGenerico"]) &&
			 isset($_POST["nuevoNombreComercial"]) &&
			  isset($_POST["nuevoStockMinimo"]) &&
		   isset($_POST["nuevoStockMaximo"])){

			if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreGenerico"]) &&
				 preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreComercial"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoStockMinimo"]) &&
			   preg_match('/^[0-9. ]+$/', $_POST["nuevoStockMaximo"])){

			   	$tabla = "PRODUCTO";
			   	$datos = array("NOMBRE_GENERICO"=>$_POST["nuevoNombreGenerico"],
							           "NOMBRE_COMERCIAL"=>$_POST["nuevoNombreComercial"],
												 "STOCK_MIN"=>$_POST["nuevoStockMinimo"],
							           "STOCK_MAX"=>$_POST["nuevoStockMaximo"]);

			   	$respuesta = ModeloProducto::mdlIngresarProducto($tabla, $datos);

			   	if($respuesta == "ok"){
					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "producto";
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
							window.location = "producto";
							}
						})
			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR PRODUCTO
	=============================================*/
	static public function ctrMostrarProducto($item, $valor){
		$tabla = "PRODUCTO";
		$respuesta = ModeloProducto::mdlMostrarProducto($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function ctrEditarProducto(){

		if(isset($_POST["editarNombreGenerico"]) &&
			 isset($_POST["editarNombreComercial"]) &&
			 isset($_POST["editarStockMinimo"]) &&
			 isset($_POST["editarStockMaximo"])
			){

				if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreGenerico"]) &&
			     preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreComercial"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["editarStockMinimo"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["editarStockMaximo"])){

				$tabla = "PRODUCTO";

				$datos = array("CODIGO_PRODUCTO"=>$_POST["idProducto"],
											 "NOMBRE_GENERICO"=>$_POST["editarNombreGenerico"],
											 "NOMBRE_COMERCIAL"=>$_POST["editarNombreComercial"],
											 "STOCK_MIN"=>$_POST["editarStockMinimo"],
											 "STOCK_MAX"=>$_POST["editarStockMaximo"]);

				$respuesta = ModeloProducto::mdlEditarProducto($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El producto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "producto";
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

							window.location = "producto";
							}
						})
			  	</script>';
			}
		}
	}

	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/
	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="PRODUCTO";
			$datos = $_GET["idProducto"];
			$respuesta = ModeloProducto::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){
				echo'<script>
					swal({
						  type: "success",
						  title: "El tipo de producto ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "producto";
									}
								})
					</script>';
			}
		}
	}
}
