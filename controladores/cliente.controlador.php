<?php
class ControladorCliente{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"]) &&
			 isset($_POST["nuevoNit"]) &&
		   isset($_POST["nuevaDireccion"])){

			if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
			   preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoNit"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "CLIENTE";
			   	$datos = array("NOMBRE_CLIENTE"=>$_POST["nuevoCliente"],
							           "NIT"=>$_POST["nuevoNit"],
							           "DIRECCION"=>$_POST["nuevaDireccion"]);

			   	$respuesta = ModeloCliente::mdlIngresarCliente($tabla, $datos);

			   	if($respuesta == "ok"){
					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cliente";
									}
								})
					</script>';
				}

			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "cliente";
							}
						})
			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
	static public function ctrMostrarCliente($item, $valor){
		$tabla = "CLIENTE";
		$respuesta = ModeloCliente::mdlMostrarCliente($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	MOSTRAR LISTA CONTACTO
	=============================================*/
	static public function ctrMostrarListaContacto($item, $valor){
		$tabla = "CLIENTE";
		$respuesta = ModeloCliente::mdlMostrarListaContacto($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/
	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"]) &&
			 isset($_POST["editarNit"]) &&
			 isset($_POST["editarDireccion"])
			){

				if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
					 preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarNit"]) &&
					 preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

				$tabla = "CLIENTE";

				$datos = array("CODIGO_CLIENTE"=>$_POST["idCliente"],
											 "NOMBRE_CLIENTE"=>$_POST["editarCliente"],
											 "NIT"=>$_POST["editarNit"],
											 "DIRECCION"=>$_POST["editarDireccion"]);

				$respuesta = ModeloCliente::mdlEditarCliente($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cliente";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cliente";
							}
						})
			  	</script>';
			}
		}
	}



	/*=============================================
	CREAR CONTACTO CLIENTE
	=============================================*/
	static public function ctrCrearContactoCliente(){

		if(isset($_POST["editarTelefonoCliente"])){

			if(preg_match('/^[0-9]+$/', $_POST["editarTelefonoCliente"])){

			   	$tabla = "CONTACTO_CLIENTE";
			   	$datos = array("CODIGO_CLIENTE"=>$_POST["idClienteContacto"],
							           "TELEFONO"=>$_POST["editarTelefonoCliente"]);

			   	$respuesta = ModeloCliente::mdlIngresarContactoCliente($tabla, $datos);

			   	if($respuesta == "ok"){
						echo'<script>

						swal({
							  type: "success",
							  title: "El contacto del cliente ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "cliente";
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
							window.location = "cliente";
							}
						})
			  	</script>';
			}
		}
	}




	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/
	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){
			$tabla ="CLIENTE";
			$datos = $_GET["idCliente"];
			$respuesta = ModeloCliente::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "cliente";
								}
							})

				</script>';

			}
		}
	}
}
