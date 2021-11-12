<?php
if($_SESSION["perfil"] == "Especial"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Lista de pedidos
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPedido">
          Agregar pedido
        </button>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>No. Orden</th>
           <th>Proveedor</th>
           <th>Fecha del pedido</th>
           <th>Fecha estimada</th>

           <th>Acciones</th>
         </tr>
        </thead>
        <tbody>

        <?php
          $item = null;
          $valor = null;
          $pedido = ControladorPedido::ctrMostrarPedido($item, $valor);
          foreach ($pedido as $key => $value) {

            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["NO_ORDEN"].'</td>
                    <td>'.$value["NOMBRE_PROVEEDOR"].'</td>
                    <td>'.$value["FECHA_PEDIDO"].'</td>
                    <td>'.$value["FECHA_ESTIMADA"].'</td>
                    <td>

                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarPedido" idPedido="'.$value["NO_ORDEN"].'" data-toggle="modal" data-target="#modalEditarPedido"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){
                        echo '<button class="btn btn-danger btnEliminarPedido" idPedido="'.$value["NO_ORDEN"].'"><i class="fa fa-times"></i></button>';
                        echo '<button class="btn btn-primary btnDetallePedido" idDetallePedido="'.$value["NO_ORDEN"].'" data-toggle="modal" data-target="#modalEditarDetallePedido"><i class="fa fa-th""></i></button>';
                        echo '<button class="btn btn-default btnListarDetallePedido" idListarDetallePedido="'.$value["NO_ORDEN"].'" data-toggle="modal" data-target="#modalListaDetallePedido"><i class="fa fa-list""></i></button>';
                      }

                      echo '</div>
                    </td>
                  </tr>';
            }
        ?>

        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL AGREGAR PEDIDO
======================================-->
<div id="modalAgregarPedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar pedido</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL PROVEEDOR -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-truck"></i></span>
               <select type="text" class="form-control input-lg" name="nuevoProveedorPedido" id="nuevoProveedorPedido" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $pedido = ControladorPedido::ctrMostrarProveedorPedido();
                   foreach ($pedido as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PROVEEDOR"].'">'.$value["NOMBRE_PROVEEDOR"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DEL PEDIDO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" min="0" class="form-control input-lg" name="nuevaFechaPedido" placeholder="Ingresar NIT" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA ESTIMADA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control input-lg" name="nuevaFechaEstimada" placeholder="Ingresar dirección" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Pedido</button>
        </div>
      </form>

      <?php
        $crearPedido = new ControladorPedido();
        $crearPedido -> ctrCrearPedido();
      ?>

    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR PEDIDO
======================================-->
<div id="modalEditarPedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar pedido</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL PROVEEDOR -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-truck"></i></span>
               <input type="hidden"  name="idPedido" id="idPedido" required>
               <select type="text" class="form-control input-lg" name="editarProveedorPedido" id="editarProveedorPedido" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $pedido = ControladorPedido::ctrMostrarProveedorPedido();
                   foreach ($pedido as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PROVEEDOR"].'">'.$value["NOMBRE_PROVEEDOR"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DEL PEDIDO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" min="0" class="form-control input-lg" name="editarFechaPedido" id="editarFechaPedido" placeholder="Ingresar NIT" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA ESTIMADA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control input-lg" name="editarFechaEstimada" id="editarFechaEstimada" placeholder="Ingresar dirección" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary-editar">Guardar cambios</button>
        </div>

      <?php
        $editarPedido = new ControladorPedido();
        $editarPedido -> ctrEditarPedido();
      ?>
      </form>
    </div>
  </div>
</div>

<?php
  $eliminarPedido = new ControladorPedido();
  $eliminarPedido -> ctrEliminarPedido();
?>



<!--=====================================
MODAL AGREGAR DETALLE PEDIDO
======================================-->
<div id="modalEditarDetallePedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar productos al pedido</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL NUMERO DE ORDEN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="name" class="form-control input-lg" name="detallePedidoNoOrdenEval" id="detallePedidoNoOrdenEval" disabled>
                <input type="hidden" id="idDetallePedidoEval" name="idDetallePedidoEval">
              </div>
            </div>

            <!-- ENTRADA PARA EL PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
               <select type="text" class="form-control input-lg" name="editarCodigoAsignacionDetalle" id="editarCodigoAsignacionDetalle" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $pedido = ControladorPedido::ctrMostrarProductosPedido();
                   foreach ($pedido as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRODUCTO"].'">'.$value["NOMBRE_GENERICO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA PARA LA CANTIDAD -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <input type="number" class="form-control input-lg" name="editarCantidadDetallePedido" id="editarCantidadDetallePedido" placeholder="Ingrese la cantidad de producto" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PRECIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="text" class="form-control input-lg" name="editarPrecioDetallePedido" id="editarPrecioDetallePedido" placeholder="Ingrese el precio unitario" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

      <?php
        $editarPedido = new ControladorPedido();
        $editarPedido -> ctrCrearDetallePedido();
      ?>
      </form>
    </div>
  </div>
</div>




<!--=====================================
MODAL LISTAR PRODUCTOS DEL PEDIDO
======================================-->
<div id="modalListaDetallePedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Productos del pedido</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="name" class="form-control input-lg" name="listarNoOrden" id="listarNoOrden" disabled>
                <input type="hidden" id="idListarDetallePedido" name="idListarDetallePedido">
              </div>
            </div>

            <table class="table table-bordered table-striped dt-responsive" width="100%">
              <thead>
               <tr>
                 <th>Id</th>
                 <th>Producto</th>
                 <th>Cantidad</th>
                 <th>Precio Unitario</th>
                 <th>Subtotal</th>
               </tr>
              </thead>
              <tbody name="ListaProductosPedido" id="ListaProductosPedido">
              </tbody>
             </table>
             <input id="totalOrden" disabled>
            </div>
          </section>

        </div>
      </div>
      </form>
    </div>
  </div>
</div>
