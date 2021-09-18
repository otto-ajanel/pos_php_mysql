<?php

class ControladorClasificacion{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearClasificacion(){

		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "clasificacion";

				$datos = $_POST["nuevaCategoria"];

				$respuesta = ModeloClasificacion::mdlIngresarClasificacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La clasificacion ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clasificacion";

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

							window.location = "clasificacion";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR clasificacion
	=============================================*/

	static public function ctrMostrarClasificacion($item, $valor){

		$tabla = "clasificacion";

		$respuesta = ModeloClasificacion::mdlMostrarClasificacion($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR Clasificacion
	=============================================*/

	static public function ctrEditarClasificacion(){

		if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){

				$tabla = "clasificacion";

				$datos = array("CLASIFICACION"=>$_POST["editarCategoria"],
							   "CODIGO_CLASIFICACION"=>$_POST["idCategoria"]);

				$respuesta = ModeloClasificacion::mdlEditarClasificacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La clasificaion ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clasificacion";

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

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarClasificacion(){

		if(isset($_GET["idCategoria"])){

			$tabla ="CLASIFICACION";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloClasificacion::mdlBorrarClasificacion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La clasificacion ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clasificacion";

									}
								})

					</script>';
			}
		}
		
	}
}
