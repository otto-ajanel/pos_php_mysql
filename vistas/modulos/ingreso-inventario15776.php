<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Stock de productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active" >Administrar stock</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

        <div class="box-header with-border">
  
            <h3>
            Gestione el control de Stock de productos
            </h3>
            <p>
            Puede editar las existencias, ingresar mas unidades, tambien cambiar el
            precio de venta y de compra.
            <br>
            Tomar las precausiones antes de elimiar o cambiar
            <br><br>
            Ingrese un nuevo produto desde una orden de pedido o manualmente:
            </p>

        </div>


        <div class="box-header with-border">
  
        <button class="btn btn-primary">
          
          <a  href="ingreso-inventario-producto"> Agregar Stock </a>
          
        </button>

      </div>
      


      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha_ingreso</th>
           <th>producto</th>
           <th>Fecha Vencimento</th>
           <th>precio compra</th>
           <th>precio venta</th>
           <th>Unidades</th>
           <th>Opciones</th>

         </tr> 

        </thead>

        <tbody>
        <?php

          $item = null;
          $valor = null;

          $inventario = ControladorInventario::ctrMostrarInventarioMaster($item, $valor);

          foreach($inventario as $key => $value){
            echo ' 

            <tr>
            <td>'.($key+1).'</td>
            <td>'.$value["fecha_ingreso"].'</td>
            <td>'.$value["nombre_comercial"].'</td>
            <td>'.$value["caducidad"].'</td>
            <td>'.$value["precio_compra"].'</td>
            <td>'.$value["precio_venta"].'</td>
            <td>'.$value["unidades"].'</td>
            <td>
            <div class="btn-group">
                  
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarStock" idInventario='.$value["codigo"].'>
                  <i class="fa fa-pencil"></i></button>
  
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
  
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
MODAL EDITAR STOCK INVENTARIO
======================================-->

<div id="modalEditarStock" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#d69b42; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Stock</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL FECHA VENCIMIENTO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></span> 

                <input type="date" class="form-control input-lg" name="fvencimiento" placeholder="fecha vencimiento" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CANTITDAD -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> 

                <input type="number" class="form-control input-lg" name="unidades" placeholder="unidades" required>

              </div>

            </div>

            <!-- ENTRADA PARA PRECIO DE COMPRA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span> 

                <input type="number" class="form-control input-lg" name="preciocompra" placeholder="precio de compra" required>

              </div>

            </div>

            <!-- ENTRADA PARA PRECIO DE VENTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span> 

                <input type="number" class="form-control input-lg" name="precioventa" placeholder="precio de venta" required>

              </div>

            </div>
            <!-- TEXTO ADICIONAL -->

             <div class="form-group">

              <p class="help-block">todos los campos son requeridos !!</p>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-warning">Modificar Stock</button>

        </div>

      </form>

    </div>

  </div>

</div>