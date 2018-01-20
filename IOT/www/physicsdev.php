<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  <meta charset=utf-8>
  <meta name=description content="">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>Laboratorio de física</title>
</head>

<body>
  <nav class="nav-extended green">
    <div class="nav-wrapper">
      <a href="index.html" class="brand-logo flow-text">PhysicslAB</a>


      <!-- Aqui inicia la barra de navegacion extendida con listas ordenadas -->
      <ul class="right hide-on-med-and-down">


        <li><a href="index.html">Inicio</a></li>
        <li><a href="#">Pasteles</a></li>
        <li><a href="#">Helados</a></li>
        <li><a href="#">Dulces</a></li>
        <li><a href="#">Contactenos</a></li>
      </ul>


      <ul id="slide-out" class="side-nav">
        <li>
          <div class="user-view">
            <div class="background">
              <img src="images/verde.png">
            </div>
            <a href="#!user"><img class="circle" src="images/yuna.png"></a>
            <a href="#!name"><span class="white-text name">I.E Victoria Manzur</span></a>
            <a href="#!email"><span class="white-text email">fanny.guarin16@gmail.com</span></a>
          </div>
        </li>
        <li><a href="physics.php">Menú principal</a></li>
        <li><a class="waves-effect" href="#!">Actividades propuestas</a></li>
        <li>
          <div class="divider"></div>
        </li>
        <li><a class="subheader">Síganos</a></li>
        <li><a href="#!"><i class="material-icons">cloud</i>Acerca de nosotros</a></li>
        <li><a href="#!"><i class="material-icons">cloud</i>Proyecto PhysicslAB</a></li>
        <li><a href="#!"><i class="material-icons">cloud</i>Posibles participantes</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <!-- Physics lab proceso -->
  <table class="highlight centered responsive-table flow-text white">
    <thead class="z-depth-2">
      <tr>
        <th style="font-size: 18px">Datos</th>
        <th style="font-size: 18px">Magnitud</th>
        <th style="font-size: 18px">Sensor</th>
        <th style="font-size: 18px">Fecha</th>
      </tr>
    </thead>
    <tbody>

      <?php
require 'fisicalab/conexion.php'; //Agregamos la conexión|

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

include("fisicalab/cerrar_conexion.php");?>
    </tbody>
  </table>


  <div class="green">

    <div class="row">
      <div class="z-depth-2">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Otras magnitudes</span>
            <p class="flow-text">Distancia: Recuerda que la distancia, en este caso, es una magnitud figurativamente constante, ya que estas se encuentran predefinidas y no se modifican, es decir, son valores fijos entre sensores.</p>
            <br>
            <span class="card-title">Distancias:</span>
            <ul class="flow-text">
              <li>Dist_1 (Sensor 1 y 2) = 0.30 cm</li>
              <li>Dist_2 (Sensor 2 y 3) = 0.43 cm</li>
              <li>Dist_3 (Sensor 3 y 4) = 0.26 cm</li>
              <li>Dist_4 (Sensor 4 y 5) = 0.25 cm</li>
            </ul>
          </div>
          <div class="card-action">
            <a href="physicsdev.php">Generar magnitudes derivadas (Velocidad y aceleración)</a>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="z-depth-2">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title"> 
<hr>Consejos y actividades</span>
            <hr>
            <br>
            <p class="flow-text">Consejos:
              <ol class="flow-text">
                <li> Recuerda que las magnitudes derivadas, son aquellas que se definen en función de las fundamentales. Como por ejemplo: Velocidad, aceleración, fuerza, área, entre otras.</li><br>
                <li>En cambio, las magnitudes fundamentales son las que se definen por sí solas, es decir, independientemente, como la longitud, la masa, el tiempo, la cantidad de materia, etc...</li><br>
                <li>Cabe recalcar, así mismo, que en la fisica encontramos sistemas que definen la unidad de medida para comparar con ella otras cantidades de la misma especie. Por lo tanto, cualquier sistema, se caracteriza por el conjunto de unidades utilizados
                  en ella.<br> En fisíca se emplean disferentes sistemas, pero en este caso, haremos uso del sistema C.G.S (centímetro, gramo, segundo).
                  <br>
                  <br>
                  <h5>Fundamentales:</h5>
                  <ul>
                    <li>Longitud ---> Centímetro (cm)</li>
                    <li>Masa ------> Gramo (gr)</li>
                    <li>Tiempo -----> Segundo (s)</li>
                  </ul>
                  <br>
                  <h5>Derivadas:</h5>
                  <ul>
                    <li>Velocidad ---> Centímetro sobre segundo (cm/s)</li>
                    <li>Aceleración -> Centímetro sobre segundo cuadrado (cm/s°2)</li>
                    <li>Área -------> Centímetro cuadrado (cm°2)</li>
                    <li>Volumen -----> Centímetro cúbico (cm°3)</li>
                  </ul>
                  <br>
                </li>
                <li><a href="#">Actividades y ejercicios propuestos</a></li>
              </ol>
            </p>
          </div>
          <div class="card-action">
            <a href="#">Generar magnitudes derivadas (Velocidad y aceleración)</a>
          </div>
        </div>
      </div>
    </div>
   <footer class="page-footer green">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Laboratorio de física.<br>(Creative Commons)</h5>
                  <p class="grey-text text-lighten-4">Derechos de autor: © VicmanMakers 2018.</p>
                  <p>Cualquier contenido asociado a la plataforma PhysicslAB, se atribuyen respectivamente los derechos de autor correspondientes a los desarrolladores del contenido y plataforma.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links</h5>
                  <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Whatsapp</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Instragram</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
                © 2018 Copyright VicmanMakers
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
              </div>
            </div>
          </footer>


  </div>
  <script src="js/jquery.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
    $(".button-collapse").sideNav();
  </script>
</body>

</html>