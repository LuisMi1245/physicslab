<?php

$operacion = $_POST['lista'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$res;	

switch ($operacion){
case 'sumar':
	$res = $c1 + $c2 + $c3;	
	echo "El resultado es: ". $res; break;
case 'restar':
	$res = $c1 - $c2 - $c3;
	echo "El resultado es: ".$res; break;
case 'multiplicar':
	if ($c1==0) $c1 = 1;
	if ($c2==0) $c2 = 1;
	if ($c3==0) $c3 = 1;
	$res = $c1 * $c2 * $c3;			
	echo "El resultado es: ".$res; break;
case 'dividir':
	if ($c1==0) $c1 = 1;
	if ($c2==0) $c2 = 1;
	if ($c3==0) $c3 = 1;
	$res = $c1 / $c2 / $c3;
	echo "El resultado es: ".$res; break;
default:
	echo "ERROR_OPERATION_UNEXPECTED"; break;}
?>