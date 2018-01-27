<?php
require 'fisicalab/Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
require 'fisicalab/conexion.php'; //Agregamos la conexión

//Variable con el nombre del archivo
$nombreArchivo = 'fisicalab/datos.xlsx';
// Cargo la hoja de cálculo
$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

//Asigno la hoja de calculo activa
$objPHPExcel->setActiveSheetIndex(0);
//Obtengo el numero de filas del archivo
$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
?>

  <!DOCTYPE html>
  <html>

  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <title>Fisica Lab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Permite la codificacion de caracteres -->
    <meta charset="utf-8">

  </head>

  <body>
    <nav class="nav-extended green">
      <div class="nav-wrapper">

        <a href="physics.php" class="brand-logo flow-text">PhysicslAB</a>




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
          <li><a href="physicsdev.php">Hacer conversión</a></li>
          <li><a class="waves-effect" href="#!">Actividades propuestas</a></li>
          <li>
            <div class="divider"></div>
          </li>
          <li><a class="subheader">Síganos</a></li>
          <li><a href="acerca_de_nosotros.html"><i class="material-icons">cloud</i>Acerca de nosotros</a></li>
          <li><a href="proyecto.html"><i class="material-icons">cloud</i>Proyecto PhysicslAB</a></li>
          <li><a href="partcipantes.html"><i class="material-icons">cloud</i>Participantes</a></li>
          <li><a href="instructivo.html"><i class="material-icons">cloud</i>Instructivo</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>




    <!-- Physics lab proceso -->

    <table class="highlight centered responsive-table flow-text white">
      <thead class="z-depth-2">
        <tr>
          <th style="font-size: 18px">Sensor</th>
          <th style="font-size: 18px">Datos</th>
          <th style="font-size: 18px">Magnitud</th>
          <th style="font-size: 18px">Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php
for ($i = 1; $i <= $numRows; $i++) {
$sql;
$Sensor = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
$Dato = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
$Magnitud = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();  

echo '<tr>';
echo '<td>'. $Sensor.'</td>';
echo '<td>'. $Dato.' Seg</td>';
echo '<td>'. $Magnitud.'</td>';
echo '<td>'. $time = date("H:i a - j M");
echo '</tr>';

$sql = "INSERT INTO datos(Sensor, Dato, Magnitud) VALUES('$Sensor','$Dato','$Magnitud')";
$result = $conexion->query($sql);
} include("fisicalab/cerrar_conexion.php");

?>
      </tbody>
    </table>
    <div class="green">
      <br>


      <div class="container ">
        <div class="row">
          <div class="z-depth-2 ">
            <div class="card blue-grey darken-1 card-panel hoverable">
              <div class="card-content white-text">
                <span class="card-title"><hr>Otras magnitudes<hr></span>
                <p class="flow-text" style="font-size: 17px">

                  </style>Distancia: Recuerda que la distancia, en este caso, es una magnitud figurativamente constante, ya que estas se encuentran predefinidas y no se modifican, es decir, son valores fijos entre sensores.</p>
                <br>
                <span class="card-title">Distancias:</span>
                <ul class="flow-text" style="font-size: 17px">
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
      </div>


      <div class="container">
        <div class="row">
          <div class="z-depth-2">
            <div class="card blue-grey darken-1 card-panel hoverable">
              <div class="card-content white-text">
                <span class="card-title"> 
<hr>Consejos y actividades</span>
                <hr>
                <br>
                <p class="flow-text">Consejos:
                  <ol class="flow-text" style="font-size: 17px">
                    <li> Recuerda que las magnitudes derivadas, son aquellas que se definen en función de las fundamentales. Como por ejemplo: Velocidad, aceleración, fuerza, área, entre otras.</li><br>
                    <li>En cambio, las magnitudes fundamentales son las que se definen por sí solas, es decir, independientemente, como la longitud, la masa, el tiempo, la cantidad de materia, etc...</li><br>
                    <li>Cabe recalcar, así mismo, que en la fisica encontramos sistemas que definen la unidad de medida para comparar con ella otras cantidades de la misma especie. Por lo tanto, cualquier sistema, se caracteriza por el conjunto de unidades
                      utilizados en ella.<br> En fisíca se emplean disferentes sistemas, pero en este caso, haremos uso del sistema C.G.S (centímetro, gramo, segundo).
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
      </div>


      <footer class="page-footer green">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Laboratorio de física.<br>(Creative Commons)</h5>
              <p class="grey-text text-lighten-4">Derechos de autor: (CC) VicmanMakers 2018.</p>
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
            2018 (CC) VicmanMakers
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