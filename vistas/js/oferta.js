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

			$('#editarCodigoOferta option[value="' + respuesta["CODIGO_ASIGNACION"] + '"]').prop('selected', true);
			$("#editarDescuento").val(respuesta["DESCUENTO"]);
			$("#editarFechaInicio").val(respuesta["FECHA_INICIO"]);
			$("#editarFechaFin").val(respuesta["FECHA_FIN"]);
			$("#idOferta").val(respuesta["CODIGO_OFERTA"]);
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
		title: '¿Está seguro de borrar la oferta?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar oferta'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=oferta&idOferta=" + idOferta;

		}

	})

})
