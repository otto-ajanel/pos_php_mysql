/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarInventario", function(){

	var idinventario = $(this).attr("idinventario");
	console.log(idinventario);
	var datos = new FormData();
	datos.append("idinventario", idinventario);

	$.ajax({
		url: 'ajax/inventario.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#fvencimiento").val(respuesta["caducidad"]);
			$("#stock").val(respuesta["stock"]);
			$("#preciocompra").val(respuesta["precio_compra"]);
			$("#precioventa").val(respuesta["precio_venta"]);
			$("#idinventario").val(respuesta["codigo_inventario"]);
		}
	});
});

/*
ELIMINAR REGISTRO STOCK
*/

$(".tablas").on("click", ".btnEliminarInventario", function(){

	alert("evento click eliminar boton ok");
	
	var idInventario = $(this).attr("idInventario");
	console.log(idInventario);
	

	swal({
		title: '¿Está seguro de borrar el usuario?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si, borrar usuario!'
	  }).then(function(result){
	
		if(result.value){
			
	
		  window.location = "index.php?ruta=ingreso-inventario15776&idInventario="+idInventario ;
	
		}
	
	  })
	  

})