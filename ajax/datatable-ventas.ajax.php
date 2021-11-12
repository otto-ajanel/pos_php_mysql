<?php

require_once "../controladores/producto.controlador.php";
require_once "../modelos/producto.modelo.php";


class TablaProductosVentas{


 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/

	public function mostrarTablaProductosVentas(){

  		$productos = ControladorProducto::ctrMostrarProductosVenta();
  		if(count($productos) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/

		  	$imagen = "<img src='".$productos[$i]["URL"]."' width='40px'>";

		  	/*=============================================
 	 		STOCK
  			=============================================*/
/*
  			if($productos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{


			}
			*/
			$stock = "<button class='btn btn-success'>".$productos[$i]["STOCK"]."</button>";
		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["CODIGO_INVENTARIO"]."'>Agregar</button></div>";



				$datosJson .='[
						"'.($i+1).'",
						"'.$imagen.'",
						"'.$productos[$i]["NOMBRE_GENERICO"].'",
					"'.$productos[$i]["PRESENTACION"].", ".$productos[$i]["TIPO_PRODUCTO"].", ".$productos[$i]["CLASIFICACION"].'",
						"'.$stock.'",
						"'.$botones.'"
					],';
		  	/*$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["CODIGO_BARRA"].'",
			      "'.$productos[$i]["NOMBRE_GENERICO"].'",
				  "'.$productos[$i]["PRESENTACION"].", ".$productos[$i]["TIPO_PRODUCTO"].", ".$productos[$i]["CLASIFICACION"].'",
			      "'.$stock.'",
			      "'.$botones.'"
			    ],';*/

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   ']

		 }';

		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas ->mostrarTablaProductosVentas();
