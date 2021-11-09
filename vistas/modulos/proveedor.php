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
      Administrar proveedores
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i> Inicio</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
          Agregar proveedor
        </button>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Nit</th>
           <th>Dirección</th>
           <th>Acciones</th>
         </tr>
        </thead>
        <tbody>

        <?php
          $item = null;
          $valor = null;
          $proveedor = ControladorProveedor::ctrMostrarProveedor($item, $valor);
          foreach ($proveedor as $key => $value) {

            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["NOMBRE_PROVEEDOR"].'</td>
                    <td>'.$value["NIT"].'</td>
                    <td>'.$value["DIRECCION"].'</td>
                    <td>

                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarProveedor" idProveedor="'.$value["CODIGO_PROVEEDOR"].'" data-toggle="modal" data-target="#modalEditarProveedor"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){
                        echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["CODIGO_PROVEEDOR"].'"><i class="fa fa-times"></i></button>';
                        echo '<button class="btn btn-primary btnContactoProveedor" idProveedorContacto="'.$value["CODIGO_PROVEEDOR"].'" data-toggle="modal" data-target="#modalEditarContactoProveedor"><i class="fa fa-phone""></i></button>';
                        echo '<button class="btn btn-default btnListarContactosProveedor" idListarContactoProveedor="'.$value["CODIGO_PROVEEDOR"].'" data-toggle="modal" data-target="#modalListaContactosProveedor"><i class="fa fa-list""></i></button>';
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
MODAL AGREGAR PROVEEDOR
======================================-->
<div id="modalAgregarProveedor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar proveedor</h4>
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
                <input type="text" class="form-control input-lg" name="nuevoProveedor" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL NIT -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" min="0" class="form-control input-lg" name="nuevoNitProveedor" placeholder="Ingresar NIT" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaDireccionProveedor" placeholder="Ingresar dirección" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar proveedor</button>
        </div>
      </form>

      <?php
        $crearProveedor = new ControladorProveedor();
        $crearProveedor -> ctrCrearProveedor();
      ?>

    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->
<div id="modalEditarProveedor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#fca903; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar proveedor</h4>
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
                <input type="text" class="form-control input-lg" name="editarProveedor" id="editarProveedor" required>
                <input type="hidden" id="idProveedor" name="idProveedor">
              </div>
            </div>

            <!-- ENTRADA PARA EL NIT -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" min="0" class="form-control input-lg" name="editarNitProveedor" id="editarNitProveedor" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control input-lg" name="editarDireccionProveedor" id="editarDireccionProveedor"  required>
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
        $editarProveedor = new ControladorProveedor();
        $editarProveedor -> ctrEditarProveedor();
      ?>
      </form>
    </div>
  </div>
</div>

<?php
  $eliminarProveedor = new ControladorProveedor();
  $eliminarProveedor -> ctrEliminarProveedor();
?>

<!--=====================================
MODAL EDITAR CONTACTO PROVEEDOR
======================================-->
<div id="modalEditarContactoProveedor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar contacto de proveedor</h4>
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
                <input type="name" class="form-control input-lg" name="contactoNombreProveedor" id="contactoNombreProveedor" disabled>
                <input type="hidden" id="idProveedorContacto" name="idProveedorContacto">
              </div>
            </div>


            <!-- ENTRADA PARA EL TELEFONO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="tel" class="form-control input-lg" name="editarTelefonoProveedor" id="editarTelefonoProveedor" required>
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
        $editarProveedor = new ControladorProveedor();
        $editarProveedor -> ctrCrearContactoProveedor();
      ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL LISTAR CONTACTO PROVEEDOR
======================================-->
<div id="modalListaContactosProveedor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#387ec7; color:white; border:3px solid #fff; border-radius:8px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Contactos del proveedor</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="name" class="form-control input-lg" name="listarNombreProveedor" id="listarNombreProveedor" disabled>
                <input type="hidden" id="idListarContactoProveedor" name="idListarContactoProveedor">
              </div>
            </div>

            <table class="table table-bordered table-striped dt-responsive" width="100%">
              <thead>
               <tr>
                 <th>Numero de Teléfono</th>
               </tr>
              </thead>
              <tbody name="ListacontactosProveedor" id="ListacontactosProveedor">
              </tbody>
             </table>
            </div>
          </section>

        </div>
      </div>
      </form>
    </div>
  </div>
</div>
