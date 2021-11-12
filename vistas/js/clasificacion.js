/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function () {

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url: "ajax/clasificacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarCategoria").val(respuesta["CLASIFICACION"]);
			$("#idCategoria").val(respuesta["CODIGO_CLASIFICACION"]);

		}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function () {

	var idCategoria = $(this).attr("idCategoria");

	swal({
		title: '¿Está seguro de borrar la clasificacion?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar clasificación!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=clasificacion&idClasificacion=" + idCategoria;

		}

	})

})
