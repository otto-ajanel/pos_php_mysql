/*=============================================
EDITAR OFERTA
=============================================*/
$(".tablas").on("click", ".btnEditarOferta", function () {

	var idOferta = $(this).attr("idOferta");
	var datos = new FormData();
	datos.append("idOferta", idOferta);

	$.ajax({
		url: "ajax/oferta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarCodigoAsignacion").val(respuesta["CODIGO_ASIGNACION"]);
			$("#editarDescuento").val(respuesta["DESCUENTO"]);
			$("#editarFechaInicio").val(respuesta["FECHA_INICIO"]);
			$("#editarFechaFin").val(respuesta["FECHA_FIN"]);

		}
	})
})

/*=============================================
ELIMINAR OFERTA
=============================================*/
$(".tablas").on("click", ".btnEliminarOferta", function () {

	var idOferta = $(this).attr("idOferta");
	console.log(idOferta);
	swal({
		title: '¿Está seguro de borrar el tipo de producto?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar tipo'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=oferta&idOferta=" + idOferta;

		}

	})

})
