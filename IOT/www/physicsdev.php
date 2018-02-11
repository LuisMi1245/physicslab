<!DOCTYPE html>
<html>
<head>

  <link href="fonts/icons/MaterialIcons-Regular.woff" rel="stylesheet">
  <link href="fonts/icons/MaterialIcons-Regular.woff2" rel="stylesheet">
  <link href="css/icons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  <meta charset=utf-8>
  <meta name=description content="">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>Laboratorio de física</title>
</head>

<body>
  <nav class="nav-extended green">
    <div class="nav-wrapper">
      <a href="physics.php" class="brand-logo flow-text center hoverable">PhysicslAB</a>


      <!-- Aqui inicia la barra de navegacion extendida con listas ordenadas -->
      <ul class="right hide-on-med-and-down">
        <li><a href="physics.php">Inicio</a></li>
        <li><a href="proyecto.html">Proyecto</a></li>
        <li><a href="acerca_de_nosotros">Nosotros</a></li>
        <li><a href="partcipantes.html">Participantes</a></li>
        <li><a href="instructivo.html">Instructivo</a></li>
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
        <li><a href="acerca_de_nosotros.html"><i class="material-icons">cloud</i>Acerca de nosotros</a></li>
        <li><a href="proyecto.html"><i class="material-icons">cloud</i>Proyecto PhysicslAB</a></li>
        <li><a href="partcipantes.html"><i class="material-icons">cloud</i>Participantes</a></li>
        <li><a href="instructivo.html"><i class="material-icons">cloud</i>Instructivo</a></li>

      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <br>

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
          <?php require 'fisicalab/exp_velocidad.php'; ?>
          </tbody>
        </table>
    <br>
     <blockquote class="flow-text">
     Aceleración del objeto = <?php include('fisicalab/exp_aceleracion.php'); ?>  m/s°2 
     </blockquote>

    <button class="btn waves-effect waves-light green" id="miboton2" type="button" onClick="window.location.href='physics.php'"/>Repetir experimento<i class="material-icons right">autorenew</i></button>

    <button data-target="modal1" class="btn modal-trigger green"/>Obtener Ayuda<i class="material-icons right">help</i></button>


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
    <div class="modal-content">
    <h4>¿Cómo es el proceso?</h4>
    <p>A partir de magnitudes como las de "tiempo", y las distancias, determinamos las respectivas velocidades, y luego, a travéz de la formula de la aceleración:</p>    
    <img src="images/aceleracion.jpg">
    <p>
    Obtenemos la aceleración del objeto, siendo así velocidad 4 y 3, tiempo 4 y 3, los que determinan su aceleración.
    </p>
    </div>
    <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Entiendo</a>
    </div>
    </div>
        


    <div class="green">
    <br>
    <div class="container">
      <div class="row">
        <div class="z-depth-2">
          <div class="card blue-grey darken-1 card-panel hoverable">
            <div class="card-content white-text">
              <span class="card-title"><hr>Otras magnitudes<hr></span>
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
              <a href="physics.php">REPETIR EXPERIMENTO (MENÚ PRINCIPAL)</a>
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
                <ol class="flow-text">
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
              <a href="physics.php">REPETIR EXPERIMENTO (MENÚ PRINCIPAL)</a>
            </div>
          </div>
        </div>
      </div>

      <footer class="page-footer green">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Laboratorio de física.<br>(Open Source)</h5>
              <p class="grey-text text-lighten-4">Autor: by VicmanMakers and CreatorslAB 2018 .</p>
              <p>Cualquier contenido asociado al aplicativo PhysicslAB (imagenes, textos, material audiovisual, son usados con fines netamente educativos y se atribuyen respectivamente los derechos de autor correspondientes a los desarrolladores del contenido.</p>
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
    <script>
      $(document).ready(function() {
        $('.collapsible').collapsible();
      });
    </script>
    <script> 
     $(document).ready(function() {
    $('.modal').modal();
    });
    </script>
</body>
</html>
