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
       Ofertas
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="ion-navicon-round" ></i> INICIO</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <select>
          <?php
            $item = null;
            $valor = null;

            $productos = ControladorProductosOfertas::ctrMostrarProductosOfertas();

            foreach ($productos as $key => $value) {
              echo '<option>'.$value["NOMBRE_GENERICO"].'</option>';
            }
          ?>
        </select>
      </div>
    </div>
  </section>
</div>
