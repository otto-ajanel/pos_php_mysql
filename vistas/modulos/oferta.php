<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
       Administración de ofertas
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round" ></i>Inicio</a></li>
    </ol>

  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOferta">
          Agregar Oferta
        </button>
      </div>

      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Producto</th>
           <th>Descuento</th>
           <th>Fecha Inicio</th>
           <th>Fecha Fin</th>
           <th>Acciones</th>
         </tr>
        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;
        $oferta = ControladorOferta::ctrMostrarOferta($item, $valor);

       foreach ($oferta as $key => $value){

          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["CODIGO_PRODUCTO"].'</td>
                  <td>'.$value["DESCUENTO"].'</td>
                  <td>'.$value["FECHA_INICIO"].'</td>
                  <td>'.$value["FECHA_FIN"].'</td>';

                  echo '
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarOferta" idOferta="'.$value["CODIGO_OFERTA"].'" data-toggle="modal" data-target="#modalEditarOferta"><i class="fa fa-pencil"></i></button>';

                    if($_SESSION["perfil"] == "Administrador"){

                    echo '<button class="btn btn-danger btnEliminarOferta" idOferta="'.$value["CODIGO_OFERTA"].'"><i class="fa fa-times"></i></button>';

                     }

                   echo '</div>

                   </td>
                   </tr>
                   ';
                   }
          ?>

        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL AGREGAR OFERTA
======================================-->

<div id="modalAgregarOferta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Oferta</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body ">
          <div class="box-body">

            <!-- ENTRADA PARA EL PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
               <select type="text" class="form-control input-lg" name="nuevoCodigoOferta" id="nuevoCodigoOferta" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $productos = ControladorProductosOfertas::ctrMostrarProductosOfertas();
                   foreach ($productos as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRODUCTO"].'">'.$value["NOMBRE_GENERICO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA EL DESCUENTO -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoDescuento" placeholder="Ingresar porcentaje de descuento" id="nuevoDescuento" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control input-lg" name="nuevoFechaInicio" id="nuevoFechaInicio" placeholder="Ingresar fecha de inicio" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE FIN -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
               <input type="date" class="form-control input-lg" name="nuevoFechaFin" id="nuevoFechaFin" placeholder="Ingresar fecha fin" required>
             </div>
           </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar oferta</button>
        </div>

        <?php

          $crearOferta = new ControladorOferta();
          $crearOferta -> ctrCrearOferta();

        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR OFERTA
======================================-->

<div id="modalEditarOferta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Oferta</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL PRODUCTO -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class=" fa fas fa-cube"></i></span>
               <input type="hidden"  name="idOferta" id="idOferta" required>
               <select type="text" class="form-control input-lg" name="editarCodigoOferta" id="editarCodigoOferta" required>
                 <?php
                   $item = null;
                   $valor = null;
                   $productos = ControladorProductosOfertas::ctrMostrarProductosOfertas();
                   foreach ($productos as $key => $value) {
                     echo '<option value="'.$value["CODIGO_PRODUCTO"].'">'.$value["NOMBRE_GENERICO"].'</option>';
                   }
                 ?>
               </select>
             </div>
            </div>

            <!-- ENTRADA PARA EL DESCUENTO -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="number" class="form-control input-lg" name="editarDescuento" id="editarDescuento" placeholder="Ingresar porcentaje de descuento" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control input-lg" name="editarFechaInicio" id="editarFechaInicio" placeholder="Ingresar fecha de inicio" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE FIN -->
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
               <input type="date" class="form-control input-lg" name="editarFechaFin" id="editarFechaFin" placeholder="Ingresar fecha fin" required>
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

          $editarOferta = new ControladorOferta();
          $editarOferta -> ctrEditarOferta();

        ?>

      </form>
    </div>
  </div>
</div>

<?php
  $borrarOferta = new ControladorOferta();
  $borrarOferta -> ctrBorrarOferta();
?>
