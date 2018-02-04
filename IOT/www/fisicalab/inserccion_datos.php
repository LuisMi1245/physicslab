<?php
require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería
require 'conexion.php'; //Agregamos la conexión
require 'funciones.php';

//Variable con el nombre del archivo
$nombreArchivo = 'fisicalab/datos.xlsx';
// Cargo la hoja de cálculo
$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

//Asigno la hoja de calculo activa
$objPHPExcel->setActiveSheetIndex(0);
//Obtengo el numero de filas del archivo
$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

		for ($i = 1; $i <= $numRows; $i++) {
		$sql;
		$Sensor = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$Dato = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$Magnitud = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
/*
		echo '<tr>';
		echo '<td>'. $Sensor.'</td>';
		echo '<td>'. $Dato.' Seg</td>';
		echo '<td>'. $Magnitud.'</td>';
		echo '<td>'. $time = date("H:i a - j M");
		echo '</tr>';
*/
		$sql = "INSERT INTO datos(Sensor, Dato, Magnitud) VALUES('$Sensor','$Dato','$Magnitud')";
		$result = $conexion->query($sql);
		}
		include("fisicalab/cerrar_conexion.php");

?>
