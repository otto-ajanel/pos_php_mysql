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
	       $("#editarNombreGenerico").val(respuesta["NOMBRE_GENERICO"]);
	       $("#editarNombreComercial").val(respuesta["NOMBRE_COMERCIAL"]);
		 		 $('#editarpresentacionProducto option[value="' + respuesta["CODIGO_PRESENTACION"] + '"]').prop('selected', true);
				 $('#editarclasificacionProducto option[value="' + respuesta["CODIGO_CLASIFICACION"] + '"]').prop('selected', true);
				 $('#editartipoproductoProducto option[value="' + respuesta["CODIGO_CLASIFICACION"] + '"]').prop('selected', true);
				 $("#editarStockMinimo").val(respuesta["STOCK_MIN"]);
	       $("#editarStockMaximo").val(respuesta["STOCK_MAX"]);
	  }
  	})
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
