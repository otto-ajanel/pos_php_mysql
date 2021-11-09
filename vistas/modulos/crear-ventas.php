<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Crear venta

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <button id="ver-ventas" class="ver-ventas">Ver Ventas</button>

        </ol>

    </section>
    <section class="content">

        <div class="row">

            <!--=====================================
      EL FORMULARIO
      ======================================-->

            <div class="col-lg-5 col-xs-12">

                <div class="box box-success">

                    <div class="box-header with-border"></div>

                    <form role="form" method="post" class="formularioVenta">

                        <div class="box-body">

                            <div class="box">

                                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->

                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="nuevoVendedor"
                                            value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                                        <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">


                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrUltimaVenta($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="00001" readonly>';


                    }else{

                      foreach ($ventas as $key => $value) {
                          # code...
                          $codigo = $value["NO_FACTURA"] + 1;
                      }




                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'."No. 0000".$codigo.'" readonly>';


                    }

                    ?>
                                    </div>
                                    <div class="input-group">



                                    </div>

                                </div>



                                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                        <select class="form-control" id="seleccionarCliente" name="seleccionarCliente">
                                             <option value="">Seleccionar cliente</option>
                                             <?php
                                             $item=null;
                                             $valor=null;
                                             $res=ControladorCliente::ctrMostrarCliente($item,$valor);
                                             foreach ($res as $key => $value) {
                                                 echo '
                                                 <option value="'.$value["CODIGO_CLIENTE"].'">'.$value["NOMBRE_CLIENTE"]."--".$value["NIT"].'</option>
                                                 ';
                                             }

                                             ?>
                                        </select>

                                        <span class="input-group-addon"><button type="button"
                                                class="btn btn-default btn-xs" data-toggle="modal"
                                                data-target="#modalAgregarCliente" data-dismiss="modal">Agregar
                                                cliente</button></span>

                                    </div>

                                </div>

                                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->
<<<<<<< HEAD
                                <div class="form-group row nuevoProducto carrito">
=======
                                <div class="carrito">
                                    <div class="form-group row nuevoProducto">

                                        <!-- Descripción del producto -->

                                        <div class="col-xs-6" style="padding-right:0px">

                                            <div class="input-group">

                                                <span class="input-group-addon"><button type="button"
                                                        class="btn btn-danger btn-xs"><i
                                                            class="fa fa-times"></i></button></span>

                                                <input type="text" class="form-control" id="agregarProducto"
                                                    name="agregarProducto" placeholder="Descripción del producto"
                                                    required>

                                            </div>

                                        </div>


                                        <!-- Cantidad del producto -->

                                        <div class="col-xs-3">

                                            <input type="number" class="form-control" id="nuevaCantidadProducto"
                                                name="nuevaCantidadProducto" min="1" placeholder="0" required>

                                        </div>

                                        <!-- Precio del producto -->

                                        <div class="col-xs-3" style="padding-left:0px">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i
                                                        class="ion ion-social-usd"></i></span>

                                                <input type="number" min="1" class="form-control"
                                                    id="nuevoPrecioProducto" name="nuevoPrecioProducto"
                                                    placeholder="000000" readonly required>

                                            </div>

                                        </div>


                                    </div>
                                    <div class="form-group row nuevoProducto">

                                        <!-- Descripción del producto -->

                                        <div class="col-xs-6" style="padding-right:0px">

                                            <div class="input-group">

                                                <span class="input-group-addon"><button type="button"
                                                        class="btn btn-danger btn-xs"><i
                                                            class="fa fa-times"></i></button></span>

                                                <input type="text" class="form-control" id="agregarProducto"
                                                    name="agregarProducto" placeholder="Descripción del producto"
                                                    required>

                                            </div>

                                        </div>


                                        <!-- Cantidad del producto -->










                                        <!-- Cantidad del producto -->

                                        <div class="col-xs-3">

                                            <input type="number" class="form-control" id="nuevaCantidadProducto"
                                                name="nuevaCantidadProducto" min="1" placeholder="0" required>

                                        </div>

                                        <!-- Precio del producto -->

                                        <div class="col-xs-3" style="padding-left:0px">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i
                                                        class="ion ion-social-usd"></i></span>

                                                <input type="number" min="1" class="form-control"
                                                    id="nuevoPrecioProducto" name="nuevoPrecioProducto"
                                                    placeholder="000000" readonly required>

                                            </div>

                                        </div>


                                    </div>
                                    <div class="form-group row nuevoProducto">
>>>>>>> 8bc03011a9d3d42979e4447c24f76f71abbe7805

                                </div>
                                <input type="hidden" id="listaProductos" name="listaProductos">
                                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                                <button type=" button" class="btn btn-default hidden-lg">Agregar
                                    producto</button>

                                <hr>

                                <div class="row impuesto">

                                    <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                                    <div class="col-xs-8 pull-right">

                                        <table class="table">

                                            <thead>

                                                <tr>
                                                    <th>Total</th>
                                                    <th style="width: 100%">

                                                        <div class="input-group">

                                                            <span class="input-group-addon">
                                                                <i>Q</i>
                                                            </span>

                                                            <input type="text" class="form-control input-lg"
                                                                id="nuevoTotalVenta" name="nuevoTotalVenta" total=""
                                                                placeholder="00000" readonly required>

                                                            <input type="hidden" name="totalVenta" id="totalVenta">


                                                        </div>
                                                    </th>
                                                </tr>

                                            </thead>



                                        </table>

                                    </div>

                                </div>

                                <hr>

                                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->
                                <div class="form-group row">

                                    <div class="col-xs-6" style="padding-right:0px">

                                        <div class="input-group">

                                            <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago"
                                                required>
                                                <option value="">Seleccione método de pago</option>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="TC">Tarjeta Crédito</option>
                                                <option value="TD">Tarjeta Débito</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="cajasMetodoPago"></div>

                                    <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                                </div>

                                <br>

                            </div>

                        </div>

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

                        </div>

                    </form>
                    <?php
                    $newSale=new ControladorVentas();
                    $newSale->ctrCrearVenta();
                    ?>
                </div>

            </div>

            <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

                <div class="box box-warning">

                    <div class="box-header with-border"></div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped dt-responsive tablaVentas">

                            <thead>

                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Imagen</th>
                                    <th>Codigo Barra</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>

<<<<<<< HEAD
=======
                            <tbody>

                                <tr>
                                    <td>1.</td>
                                    <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail"
                                            width="40px">
                                    </td>
                                    <td>00123</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>20</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>

>>>>>>> 8bc03011a9d3d42979e4447c24f76f71abbe7805
                        </table>

                    </div>

                </div>


            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar cliente</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL NIT -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" min="0" class="form-control input-lg" name="nuevoNit" placeholder="Ingresar NIT" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </form>

      <?php
        $crearCliente = new ControladorCliente();
        $crearCliente -> ctrCrearCliente();
      ?>

    </div>
  </div>
</div>
<<<<<<< Updated upstream
=======


<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->
<div id="modalMostrarVentasHoy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


    <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar cliente</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <table class="table table-bordered table-striped dt-responsive tablaVentasHoy" style="width: 100%;">

<thead>

    <tr>
        <th style="width: 10px">#No.</th>
        <th>No. Factura</th>
        <th>Vendedor</th>
        <th>Nombre del cliente</th>
        <th>Total de Venta</th>
    </tr>

</thead>


</table>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">

        </div>

    </div>
  </div>
</div>
>>>>>>> Stashed changes
