 <?php
 require 'fisicalab/Conexion.php';
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT * FROM datos";
    $st = $cnn->query($sql);

      if($st->fetchColumn() == 0){
        echo '<script>alert("ERROR: NO HA GUARDADO LOS DATOS");
        window.location.assign("physics.php")</script>';
        }
      else{
        include('fisicalab/exp_velocidad.php');
} ?> 