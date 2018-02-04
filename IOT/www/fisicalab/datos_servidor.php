<?php
require 'Conexion.php';

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "SELECT * FROM datos";
$statement = $cnn->query($sql); 
$valor = $statement->execute();


  if($valor){
      while($consulta = $statement->fetch(PDO::FETCH_ASSOC)){
        $data['data'][] = $consulta; 
    }
    echo json_encode($data);
      }else{
      echo "Error";
  }
?>