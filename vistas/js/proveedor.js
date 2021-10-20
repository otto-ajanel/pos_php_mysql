/*=============================================
EDITAR PROVEEDOR
=============================================*/

$(".tablas").on("click", ".btnEditarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");
	var datos = new FormData();
    datos.append("idProveedor", idProveedor);
    $.ajax({

      url:"ajax/proveedor.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idProveedor").val(respuesta["CODIGO_PROVEEDOR"]);
	       $("#editarProveedor").val(respuesta["NOMBRE_PROVEEDOR"]);
	       $("#editarNitProveedor").val(respuesta["NIT"]);
	       $("#editarDireccionProveedor").val(respuesta["DIRECCION"]);
	  }
  	})
})

/*=============================================
ELIMINAR PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");

	swal({
        title: '¿Está seguro de borrar el proveedor?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar proveedor!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=proveedor&idProveedor="+idProveedor;
        }

  })
})


$(".tablas").on("click", ".btnContactoProveedor", function(){

	var idProveedor = $(this).attr("idProveedorContacto");
	var datos = new FormData();
    datos.append("idProveedorContacto", idProveedor);
    $.ajax({

      url:"ajax/proveedor.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idProveedorContacto").val(respuesta["CODIGO_PROVEEDOR"]);
				 $("#contactoNombreProveedor").val(respuesta["NOMBRE_PROVEEDOR"]);
	  }
  	})
})

$(".tablas").on("click", ".btnListarContactosProveedor", function(){

	var idProveedor = $(this).attr("idListarContactoProveedor");
	var datos = new FormData();
    datos.append("idListarContactoProveedor", idProveedor);
    $.ajax({

      url:"ajax/proveedor.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
				try {
					$("#idListarContactoProveedor").val(respuesta[0]["CODIGO_PROVEEDOR"]);
 				 	$("#listarNombreProveedor").val(respuesta[0]["NOMBRE_PROVEEDOR"]);
					var tbl = document.getElementById("ListacontactosProveedor");
					while (tbl.firstChild) {
					    tbl.removeChild(tbl.firstChild);
					}
					respuesta.forEach(createRowProveedor);
				} catch (e) {

				}
	  }
  	})
})

function createRowProveedor(item) {
	var tbl = document.getElementById("ListacontactosProveedor");
	if (item[7] != null){
		tr = tbl.insertRow();
		var td = tr.insertCell();
		td.appendChild(document.createTextNode(item[7]));
	}
	else {
		tr = tbl.insertRow();
		var td = tr.insertCell();
		td.appendChild(document.createTextNode('No tiene ningún número de teléfono'));
	}
}
