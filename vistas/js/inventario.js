/*=============================================
EDITAR INVENTARIO
=============================================*/

$(".tablas").on("click", ".btnEditarProductoInventario", function(){

	var idInventario = $(this).attr("idInventario");
	var datos = new FormData();
    datos.append("idInventario", idInventario);
    $.ajax({

      url:"ajax/inventario.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idInventario").val(respuesta["CODIGO_INVENTARIO"]);
				 $("#editarCantidadProductoInventario").val(respuesta["STOCK"]);
	       $("#editarPrecioCompraInventario").val(respuesta["PRECIO_COMPRA"]);
				 $("#editarPrecioVentaInventario").val(respuesta["PRECIO_VENTA"]);
 			   $("#editarFechaIngresoInventario").val(respuesta["FECHA_INGRESO"]);
	       $("#editarFechaCaducidadInventario").val(respuesta["CADUCIDAD"]);
				 $('#editarProveedorInventario option[value="' + respuesta["CODIGO_PROVEEDOR"] + '"]').prop('selected', true);
				 $('#editarProductoInventario option[value="' + respuesta["CODIGO_PRODUCTO"] + '"]').prop('selected', true);
	  }
  	})
})

/*=============================================
ELIMINAR INVENTARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarProductoInventario", function(){

	var idInventario = $(this).attr("idInventario");

	swal({
        title: '¿Está seguro de borrar el registro del inventario?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar registro!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=inventario&idInventario="+idInventario;
        }

  })

})
