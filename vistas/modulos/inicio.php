<div class="activeMenu">
    <nav class="menuShow">
        <ul>
            <li  class="menu-item">

               <a  href="crear-ventas">


                   <i class="iconos icon1"></i>VENTAS</a>
            </li>
            <li  class="menu-item">

                <a  href="pedido"><i class="iconos icon2"></i>PEDIDOS</a>
            </li>

<?php

if($_SESSION["perfil"] == "Administrador"){
    echo '
    
    <li class="menu-item">
    <a  href="#"><i class="iconos icon3"></i>INVENTARIO</a>
    
    <ul class="sub-menu">
    <li class="menu-item">
    <a  href="inventario"><i ></i> INGRESAR PRODUCTO AL INVENTARIO</a>
    </li>
    <li class="menu-item">
    <a  href="proveedor"><i ></i> PROVEEDORES</a>
    
    </li>
    </ul>
    </li>
    ';
}
?>

            <li  class="menu-item">
               <a  href="cliente">
                   <i class="iconos icon4"></i>CLIENTES</a>
            </li>
            <li class="menu-item">
                <a  href="producto"><i class="iconos icon5"></i>PRODUCTO</a>
                <ul  class="sub-menu">
                    <li class="menu-item">
                         <a href="clasificacion"><i></i>CLASIFICACIÓN</a>
                    </li>
                    <li  class="menu-item">
                         <a href="presentacion"><i></i>PRESENTACIÓN</a>
                    </li>
                    <li  class="menu-item">
                         <a href="tipoproducto"></i>TIPO DE PRODUCTO</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
               <a  href="#"><i class="iconos icon6"></i>CONTROL DE PRODUCTO</a>
               <ul  class="sub-menu">
                   <li class="menu-item">
                        <a href="controlcaducidad"><i></i>CONTROL FECHA DE CADUCIDAD</a>
                   </li>
                   <li  class="menu-item">
                        <a href="controlstock"><i></i>CONTORL POR STOCK</a>
                   </li>
               </ul>
            </li>

            <li class="menu-item">

               <a  href="oferta">
                   <i class="iconos icon7"></i>OFERTAS</a>

            </li>

            <li class="menu-item">



                <a href="usuarios"><i class="iconos icon8"></i>USUARIO</a>

            </li>
            <li class="menu-item">
                <a  href="reportes"><i class="iconos icon9"></i>REPORTES</a>
            </li>

        </ul>
    </nav>
</div>
