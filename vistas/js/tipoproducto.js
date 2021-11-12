/*=============================================
EDITAR TIPO DE PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEditarTipo", function () {

	var idTipo = $(this).attr("idTipo");
	var datos = new FormData();
	datos.append("idTipo", idTipo);

	$.ajax({
		url: "ajax/tipoproducto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarTipo").val(respuesta["TIPO_PRODUCTO"]);
			$("#idTipo").val(respuesta["CODIGO_TIPO"]);

		}

	})


})

/*=============================================
ELIMINAR TIPO DE PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEliminarTipo", function () {

	var idTipo = $(this).attr("idTipo");
	console.log(idTipo);
	swal({
		title: '¿Está seguro de borrar el tipo de producto?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar tipo producto!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=tipoproducto&idTipo=" + idTipo;

		}

	})

})
