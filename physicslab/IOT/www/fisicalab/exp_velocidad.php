<?php 
            
            
            $distancia = array(0.30,0.43,0.26,0.25);
            $Sensor = array("Infra_1_2","Infra_2_3","Infra_3_4","Infra_4_5");
            $Magnitud = array("Velocidad_1","Velocidad_2","Velocidad_3","Velocidad_4",);
            $fecha = array();
            $Tiempo = array();
            $resDato = array();
            $velocidad = array();

            $conexion = new Conexion();
            $cnn = $conexion->getConexion();
            $sql = "SELECT * FROM datos";
            $fechaSQL = "SELECT Fecha FROM datos";
            $stmt = $cnn->query($fechaSQL);
            $statement = $cnn->query($sql);
            $st = $cnn->query($sql);
            $valorFecha = $statement->execute(); 
            $valor = $statement->execute();

          
          
      
            while($row = $stmt->fetchAll(PDO::FETCH_COLUMN)){
                for($i = 0; $i < 4; $i++){
                $fecha[$i] = $row[$i];
             
            }}

            while($row1 = $statement->fetchAll(PDO::FETCH_COLUMN, 2)){ 
                for($i = 0; $i < 4; $i++){
                $Tiempo[$i] = $row1[$i];
                }}
            
            for($i = 0; $i < 4; $i++){
            $velocidad[$i] = $distancia[$i] / $Tiempo[$i];
            }
       
            for ($i = 0; $i < 4 ; $i++) {
            $resDato[$i] = round($velocidad[$i], 3);
            }

            for($i = 0; $i < 4; $i++){
                echo '</tr>';
                echo '<td>'.$resDato[$i].' cm/s</td>';
                echo '<td>'.$Magnitud[$i].'</td>';
                echo '<td>'.$Sensor[$i].'</td>';
                echo '<td>'.$fecha[$i].'</td>';
                echo '</tr>';   
                }
            
            
            include("fisicalab/cerrar_conexion.php");
        
            ?>