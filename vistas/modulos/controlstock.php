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
           <th>Código inventario</th>
           <th>Producto</th>
           <th>Presentación</th>
           <th>Tipo producto</th>
           <th>Stock mínimo</th>
           <th>Cantidad disponible</th>
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
