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
      Administrar inventario
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProductoInventario">
          Agregar producto al inventario
        </button>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Proveedor</th>
           <th>Producto</th>

           <th>Cantidad</th>
           <th>Precio compra</th>
           <th>Precio venta</th>
           <th>Fecha ingreso</th>
           <th>Fecha caducidad</th>
           <th>Acciones</th>
         </tr>
        </thead>
        <tbody>

        <?php
          $item = null;
          $valor = null;
          $inventario = ControladorInventario::ctrMostrarProductoInventario($item, $valor);
          foreach ($inventario as $key => $value) {

            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["NOMBRE_PROVEEDOR"].'</td>
                    <td>'.$value["NOMBRE_GENERICO"].'</td>
                    <td>'.$value["STOCK"].'</td>
                    <td>'.$value["PRECIO_COMPRA"].'</td>
                    <td>'.$value["PRECIO_VENTA"].'</td>
                    <td>'.$value["FECHA_INGRESO"].'</td>
                    <td>'.$value["CADUCIDAD"].'</td>
                    <td>

                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarProductoInventario" idInventario="'.$value["CODIGO_INVENTARIO"].'" data-toggle="modal" data-target="#modalEditarInventario"><i class="fa fa-pencil"></i></button>';
                      if($_SESSION["perfil"] == "Administrador"){
                        echo '<button class="btn btn-danger btnEliminarProductoInventario" idInventario="'.$value["CODIGO_INVENTARIO"].'"><i class="fa fa-times"></i></button>';
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
MODAL AGREGAR INVENTARIO
======================================-->
<div id="modalAgregarProductoInventario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar producto al inventario</h4>
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
               <select type="text" class="form-control input-lg" name="nuevoProveedorInventario" id="nuevoProveedorInventario" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $pedido = ControladorInventario::ctrMostrarProveedorInventario();
                   foreach ($pedido as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PROVEEDOR"].'">'.$value["NOMBRE_PROVEEDOR"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA EL PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
               <select type="text" class="form-control input-lg" name="nuevoCodigoProductoInventario" id="nuevoCodigoProductoInventario" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $productos = ControladorInventario::ctrMostrarInventarioProducto();
                   foreach ($productos as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRODUCTO"].'">'.$value["NOMBRE_GENERICO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>


            <!-- ENTRADA PARA LA CANTIDAD DE PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-barcode"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoCantidadProductoInventario" placeholder="Ingresar la cantidad de producto" required>
              </div>
            </div>

          <!-- ENTRADA PARA EL PRECION DE COMPRA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoPrecioCompraInventario" placeholder="Ingresar el precion de compra" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PRECION DE VENTA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoPrecioVentaInventario" placeholder="Ingresar el precio venta" required>
              </div>
            </div>


            <!-- ENTRADA PARA LA FECHA DE INGRESO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></span>
                <input type="date" min="0" class="form-control input-lg" name="nuevoFechaIngresoInventario" placeholder="Fecha de ingreso producto" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE CADUCIDAD -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-up"></i></span>
                <input type="date" min="0" class="form-control input-lg" name="nuevoFechaCaducidadInventario" placeholder="Fecha caducidad producto" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar producto</button>
        </div>
      </form>

      <?php
        $crearInventario = new ControladorInventario();
        $crearInventario -> ctrCrearInventario();
      ?>

    </div>
  </div>
</div>




<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->
<div id="modalEditarInventario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
          <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar producto</h4>
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
               <input type="hidden" id="idInventario" name="idInventario">
               <select type="text" class="form-control input-lg" name="editarProveedorInventario" id="editarProveedorInventario" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $pedido = ControladorInventario::ctrMostrarProveedorInventario();
                   foreach ($pedido as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PROVEEDOR"].'">'.$value["NOMBRE_PROVEEDOR"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA EL PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
               <select type="text" class="form-control input-lg" name="editarProductoInventario" id="editarProductoInventario" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $productos = ControladorInventario::ctrMostrarInventarioProducto();
                   foreach ($productos as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRODUCTO"].'">'.$value["NOMBRE_GENERICO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>


            <!-- ENTRADA PARA LA CANTIDAD DE PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-barcode"></i></span>
                <input type="number" class="form-control input-lg" name="editarCantidadProductoInventario" id="editarCantidadProductoInventario" placeholder="Ingresar la cantidad de producto" required>
              </div>
            </div>

          <!-- ENTRADA PARA EL PRECION DE COMPRA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
                <input type="number" class="form-control input-lg" name="editarPrecioCompraInventario" id="editarPrecioCompraInventario" placeholder="Ingresar el precion de compra" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PRECION DE VENTA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
                <input type="number" class="form-control input-lg" name="editarPrecioVentaInventario" id="editarPrecioVentaInventario" placeholder="Ingresar el precio venta" required>
              </div>
            </div>


            <!-- ENTRADA PARA LA FECHA DE INGRESO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></span>
                <input type="date" min="0" class="form-control input-lg" name="editarFechaIngresoInventario" id="editarFechaIngresoInventario" placeholder="Fecha de ingreso producto" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE CADUCIDAD -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-up"></i></span>
                <input type="date" min="0" class="form-control input-lg" name="editarFechaCaducidadInventario" id="editarFechaCaducidadInventario" placeholder="Fecha caducidad producto" required>
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
        $editarProducto = new ControladorInventario();
        $editarProducto -> ctrEditarProductoInventario();
      ?>
      </form>
    </div>
  </div>
</div>





<?php
  $eliminarInventario = new ControladorInventario();
  $eliminarInventario -> ctrEliminarProductoInventario();
?>
