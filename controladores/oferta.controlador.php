<?php

class ControladorOferta{

	/*=============================================
	CREAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrCrearOferta(){

		if(isset($_POST["nuevaOferta"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaOferta"])){

				$tabla = "OFERTA";

				$datos = $_POST["nuevaOferta"];

				$respuesta = ModeloOferta::mdlIngresarOferta($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta";

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

							window.location = "oferta";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrMostrarOferta($item, $valor){

		$tabla = "OFERTA";

		$respuesta = ModeloOferta::mdlMostrarOferta($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrEditarOferta(){

		if(isset($_POST["editarOferta"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarOferta"])){

				$tabla = "OFERTA";

				$datos = array("DESCUENTO"=>$_POST["editarOferta"],
							   "CODIGO_OFERTA"=>$_POST["idOferta"]);


			 $datos = array("DESCUENTO" => $_POST["nuevoDescuento"],
										"FECHA_INICIO" => $_POST["nuevaFechaInicio"],
										"FECHA_FIN" => $_POST["nuevoPerfil"]);

				$respuesta = ModeloOferta::mdlEditarOferta($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de producto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta";

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

							window.location = "oferta";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIPO DE PRODUCTO
	=============================================*/

	static public function ctrBorrarOferta(){

		if(isset($_GET["idOferta"])){

			$tabla ="Oferta";
			$datos = $_GET["idOferta"];

			$respuesta = ModeloOferta::mdlBorrarOferta($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de producto ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta";

									}
								})

					</script>';
			}
		}

	}
}
