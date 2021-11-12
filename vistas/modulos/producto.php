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
      Catalogo de producto
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar producto
        </button>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
<<<<<<< HEAD
           <th>Codigo barras</th>
=======
        <!--   <th>Codigo barras</th> -->
>>>>>>> origin/rocio
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
                    <td>

                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarProducto" idProducto="'.$value["CODIGO_PRODUCTO"].'" data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-pencil"></i></button>';
                      if($_SESSION["perfil"] == "Administrador"){
                        echo '<button class="btn btn-danger btnEliminarProducto" idProducto="'.$value["CODIGO_PRODUCTO"].'"><i class="fa fa-times"></i></button>';
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
MODAL AGREGAR PRODUCTO
======================================-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

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

<<<<<<< HEAD

            <!-- ENTRADA PARA EL CODIGO DE BARRAS -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-barcode"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoCodigoBarras" placeholder="Ingresar el codigo de barras" required>
              </div>
            </div>


            <!-- ENTRADA PARA EL NOMBRE GENERICO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fas fa-cube"></i></span>
=======
            <!-- ENTRADA PARA EL CODIGO DE BARRAS
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-barcode"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoCodigoBarras" placeholder="Ingresar el codigo de barras" required>
              </div>
            </div>-->

          <!-- ENTRADA PARA EL NOMBRE GENERICO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
>>>>>>> origin/rocio
                <input type="text" class="form-control input-lg" name="nuevoNombreGenerico" placeholder="Ingresar nombre genérico" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE COMERCIAL -->
            <div class="form-group">
              <div class="input-group">
<<<<<<< HEAD
                <span class="input-group-addon"><i class="fa fas fa-cube"></i></span>
=======
                <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
>>>>>>> origin/rocio
                <input type="text" class="form-control input-lg" name="nuevoNombreComercial" placeholder="Ingresar nombre comercial" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA PRESENTACION -->
            <div class="form-group">
             <div class="input-group">
<<<<<<< HEAD
               <span class="input-group-addon"><i class="fa fab fa-joomla"></i></span>
=======
               <span class="input-group-addon"><i class=" fa fab fa-joomla"></i></span>
>>>>>>> origin/rocio
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
<<<<<<< HEAD
               <span class="input-group-addon"><i class="fa fab fa-empire"></i></span>
=======
               <span class="input-group-addon"><i class=" fa fab fa-empire"></i></span>
>>>>>>> origin/rocio
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
<<<<<<< HEAD
               <span class="input-group-addon"><i class="fa fab fa-modx"></i></span>
=======
               <span class="input-group-addon"><i class=" fa fab fa-modx"></i></span>
>>>>>>> origin/rocio
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
             <!-- ENTRADA PARA SUBIR FOTO -->

              <div class="form-group">

                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaImagen" name="nuevaImagen" id="nuevaImagen">

                <p class="help-block">Peso máximo de la foto 20MB</p>

                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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
<div id="modalEditarProducto" class="modal fade" role="dialog">
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

<<<<<<< HEAD

            <!-- ENTRADA PARA EL CODIGO DE BARRAS -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class=" fa fas fa-barcode"></i></span>
                <input type="number" class="form-control input-lg" name="editarCodigoBarras" id="editarCodigoBarras"  placeholder="Ingresar el codigo de barras" required>
              </div>
            </div>
=======
            <!-- ENTRADA PARA EL CODIGO DE BARRAS
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="number" class="form-control input-lg" name="editarCodigoBarras" id="editarCodigoBarras" placeholder="Ingresar el codigo de barras" required>
              </div>
            </div>-->

>>>>>>> origin/rocio

            <!-- ENTRADA PARA EL NOMBRE GENERICO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fas fa-cube"></i></span>
                <input type="text" class="form-control input-lg" name="editarNombreGenerico" id="editarNombreGenerico" placeholder="Ingresar nombre genérico" required>
                <input type="hidden" id="idProducto" name="idProducto">
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE COMERCIAL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fas fa-cube"></i></span>
                <input type="text" class="form-control input-lg" name="editarNombreComercial" id="editarNombreComercial" placeholder="Ingresar nombre comercial" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA PRESENTACION -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fab fa-joomla"></i></span>
               <select type="text" class="form-control input-lg" name="editarpresentacionProducto" id="editarpresentacionProducto" required>
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
               <span class="input-group-addon"><i class="fa fab fa-empire"></i></span>
               <select type="text" class="form-control input-lg" name="editarclasificacionProducto" id="editarclasificacionProducto" required>
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
               <span class="input-group-addon"><i class="fa fab fa-modx"></i></span>
               <select type="text" class="form-control input-lg" name="editartipoproductoProducto" id="editartipoproductoProducto" required>
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
                <input type="number" min="0" class="form-control input-lg" name="editarStockMinimo" id="editarStockMinimo" placeholder="Ingresar el stock minimo" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL STOCK MAXIMO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-up"></i></span>
                <input type="number" min="0" class="form-control input-lg" name="editarStockMaximo" id="editarStockMaximo" placeholder="Ingresar el stock maximo" required>
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
        $editarProducto = new ControladorProducto();
        $editarProducto -> ctrEditarProducto();
      ?>
      </form>
    </div>
  </div>
</div>



<?php
  $eliminarProducto = new ControladorProducto();
  $eliminarProducto -> ctrEliminarProducto();
?>
