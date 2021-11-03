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
    <h1>
      Control de caducidad
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round" ></i> Inicio</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          <a href="caducidad"><i class="fa fa-refresh"></i>  Refresh</a>
        </button>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Código de inventario</th>
           <th>Producto</th>
           <th>Presentación</th>
           <th>Tipo de producto</th>
           <th>Cantidad de producto</th>
           <th>Fecha de caducidad</th>
         </tr>
        </thead>
        <tbody>

          <?php

            $item = null;
            $valor = null;

            $clasificacion = ControladorCaducidad::ctrMostrarCaducidad($item, $valor);
            foreach ($clasificacion as $key => $value) {
              echo ' <tr>
                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["CODIGO_INVENTARIO"].'</td>
                      <td class="text-uppercase">'.$value["NOMBRE_GENERICO"].'</td>
                      <td class="text-uppercase">'.$value["PRESENTACION"].'</td>
                      <td class="text-uppercase">'.$value["TIPO_PRODUCTO"].'</td>
                      <td class="text-uppercase">'.$value["CANTIDAD_PRODUCTO"].'</td>
                      <td class="text-uppercase">'.$value["CADUCIDAD"].'</td>
                    </tr>';
            }
          ?>

        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>
