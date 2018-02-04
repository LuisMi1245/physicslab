<?php
require 'fisicalab/Classes/PHPExcel/IOFactory.php'; //Agregamos la librería
require 'fisicalab/funciones.php';

//Variable con el nombre del archivo
$nombreArchivo = 'fisicalab/datos.xlsx';
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

		echo '<tr>';
		echo '<td>'. $Sensor.'</td>';
		echo '<td>'. $Dato.' Seg</td>';
		echo '<td>'. $Magnitud.'</td>';
		echo '<td>'. $time = date("H:i:s a - j M");
        echo '</tr>';
    }
    ?>