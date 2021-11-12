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
      Control de productos por fecha de caducidad
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round"></i>Inicio</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <a href="controlcaducidad"><button class="btn btn-primary" data-toggle="modal"><i class="fa fa-refresh"></i>  Refresh</button></a>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Producto</th>
           <th>Presentación</th>
           <th>Clasificación</th>
           <th>Tipo producto</th>
           <th>Cantidad total producto</th>
           <th>Fecha de caducidad</th>
         </tr>
        </thead>
        <tbody>

        <?php
          $item = null;
          $valor = null;
          $producto = ControladorCaducidad::ctrMostrarCaducidad($item, $valor);
          foreach ($producto as $key => $value) {

            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["NOMBRE_GENERICO"].'</td>
                    <td>'.$value["PRESENTACION"].'</td>
                    <td>'.$value["CLASIFICACION"].'</td>
                    <td>'.$value["TIPO_PRODUCTO"].'</td>
                    <td>'.$value["STOCK"].'</td>
                    <td>'.$value["CADUCIDAD"].'</td>
                  </tr>';
            }
        ?>

        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>
