/*=============================================
EDITAR Presentación
=============================================*/
$(".tablas").on("click", ".btnEditarPresentacion", function () {

	var idPresentacion = $(this).attr("idPresentacion");
	var datos = new FormData();
	datos.append("idPresentacion", idPresentacion);

	$.ajax({
		url: "ajax/presentacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarPresentacion").val(respuesta["PRESENTACION"]);
			$("#idPresentacion").val(respuesta["CODIGO_PRESENTACION"]);

		}

	})


})

/*=============================================
ELIMINAR Presentacion
=============================================*/
$(".tablas").on("click", ".btnEliminarPresentacion", function () {

	var idPresentacion = $(this).attr("idPresentacion");
	console.log(idPresentacion);
	swal({
		title: '¿Está seguro de borrar la presentación?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar presentación!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=presentacion&idPresentacion=" + idPresentacion;

		}

	})

})
