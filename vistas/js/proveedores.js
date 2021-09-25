/*=============================================
EDITAR Proveedor
=============================================*/
$(".tablas").on("click", ".btnEditarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");

	var datos = new FormData();
    datos.append("idProveedor", idProveedor);
    $.ajax({

      url:"ajax/proveedores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      console.log(respuesta["NOMBRE_PROVEEDOR"]);
      	 $("#idProveedor").val(respuesta["CODIGO_PROVEEDOR"]);
	       $("#editarProveedor").val(respuesta["NOMBRE_PROVEEDOR"]);
	       $("#editarNit").val(respuesta["NIT"]);
	       $("#editarCorre").val(respuesta["CORREO"]);
	       $("#editarTelefono").val(respuesta["TELEFONO"]);
	       $("#editarDireccion").val(respuesta["DIRECCION"]);
        
	  }

  	})

})

/*=============================================
ELIMINAR Proveedor
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");
	swal({
        title: '¿Está seguro de borrar el Proveedor?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Proveedor!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;
        }

  })

})