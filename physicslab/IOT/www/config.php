<!DOCTYPE html>

<html>

<head>

  <link href="fonts/icons/MaterialIcons-Regular.woff" rel="stylesheet">
  <link href="fonts/icons/MaterialIcons-Regular.woff2" rel="stylesheet">
  <link href="css/icons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  <title>Fisica Lab</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Permite la codificacion de caracteres -->
  <meta charset="utf-8">

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
      
        <li>
          <div class="divider"></div>
        </li>
        <li><a class="subheader">Configuración</a></li>
        <li><a href="acerca_de_nosotros.html"><i class="material-icons">account_circle</i>Acerca de nosotros</a></li>
        <li><a href="proyecto.html"><i class="material-icons">book</i>Proyecto PhysicslAB</a></li>
        <li><a href="partcipantes.html"><i class="material-icons">face</i>Participantes</a></li>
        <li><a href="instructivo.html"><i class="material-icons">laptop_windows</i>Instructivo</a></li>
        <li><a href="config.php"><i class="material-icons">settings</i>Configuración</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  <div id="flow-text" class="card-panel flow-text">
    <p>
      <blockquote>
        <small>Si no ha montado manualmente una base de datos para la instalación, hágalo escribiendo la contraseña (solicite al administrador) y presione el botón <u>MONTAR BASE DE DATOS</u>.</small>
      </blockquote>
      <div class="row">
        <form action="fisicalab/config_2.php" method="POST" class="col s12">
          <div class="input-field col s12">
            <input name="montarDB" id="password" type="password" class="validate">
            <label for="password">Contraseña</label>
          </div>
          <input id="miboton2" class="btn waves-effect waves-light green" type="submit" value="MONTAR BASE DE DATOS" /></input>
        </form>
      </div>
    </p>
    <br>

    <blockquote>
      <small>Si los datos que se muestran en pantalla, <em>no son correctos</em> o como usted esperaba, escriba la contraseña (solicite al administrador) y  presione el botón <u>COMENZAR DE NUEVO</u>.
</small>
    </blockquote>


    <div class="row">
      <form action="config.php" method="POST" class="col s12">
        <div class="input-field col s12">
          <input name="ingreso" id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
        <input id="miboton2" class="btn waves-effect waves-light green" type="submit" value="COMENZAR DE NUEVO" /></input>
      </form>
    </div>


    <?php
if($_POST){
$pass = $_POST['ingreso'];
$key = "fisicalab12345";

if($pass == $key){
require 'fisicalab/Conexion.php';
$sql = "TRUNCATE TABLE datos";        
$conexion = new Conexion();
$cnn = $conexion->getConexion();
$statement = $cnn->query($sql); 
$sql = "DROP DATABASE lectura_exclec";
$conexion = new Conexion();
$cnn = $conexion->getConexion();
$statement = $cnn->query($sql);
require 'fisicalab/cerrar_conexion.php';
echo '<p>Se han eliminado los registros. Instale nuevamente la base de datos. <i class="material-icons">check</i></p>';
}else{
    echo '<p>Contraseña incorrecta <i class="material-icons">close</i></p>';
}}
?>

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


  <script src="js/jquery.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
    $(".button-collapse").sideNav();
  </script>
</body>

</html>
