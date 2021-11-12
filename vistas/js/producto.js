/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablas").on("click", ".btnEditarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var datos = new FormData();
    datos.append("idProducto", idProducto);
    $.ajax({

      url:"ajax/producto.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idProducto").val(respuesta["CODIGO_PRODUCTO"]);
<<<<<<< HEAD
         $("#editarCodigoBarras").val(respuesta["CODIGO_BARRAS"]);
=======
			/*	 $("#editarCodigoBarras").val(respuesta["CODIGO_BARRAS"]);*/
>>>>>>> origin/rocio
	       $("#editarNombreGenerico").val(respuesta["NOMBRE_GENERICO"]);
	       $("#editarNombreComercial").val(respuesta["NOMBRE_COMERCIAL"]);
		 		 $('#editarpresentacionProducto option[value="' + respuesta["CODIGO_PRESENTACION"] + '"]').prop('selected', true);
				 $('#editarclasificacionProducto option[value="' + respuesta["CODIGO_CLASIFICACION"] + '"]').prop('selected', true);
				 $('#editartipoproductoProducto option[value="' + respuesta["CODIGO_TIPO"] + '"]').prop('selected', true);
				 $("#editarStockMinimo").val(respuesta["STOCK_MIN"]);
	       $("#editarStockMaximo").val(respuesta["STOCK_MAX"]);
	  }
  	})
})
/*
subir fot

*/
$(".nuevaImagen").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	swal({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=producto&idProducto="+idProducto;
        }

  })

})
