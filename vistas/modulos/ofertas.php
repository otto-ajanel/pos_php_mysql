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
      
       ofertas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="ion-navicon-round" ></i> INICIO</a></li>
      
      
    
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
           <th>Codigo de Barra</th>
           <th>Producto</th>
           <th>Presentacion</th>
           <th>Oferta %</th>
           <th>Fecha de Inicio</th>
           <th>Fecha de final</th>
           <th>Imagen</th>

           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $ofertas = ControladorOfertas::ctrMostrarOfertas($item, $valor);
        $perfiles=[' ','Especial','Administrador','Vendedor'];

       foreach ($ofertas as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["CODIGO_BARRAS"].'</td>
                  <td>'.$value["NOMBRE_GENERICO"].'</td>
                  <td>'.$value["PRESENTACION"].'</td>
                  <td>'.$value["DESCUENTO"].'</td>
                  <td>'.$value["FECHA_INICIO"].'</td>
                  <td>'.$value["FECHA_FIN"].'</td>
                  <td>'.$value["URL"].'</td>



                  ';

                  if($value["URL"] != ""){

                    echo '<td><img src="'.$value["URL"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }
         
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarOferta" idOferta="'.$value["CODIGO_OFERTA"].'" data-toggle="modal" data-target="#modalEditarOferta"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarOferta" idOferta="'.$value["CODIGO_OFERTA"].'"><i class="ion-trash-a"></i></button>

                    </div>  

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
MODAL AGREGAR OFERTA
======================================-->

<div id="modalAgregarOferta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#53b5ed; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar oferta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body ">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                
                <option value="">Selecionar busqueda</option>

                
                  
                <option value="Barra">Barra</option>
                <option value="Producto">Producto</option>
                <option value="Codigo">Codigo de producto</option>


              </select>

            </div>

          </div>

            </div>
            

           <!-- ENTRADA PARA OFERTAS -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaOferta" placeholder="Ingresar oferta" id="nuevaOferta" required>

              </div>
 
            </div>

             <!-- ENTRADA PARA PORCENTAJE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoPorcetaje" placeholder="Ingresar porcentaje" id="nuevoPorcentaje" min="0" max="100" required>

              </div>
 
            </div>

             <!-- ENTRADA PARA FECHA DE INICIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaInicio" placeholder="Ingresar fecha inicio" id="nuevaFechaInicio"  required>

              </div>
 
            </div>

            <!-- ENTRADA PARA FECHA DE INICIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaFin" placeholder="Ingresar fecha fin" id="nuevaFechaFin"  required>

              </div>
 
            </div>

            
          
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar oferta</button>

        </div>

        <?php

          $crearOferta = new ControladorOfertas();
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

        <div class="modal-header" style="background:#53b5ed; color:white; border:3px solid #fff; border-radius:8px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar oferta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body ">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <select class="form-control input-lg" id="editarOferta" name="editarOferta" required>
                
                <option value="">Selecionar oferta</option>

                
                  
                <option value="Barra">Barra</option>
                <option value="Producto">Producto</option>
                <option value="Codigo">Codigo de producto</option>


              </select>

            </div>

          </div>

            </div>
            

           <!-- ENTRADA PARA OFERTAS -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarOfertaProducto" placeholder="Ingresar oferta" id="editarOfertaProducto" required>

              </div>
 
            </div>

             <!-- ENTRADA PARA PORCENTAJE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPorcetaje" placeholder="Ingresar porcentaje" id="editarPorcentaje" min="0" max="100" required>

              </div>
 
            </div>

             <!-- ENTRADA PARA FECHA DE INICIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="date" class="form-control input-lg" name="editarFechaInicio" placeholder="Ingresar fecha inicio" id="editarFechaInicio"  required>

              </div>
 
            </div>

            <!-- ENTRADA PARA FECHA DE INICIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="date" class="form-control input-lg" name="editarFechaFin" placeholder="Ingresar fecha fin" id="editarFechaFin"  required>

              </div>
 
            </div>

            
          
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

          $editarOferta = new ControladorOfertas();
          $editarOferta -> ctrEditarOferta();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarOfertas = new ControladorOfertas();
  $borrarOfertas -> ctrBorrarOferta();

?>