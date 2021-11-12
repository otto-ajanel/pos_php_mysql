/*=============================================
EDITAR CLIENTE
=============================================*/

$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	var datos = new FormData();
    datos.append("idCliente", idCliente);
    $.ajax({

      url:"ajax/cliente.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idCliente").val(respuesta["CODIGO_CLIENTE"]);
	       $("#editarCliente").val(respuesta["NOMBRE_CLIENTE"]);
	       $("#editarNit").val(respuesta["NIT"]);
	       $("#editarDireccion").val(respuesta["DIRECCION"]);
	  }
  	})
})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=cliente&idCliente="+idCliente;
        }

  })
})


$(".tablas").on("click", ".btnContactoCliente", function(){

	var idCliente = $(this).attr("idClienteContacto");
	var datos = new FormData();
    datos.append("idClienteContacto", idCliente);
    $.ajax({

      url:"ajax/cliente.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idClienteContacto").val(respuesta["CODIGO_CLIENTE"]);
				 $("#contactoNombreCliente").val(respuesta["NOMBRE_CLIENTE"]);
	  }
  	})
})

$(".tablas").on("click", ".btnListarContactos", function(){

	var idCliente = $(this).attr("idListarContacto");
	var datos = new FormData();
    datos.append("idListarContacto", idCliente);
    $.ajax({

      url:"ajax/cliente.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
				try {
					$("#idListarContacto").val(respuesta[0]["CODIGO_CLIENTE"]);
 				 	$("#listarNombreCliente").val(respuesta[0]["NOMBRE_CLIENTE"]);
					var tbl = document.getElementById("Listacontactos");
					while (tbl.firstChild) {
					    tbl.removeChild(tbl.firstChild);
					}
					respuesta.forEach(createRowContact);
				} catch (e) {

				}
	  }
  	})
})

function createRowContact(item) {
	var tbl = document.getElementById("Listacontactos");
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
