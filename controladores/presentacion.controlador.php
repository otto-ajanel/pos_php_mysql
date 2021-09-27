<?php

class ControladorPresentacion{

	/*=============================================
	CREAR Presentacion
	=============================================*/

	static public function ctrCrearPresentacion(){

		if(isset($_POST["nuevaPresentacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaPresentacion"])){

				$tabla = "presentacion";

				$datos = $_POST["nuevaPresentacion"];

				$respuesta = ModeloPresentacion::mdlIngresarPresentacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Presentacion ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "presentacion";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "presentacion";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR Presentacion
	=============================================*/

	static public function ctrMostrarPresentacion($item, $valor){

		$tabla = "presentacion";

		$respuesta = ModeloPresentacion::mdlMostrarPresentacion($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR Presentacion
	=============================================*/

	static public function ctrEditarPresentacion(){

		if(isset($_POST["editarPresentacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPresentacion"])){

				$tabla = "presentacion";

				$datos = array("PRESENTACION"=>$_POST["editarPresentacion"],
							   "CODIGO_PRESENTACION"=>$_POST["idPresentacion"]);

				$respuesta = ModeloPresentacion::mdlEditarPresentacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La clasificaion ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "presentacion";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "presentacion";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR Presentacion
	=============================================*/

	static public function ctrBorrarPresentacion(){

		if(isset($_GET["idPresentacion"])){

			$tabla ="presentacion";
			$datos = $_GET["idPresentacion"];

			$respuesta = ModeloPresentacion::mdlBorrarPresentacion($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Presentacion ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "presentacion";

									}
								})

					</script>';
			}
		}
		
	}
}