<?php

class ControladorOfertas{
/* MOstrar ofertas*/
static public function ctrMostrarOfertas($item, $valor){
    $tabla="oferta";
    $res=ModeloOferta::mdlMostrarOfertas($tabla,$item, $valor);
return $res;
}
}