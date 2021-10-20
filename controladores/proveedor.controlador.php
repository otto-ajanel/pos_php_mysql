<?php
class ControladorProveedor{

	/*=============================================
	CREAR PROVEEDOR
	=============================================*/

	static public function ctrCrearProveedor(){

		if(isset($_POST["nuevoProveedor"]) &&
			 isset($_POST["nuevoNitProveedor"]) &&
		   isset($_POST["nuevaDireccionProveedor"])){

			if(preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoNitProveedor"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccionProveedor"])){

			   	$tabla = "PROVEEDOR";
			   	$datos = array("NOMBRE_PROVEEDOR"=>$_POST["nuevoProveedor"],
							           "NIT"=>$_POST["nuevoNitProveedor"],
							           "DIRECCION"=>$_POST["nuevaDireccionProveedor"]);

			   	$respuesta = ModeloProveedor::mdlIngresarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){
					echo'<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedor";
									}
								})
					</script>';
				}

			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "proveedor";
							}
						})
			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR PROVEEDOR
	=============================================*/
	static public function ctrMostrarProveedor($item, $valor){
		$tabla = "PROVEEDOR";
		$respuesta = ModeloProveedor::mdlMostrarProveedor($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	MOSTRAR LISTA CONTACTO PROVEEDOR
	=============================================*/
	static public function ctrMostrarListaContactoProveedor($item, $valor){
		$tabla = "PROVEEDOR";
		$respuesta = ModeloProveedor::mdlMostrarListaContactoProveedor($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/
	static public function ctrEditarProveedor(){

		if(isset($_POST["editarProveedor"]) &&
			 isset($_POST["editarNitProveedor"]) &&
			 isset($_POST["editarDireccionProveedor"])
			){

				if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProveedor"]) &&
					 preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarNitProveedor"]) &&
					 preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccionProveedor"])){

				$tabla = "PROVEEDOR";

				$datos = array("CODIGO_PROVEEDOR"=>$_POST["idProveedor"],
											 "NOMBRE_PROVEEDOR"=>$_POST["editarProveedor"],
											 "NIT"=>$_POST["editarNitProveedor"],
											 "DIRECCION"=>$_POST["editarDireccionProveedor"]);

				$respuesta = ModeloProveedor::mdlEditarProveedor($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El proveedor ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedor";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El proveedores no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedor";
							}
						})
			  	</script>';
			}
		}
	}



	/*=============================================
	CREAR CONTACTO PROVEEDOR
	=============================================*/
	static public function ctrCrearContactoProveedor(){

		if(isset($_POST["editarTelefonoProveedor"])){

			if(preg_match('/^[0-9]+$/', $_POST["editarTelefonoProveedor"])){

			   	$tabla = "CONTACTO_PROVEEDOR";
			   	$datos = array("CODIGO_PROVEEDOR"=>$_POST["idProveedorContacto"],
							           "TELEFONO"=>$_POST["editarTelefonoProveedor"]);

			   	$respuesta = ModeloProveedor::mdlIngresarContactoProveedor($tabla, $datos);

			   	if($respuesta == "ok"){
						echo'<script>

						swal({
							  type: "success",
							  title: "El contacto del proveedor ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "proveedor";
										}
									})
						</script>';
					}else{
						echo'<script>

						swal({
							  type: "error",
							  title: "Ocurrió un error en la Base de Datos",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  })
						</script>';
					}

			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡Debe ingresar un número de teléfono válido!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "proveedor";
							}
						})
			  	</script>';
			}
		}
	}




	/*=============================================
	ELIMINAR PROVEEDOR
	=============================================*/
	static public function ctrEliminarProveedor(){

		if(isset($_GET["idProveedor"])){
			$tabla ="PROVEEDOR";
			$datos = $_GET["idProveedor"];
			$respuesta = ModeloProveedor::mdlEliminarProveedor($tabla, $datos);

			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "proveedor";
								}
							})

				</script>';

			}
		}
	}
}
