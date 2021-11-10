<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Ingreso de Stock para el inventario

    </h1>

    <ol class="breadcrumb">

      <li><a href="ingreso-inventario15776"><i class="fa fa-dashboard"></i> regresar</a></li>

      <li class="active">Administrar stock</li>

    </ol>

  </section>

  <br>


  <section class="content">


  <div class="box box-solid box-primary">

        <div class="box-header with-border">

          <h3 class="box-title">Elige Criterio de busqueda</h3>

          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->

            <span class="label label-primary">productos</span>
          </div><!-- /.box-tools -->

        </div><!-- /.box-header -->

        <div class="box-body">

            <h4>Buscar por:
                <select name="" id="">
                  <option value="1">Producto</option>
                  <option value="2">Codigo Barras</option>
                  <option value="3">No. Orden</option>
                </select>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="">Escriba para busqueda: </label>
                <input type="text">

                <button>Buscar</button>

                &nbsp;&nbsp;&nbsp;&nbsp;

                <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                <span class="sr-only">Loading...</span>

            </h4>

        <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                <tr>

                <th style="width:10px">#</th>
                <th>Codigo de barras</th>
                <th>producto</th>
                <th>tipo</th>
                <th>presentacion</th>
                <th>clasificacion</th>
                <th>opciones</th>

                </tr>

                <thead>
                 <tr>
                   <th style="width:10px">#</th>
                   <th>Codigo barras</th>
                   <th>Nombre genérico</th>
                   <th>Nombre comercial</th>
                   <th>Presentación</th>
                   <th>Clasificación</th>
                   <th>Tipo producto</th>
                   <th>Stock mínimo</th>
                   <th>Stock máximo</th>
                   <th>Acciones</th>
                 </tr>
                </thead>
                <tbody>

                <?php
                  $item = null;
                  $valor = null;
                  $producto = ControladorProducto::ctrMostrarProducto($item, $valor);
                  foreach ($producto as $key => $value) {

                    echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["CODIGO_BARRAS"].'</td>
                            <td>'.$value["NOMBRE_GENERICO"].'</td>
                            <td>'.$value["NOMBRE_COMERCIAL"].'</td>
                            <td>'.$value["PRESENTACION"].'</td>
                            <td>'.$value["CLASIFICACION"].'</td>
                            <td>'.$value["TIPO_PRODUCTO"].'</td>
                            <td>'.$value["STOCK_MIN"].'</td>
                            <td>'.$value["STOCK_MAX"].'</td>
                            <th>

                                <div class="btn-group">
                                  <button class="btn btn-warning btnEditarProducto" idProducto="'.$value["CODIGO_PRODUCTO"].'" data-toggle="modal" data-target="#modalEditarStock"><i class="fa fa-pencil"></i></button>';

                                  echo '</div>
                            </th>
                          </tr>';
                    }
                ?>

                </tbody>










       </table>



        </div><!-- /.box-body -->

        <div class="box-footer">

        </div><!-- box-footer -->

      </div><!-- /.box -->


      <div class="box box-solid box-success">

        <div class="box-header with-border">

          <h3 class="box-title">Tabla para agregar inventario</h3>

          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->

            <span class="label label-primary">stock</span>

          </div><!-- /.box-tools -->

        </div><!-- /.box-header -->

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                <tr>

                <th style="width:10px">#</th>
                <th>Codigo de barras</th>
                <th>producto</th>
                <th>Unidades</th>
                <th>precio compra</th>
                <th>precio venta</th>
                <th>Fecha vencimiento</th>
                <th>opciones</th>

                </tr>

                </thead>

                <tbody>

                <tr>
                    <td>1</td>
                    <td>123513</td>
                    <td>Diclofenaco</td>
                    <td>1</td>
                    <td>1.50</td>
                    <td>2</td>
                    <td>2/2/2030</td>
                    <th>
                        <div class="btn-group">

                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarStock">

                        <i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger">

                        <i class="fa fa-minus"></i></button>

                        </div>
                    </th>


                </tr>

                </tbody>

       </table>

        </div><!-- /.box-body -->

        <div class="box-footer">

          <button type="button" class="btn btn-danger pull-right"">Cancelar Todo</button>

          <i class="fa fa-cog fa-spin fa-3x fa-fw pull-center" ></i>

          <span class="sr-only pull-center">Loading...</span>

          <button type="submit" class="btn btn-primary">Agregar Stock</button>

        </div><!-- box-footer -->

      </div><!-- /.box -->

  </section>



</div>




<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar producto</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO DE BARRAS  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-barcode"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoCodigoBarras" placeholder="Ingresar el codigo de barras" required>
              </div>
            </div>

          <!-- ENTRADA PARA EL NOMBRE GENERICO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombreGenerico" placeholder="Ingresar nombre genérico" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE COMERCIAL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombreComercial" placeholder="Ingresar nombre comercial" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA PRESENTACION -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fab fa-joomla"></i></span>
               <select type="text" class="form-control input-lg" name="presentacionProducto" id="presentacionProducto" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $producto = ControladorProducto::ctrMostrarPresentacionProducto();
                   foreach ($producto as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRESENTACION"].'">'.$value["PRESENTACION"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA LA CLASIFICACION -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fab fa-empire"></i></span>
               <select type="text" class="form-control input-lg" name="clasificacionProducto" id="clasificacionProducto" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $producto = ControladorProducto::ctrMostrarClasificacionProducto();
                   foreach ($producto as $key => $value) {
                     echo '<option value="'.$value["CODIGO_CLASIFICACION"].'">'.$value["CLASIFICACION"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA LA TIPO DE PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fab fa-modx"></i></span>
               <select type="text" class="form-control input-lg" name="tipoproductoProducto" id="tipoproductoProducto" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $producto = ControladorProducto::ctrMostrarTipoProducto();
                   foreach ($producto as $key => $value) {
                     echo '<option value="'.$value["CODIGO_TIPO"].'">'.$value["TIPO_PRODUCTO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA EL STOCK MINIMO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></span>
                <input type="number" min="0" class="form-control input-lg" name="nuevoStockMinimo" placeholder="Ingresar el stock minimo" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL STOCK MAXIMO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-up"></i></span>
                <input type="number" min="0" class="form-control input-lg" name="nuevoStockMaximo" placeholder="Ingresar el stock maximo" required>
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
        $crearProducto = new ControladorProducto();
        $crearProducto -> ctrCrearProducto();
      ?>

    </div>
  </div>
</div>








<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->
<div id="modalEditarStock" class="modal fade" role="dialog">
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

            <!-- ENTRADA PARA EL CODIGO DE BARRAS  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="number" class="form-control input-lg" name="editarCodigoBarras" id="editarCodigoBarras" placeholder="Ingresar el codigo de barras" required disabled >
              </div>
            </div>


            <!-- ENTRADA PARA EL NOMBRE GENERICO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="editarNombreGenerico" id="editarNombreGenerico" placeholder="Ingresar nombre genérico" required disabled>
                <input type="hidden" id="idProducto" name="idProducto">
              </div>
            </div>


            <!-- ENTRADA PARA LA PRESENTACION -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-key"></i></span>
               <select type="text" class="form-control input-lg" name="editarpresentacionProducto" id="editarpresentacionProducto" required disabled>
                 <?php
                   $item = null;
                   $valor = null;
                   $producto = ControladorProducto::ctrMostrarPresentacionProducto();
                   foreach ($producto as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRESENTACION"].'">'.$value["PRESENTACION"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>


            <!-- ENTRADA PARA LA TIPO DE PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-key"></i></span>
               <select type="text" class="form-control input-lg" name="editartipoproductoProducto" id="editartipoproductoProducto" required disabled>
                 <?php
                   $item = null;
                   $valor = null;
                   $producto = ControladorProducto::ctrMostrarTipoProducto();
                   foreach ($producto as $key => $value) {
                     echo '<option value="'.$value["CODIGO_TIPO"].'">'.$value["TIPO_PRODUCTO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>



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


            <!-- ENTRADA PARA LA CANTIDAD DE PRODUCTO EN EL INVENTARIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fa-money"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoCantidadProductoInventario" placeholder="Ingresar la cantidad de producto" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fa-money"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoPrecioCompraInventario" placeholder="Ingresar el precio de compra" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PRECIO DE VENTA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fa-money"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoPrecioVentaInventario" placeholder="Ingresar el precio de venta" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE INGRESO EN EL INVENTARIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fa-money"></i></span>
                <input type="date" class="form-control input-lg" name="nuevoFechaIngresoInventario" placeholder="Ingresar la fecha de ingreso" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE CADUCIDAD EN EL INVENTARIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fa-money"></i></span>
                <input type="date" class="form-control input-lg" name="nuevoFechaCaducidadInventario" placeholder="Ingresar la fecha de caducidad" required>
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
        $editarInventario = new ControladorInventario();
        $editarInventario -> ctrCrearTablaInventario();
      ?>
      </form>
    </div>
  </div>
</div>
