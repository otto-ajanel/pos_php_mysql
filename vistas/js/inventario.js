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
    

})