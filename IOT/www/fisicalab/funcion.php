<?php

date_default_timezone_set('America/Bogota');

function redondear($valor_a_truncar, $decimales){
switch ($decimales) {
case 1:
$float_truncado = round($valor_a_truncar * 10)/10;
return $float_truncado;
break;
case 2:
$float_truncado = round($valor_a_truncar * 100)/100;
return $float_truncado;
break;
case 3:
$float_truncado = round($valor_a_truncar * 1000)/1000;
return $float_truncado;
break;
case 4:
$float_truncado = round($valor_a_truncar * 10000)/10000;
return $float_truncado;
break;
case 5:
$float_truncado = round($valor_a_truncar * 100000)/100000;
return $float_truncado;
break;
default:
echo 'NO ES POSIBLE TRUNCAR';     
break;
}}
?>