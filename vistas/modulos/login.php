<div id="back">
  <div class="login-header">
    <img src="vistas\dist\img\logo.PNG" alt=logo">
    <h1>
      Farmacia NISSI
    </h1>
  </div>
  <div class="login-content">
    <div class="img">
      <img src="vistas\dist\img\iconos\LoginChica.jpeg" alt="login" width="600px">
    </div>
    <div class="login-box">
    
      <div class="login-box-body">

        <p class="login-box-msg">Ingresar Credenciales</p>
        <img src="vistas\dist\img\iconos\Login.PNG" alt="Credenciales">

        <form method="post">

          <div class="form-group has-feedback login-body" >

            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

          </div>
          

          <div class="form-group has-feedback login-body">

            <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required " >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          
          </div>

          <div class="row" >
          
            <div class="col-xs-12 " style="margin-top: 15px;">

              <button type="submit" class="btn btn-primary btn-block btn-flat"
                      style="
                      letter-spacing: 4px;
                      text-transform: uppercase;
                      "
              >Ingresar</button>
            
            </div>

          </div>

          <?php

            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
            
          ?>

        </form>

      </div>
    </div>
  </div>
</div>


