<?php

class ControladorTipo{

	/*=============================================
	CREAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrCrearTipo(){

		if(isset($_POST["nuevoTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])){

				$tabla = "TIPO_PRODUCTO";

				$datos = $_POST["nuevoTipo"];

				$respuesta = ModeloTipo::mdlIngresarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipoproducto";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo de producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipoproducto";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrMostrarTipo($item, $valor){

		$tabla = "TIPO_PRODUCTO";

		$respuesta = ModeloTipo::mdlMostrarTipo($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrEditarTipo(){

		if(isset($_POST["editarTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])){

				$tabla = "TIPO_PRODUCTO";

				$datos = array("TIPO_PRODUCTO"=>$_POST["editarTipo"],
							   "CODIGO_TIPO"=>$_POST["idTipo"]);

				$respuesta = ModeloTipo::mdlEditarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de producto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipoproducto";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo de producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipoproducto";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrBorrarTipo(){

		if(isset($_GET["idTipo"])){

			$tabla ="TIPO_PRODUCTO";
			$datos = $_GET["idTipo"];

			$respuesta = ModeloTipo::mdlBorrarTipo($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de producto ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipoproducto";

									}
								})

					</script>';
			}
		}

	}
}
