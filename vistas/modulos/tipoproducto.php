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
    <h1>Administrar tipo de producto</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
    </ol>
  </section>

     <section class="content">
          <div class="box">
               <div class="box-header with-border">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipo">
                         Agregar tipo producto
                    </button>
               </div>
          </div>
          <div class="box-body">
               <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                         <tr>
                              <th style="width:10px">
                                   #
                              </th>
                              <th>Tipo de producto</th>
                              <th>acciones</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $item=null;
                         $valor=null;
                         $tipoproducto=ControladorTipo::ctrMostrarTipo($item,$valor);
                         foreach ($tipoproducto as $key => $value) {
                              # code...
                              echo '
                              <tr>
                                   <td>'.($key+1).'</td>
                                   <td class="text-uppercase">'.$value["TIPO_PRODUCTO"].'

                                   </td>
                                   <td>

                                        <div class="btn-group">

                                         <button class="btn btn-warning btnEditarTipo" idTipo="'.$value["CODIGO_TIPO"].'" data-toggle="modal" data-target="#modalEditarTipo"><i class="fa fa-pencil"></i></button>';

                                   if($_SESSION["perfil"] == "Administrador"){

                                   echo '<button class="btn btn-danger btnEliminarTipo" idTipo="'.$value["CODIGO_TIPO"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR TIPO PRODUCTO
======================================-->

<div id="modalAgregarTipo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar tipo de producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class=" fa fab fa-modx"></i></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTipo" placeholder="Ingresar tipo de producto" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Tipo de producto</button>

        </div>

        <?php

          $crearTipo = new ControladorTipo();
          $crearTipo -> ctrCrearTipo();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TIPO DE PRODUCTO
======================================-->

<div id="modalEditarTipo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tipo de producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class=" fa fab fa-modx"></i></span>

                <input type="text" class="form-control input-lg" name="editarTipo" id="editarTipo" required>

                 <input type="hidden"  name="idTipo" id="idTipo" required>

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

          $editarTipo = new ControladorTipo();
          $editarTipo -> ctrEditarTipo();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTipo = new ControladorTipo();
  $borrarTipo -> ctrBorrarTipo();

?>
