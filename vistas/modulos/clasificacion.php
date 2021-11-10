<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1> Administrar clasificación </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Clasificacion</button>
      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Clasificación</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clasificacion = ControladorClasificacion::ctrMostrarClasificacion($item, $valor);

          foreach ($clasificacion as $key => $value) {

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["CLASIFICACION"].'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["CODIGO_CLASIFICACION"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["CODIGO_CLASIFICACION"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Clasificación</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class=" fa fab fa-empire"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Clasificación</button>

        </div>

        <?php

          $crearClasificacion = new ControladorClasificacion();
          $crearClasificacion -> ctrCrearClasificacion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Clasificación</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class=" fa fab fa-empire"></i></span>

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

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

          $editarClasificacion = new ControladorClasificacion();
          $editarClasificacion -> ctrEditarClasificacion();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarClasificacion = new ControladorClasificacion();
  $borrarClasificacion -> ctrBorrarClasificacion();

?>
