<?php
require 'funciones.php';
include('conexion.php');

$res = mysqli_query($conexion,"SELECT*FROM datos  WHERE Sensor='Infrar_1_2'") or die(mysqli_error()); 

while ($consulta = mysqli_fetch_array($res)) {  
$rows['0'] = $consulta['Dato'];
$rows['1'] = $consulta['Sensor'];
} 
$tiempo['0']= $rows['0'];
$sensor['0']= $rows['1'];
$res = mysqli_query($conexion,"SELECT*FROM datos  WHERE Sensor='Infrarojo 2 y 3'") or die(mysqli_error()); 
while ($consulta = mysqli_fetch_array($res)) {  
$rows['0'] = $consulta['Dato'];
$rows['1'] = $consulta['Sensor'];
} 
$tiempo['1'] = $rows['0'];
$sensor['1']= $rows['1'];
$res = mysqli_query($conexion,"SELECT*FROM datos  WHERE Sensor='Infrarojo 3 y 4'") or die(mysqli_error()); 
while ($consulta = mysqli_fetch_array($res)) {  
$rows['0'] = $consulta['Dato'];
$rows['1'] = $consulta['Sensor'];
}
$tiempo['2'] = $rows['0'];
$sensor['2']= $rows['1'];
$res = mysqli_query($conexion,"SELECT*FROM datos  WHERE Sensor='Infrarojo 4 y 5'") or die(mysqli_error()); 
while ($consulta = mysqli_fetch_array($res)) {  
$rows['0'] = $consulta['Dato'];
$rows['1'] = $consulta['Sensor'];
} 
$tiempo['3'] = $rows['0'];
$sensor['3']= $rows['1'];

$distancia = array(0.30,0.43,0.26,0.25);
$velocidad = array();
$respuesta = array();

for ($i = 0; $i < 4 ; $i++) {
  $velocidad[$i]=$distancia[$i]/$tiempo[$i];
}
for ($i = 0; $i < 4 ; $i++) {
  $respuesta[$i] = redondear($velocidad[$i],1);
}
$magnitud='Velocidad';
for ($i = 0; $i < 4; $i++) {
echo '</tr>';
echo '<td>'. $respuesta[$i].' cm/s'.'</td>';
echo '<td>'.$magnitud.'</td>';  
echo '<td>'.$sensor[$i].'</td>';
echo '<td>'. $time = date("H:i a - j M").'</td>';
echo '</tr>';
}

include("cerrar_conexion.php");
?>