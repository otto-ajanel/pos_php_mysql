/*=============================================
EDITAR PEDIDO
=============================================*/

$(".tablas").on("click", ".btnEditarPedido", function(){

	var idPedido = $(this).attr("idPedido");
	var datos = new FormData();
    datos.append("idPedido", idPedido);
    $.ajax({

      url:"ajax/pedido.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	 $("#idPedido").val(respuesta["NO_ORDEN"]);
	       $('#editarProveedorPedido option[value="' + respuesta["CODIGO_PROVEEDOR"] +'"]').prop('selected', true);
	       $("#editarFechaPedido").val(respuesta["FECHA_PEDIDO"]);
	       $("#editarFechaEstimada").val(respuesta["FECHA_ESTIMADA"]);
	  }
  	})
})

/*=============================================
ELIMINAR PEDIDO
=============================================*/
$(".tablas").on("click", ".btnEliminarPedido", function(){

	var idPedido = $(this).attr("idPedido");

	swal({
        title: '¿Está seguro de borrar el pedido?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar pedido!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=pedido&idPedido="+idPedido;
        }

  })
})


$(".tablas").on("click", ".btnDetallePedido", function(){

	var idPedido = $(this).attr("idDetallePedido");
	$("#idDetallePedidoEval").val(idPedido);
	$("#detallePedidoNoOrdenEval").val(idPedido);
})

$(".tablas").on("click", ".btnListarDetallePedido", function(){

	var idListarDetallePedido = $(this).attr("idListarDetallePedido");
	var datos = new FormData();
    datos.append("idListarDetallePedido", idListarDetallePedido);
		$("#idListarDetallePedido").val(idListarDetallePedido);
		$("#listarNoOrden").val(idListarDetallePedido);
    $.ajax({
      url:"ajax/pedido.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
				try {
					var tbl = document.getElementById("ListaProductosPedido");
					while (tbl.firstChild) {
					    tbl.removeChild(tbl.firstChild);
					}
					var total = document.getElementById("totalOrden");
					total.value = 0.00;
					respuesta.forEach(createRowPedidos);
				} catch (e) {

				}
	  }
  	})
})

function createRowPedidos(item) {
	var tbl = document.getElementById("ListaProductosPedido");
	var total = parseFloat(document.getElementById("totalOrden").value);
	if (item[0] != null){
		tr = tbl.insertRow();
		var td = tr.insertCell();
		td.appendChild(document.createTextNode(item[0]));
		var td = tr.insertCell();
		td.appendChild(document.createTextNode(item[1]));
		var td = tr.insertCell();
		td.appendChild(document.createTextNode(item[2]));
		var td = tr.insertCell();
		td.appendChild(document.createTextNode(item[3]));
		var td = tr.insertCell();
		td.appendChild(document.createTextNode(item[4]));
		total += parseFloat(item[4]);
		document.getElementById("totalOrden").value = total;
	}
	else {
		tr = tbl.insertRow();
		var td = tr.insertCell();
		td.appendChild(document.createTextNode('No tiene ningún pedido'));
	}
}
