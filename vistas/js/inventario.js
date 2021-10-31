/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarInventario", function(){

	
    	            

	var idInventario = $(this).attr("idInventario");
	console.log(idInventario);
	var datos = new FormData();
	datos.append("idInventario", idInventario);

	

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
			$("#unidades").val(respuesta["unidades"]);
			$("#preciocompra").val(respuesta["precio_compra"]);
			$("#precioventa").val(respuesta["precio_venta"]);
			$("#idinventario1").val(respuesta["codigo"]);
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