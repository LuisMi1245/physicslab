<?php
require 'Conexion.php'; //Agregamos la conexión
require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería
include 'funciones.php';

$nombreArchivo = 'datos.xlsx';
// Cargo la hoja de cálculo
$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
//Asigno la hoja de calculo activa
$objPHPExcel->setActiveSheetIndex(0);
//Obtengo el numero de filas del archivo
$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


for ($i = 1; $i <= $numRows; $i++) {
    $Sensor = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    $Dato = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
    $Magnitud = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
    $Fecha = date("H:i:s");

    $sql = "INSERT INTO datos(Sensor, Dato, Magnitud, Fecha) VALUES('$Sensor', '$Dato', '$Magnitud', '$Fecha')";        
        $conexion = new Conexion();
        $cnn = $conexion->getConexion();
        $statement = $cnn->query($sql); 
}
include("cerrar_conexion.php");
echo "Los datos han sido guardados correctamente, puede continuar el experimento."
?>