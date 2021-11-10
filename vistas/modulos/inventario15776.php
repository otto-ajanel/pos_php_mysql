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

      Inventario de productos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar inventario</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <h3>
          Ingrese los criterios de busqueda en buscar:
        </h3>
        <p>
          pude buscar por codigo, nombre del producto, presentacion, clasificiacion
          incluso por unidades, solo escribe el criterio en el cuadro buscar:
        </p>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Nombre Producto</th>
           <th>Unidades Disponibles</th>
           <th>Fecha Vencimiento</th>
           <th>Precio</th>

         </tr>

        </thead>

        <tbody>
          <?php

          $item = null;
          $valor = null;

          $inventario = ControladorInventario::ctrMostrarInventario($item, $valor);

          foreach($inventario as $key => $value){
            echo '

            <tr>
            <td>'.($key+1).'</td>
            <td>'.$value["nombre_comercial"].'</td>
            <td>'.$value["stock"].'</td>
            <td>'.$value["caducidad"].'</td>
            <td>'.$value["precio_venta"].'</td>

            </tr>';

          }


          ?>


        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
