<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ingreso de Stock para el inventario
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="ingreso-inventario15776"><i class="fa fa-dashboard"></i> regresar</a></li>
      
      <li class="active">Administrar stock</li>
    
    </ol>

  </section>

  <br>

  
  <section class="content">


  <div class="box box-solid box-primary">

        <div class="box-header with-border">

          <h3 class="box-title">Elige Criterio de busqueda</h3>

          <div class="box-tools pull-right">            
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->

            <span class="label label-primary">productos</span>
          </div><!-- /.box-tools -->

        </div><!-- /.box-header -->

        <div class="box-body">
            
            <h4>Buscar por:
                <select name="" id="">
                  <option value="1">Producto</option>
                  <option value="2">Codigo Barras</option>
                  <option value="3">No. Orden</option>
                </select>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="">Escriba para busqueda: </label>
                <input type="text">

                <button>Buscar</button>

                &nbsp;&nbsp;&nbsp;&nbsp;

                <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                <span class="sr-only">Loading...</span>

            </h4>

        <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Codigo barras</th>
           <th>Nombre genérico</th>
           <th>Nombre comercial</th>
           <th>Presentación</th>
           <th>Clasificación</th>
           <th>Tipo producto</th>
           <th>Stock mínimo</th>
           <th>Stock máximo</th>
           <th>Acciones</th>
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
                        
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalEditarStock">
                            
                        <i class="fa fa-plus"></i></button>
                    </td>
                  </tr>';
            }
        ?>

        </tbody>

       </table>
          
                
              
        </div><!-- /.box-body -->

        <div class="box-footer">
          
        </div><!-- box-footer -->

      </div><!-- /.box -->


      <div class="box box-solid box-success">

        <div class="box-header with-border">

          <h3 class="box-title">Tabla para agregar inventario</h3>

          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->

            <span class="label label-primary">stock</span>

          </div><!-- /.box-tools -->

        </div><!-- /.box-header -->

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">
         
                <thead>
                
                <tr>
                
                <th style="width:10px">#</th>
                <th>Codigo de barras</th>
                <th>producto</th>
                <th>Unidades</th>
                <th>precio compra</th>
                <th>precio venta</th>
                <th>Fecha vencimiento</th>
                <th>opciones</th>

                </tr> 

                </thead>

                <tbody>
                
                <tr>
                    <td>1</td>
                    <td>123513</td>
                    <td>Diclofenaco</td>
                    <td>1</td>
                    <td>1.50</td>
                    <td>2</td>
                    <td>2/2/2030</td>
                    <th>
                        <div class="btn-group">
                        
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarStock">
                            
                        <i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger">
                            
                        <i class="fa fa-minus"></i></button>
        
                        </div> 
                    </th>
                    

                </tr>

                </tbody>

       </table>

        </div><!-- /.box-body -->

        <div class="box-footer">

          <button type="button" class="btn btn-danger pull-right"">Cancelar Todo</button>

          <i class="fa fa-cog fa-spin fa-3x fa-fw pull-center" ></i>

          <span class="sr-only pull-center">Loading...</span>
          
          <button type="submit" class="btn btn-primary">Agregar Stock</button>
          
        </div><!-- box-footer -->

      </div><!-- /.box -->

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

        <div class="modal-header" style="background:green; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Stock</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO DEL PRODUCTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-search-plus" aria-hidden="true"></i></span> 

                <input type="text" title="Codigo del producto" class="form-control input-lg" name="codigoProducto" 
                placeholder="D01" required disabled="false">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DEL PRODUCTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-search-plus" aria-hidden="true"></i></span> 

                <input type="text" title="Nombre del producto" class="form-control input-lg" name="nombreProducto" 
                placeholder="Diclofenaco" required disabled="false">

              </div>

            </div>

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

                <input type="number" class="form-control input-lg" name="unidades" placeholder="unidades" required value=1>

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

          <button type="submit" class="btn btn-warning">Agregar a la tabla</button>

        </div>

      </form>

    </div>

  </div>

</div>