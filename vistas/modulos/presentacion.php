<?php
#Validando el perfil de l usuario
if ($_SESSION["perfil"]=="Vendedor") {
     echo '<script>
     window.location="inicio"
     </script>';
     return;
}
?>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Administrar presentación</h1>
  <ol class="breadcrumb">
     <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
  </ol>
 </section>

     <section class="content">
          <div class="box">
               <div class="box-header with-border">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPresentacion">Agregar Presentación</button>
               </div>
          </div>
          <div class="box-body">
               <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                         <tr>
                              <th style="width:10px">#</th>
                              <th>Presentación</th>
                              <th>Acción</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $item=null;
                         $valor=null;
                         $presentacion=ControladorPresentacion::ctrMostrarPresentacion($item,$valor);
                         foreach ($presentacion as $key => $value) {
                              # code...
                              echo '
                              <tr>
                                   <td>'.($key+1).'</td>
                                   <td class="text-uppercase">'.$value["PRESENTACION"].'

                                   </td>
                                   <td>

                                        <div class="btn-group">

                                         <button class="btn btn-warning btnEditarPresentacion" idPresentacion="'.$value["CODIGO_PRESENTACION"].'" data-toggle="modal" data-target="#modalEditarPresentacion"><i class="fa fa-pencil"></i></button>';

                                   if($_SESSION["perfil"] == "Administrador"){

                                   echo '<button class="btn btn-danger btnEliminarPresentacion" idPresentacion="'.$value["CODIGO_PRESENTACION"].'"><i class="fa fa-times"></i></button>';

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
     </section>
</div>
<!--=====================================
MODAL AGREGAR PRESENTACION
======================================-->

<div id="modalAgregarPresentacion" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Presentación</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class=" fa fab fa-joomla"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaPresentacion" placeholder="Ingresar Presentación" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Presentación</button>

        </div>

        <?php

          $crearPresentacion = new ControladorPresentacion();
          $crearPresentacion -> ctrCrearPresentacion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Presentacion
======================================-->

<div id="modalEditarPresentacion" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Presentación</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class=" fa fab fa-joomla"></i></span>

                <input type="text" class="form-control input-lg" name="editarPresentacion" id="editarPresentacion" required>

                 <input type="hidden"  name="idPresentacion" id="idPresentacion" required>

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

          $editarPresentacion = new ControladorPresentacion();
          $editarPresentacion -> ctrEditarPresentacion();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarPresentacion = new ControladorPresentacion();
  $borrarPresentacion -> ctrBorrarPresentacion();

?>
