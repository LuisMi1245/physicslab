<?php
if($_POST){
    $passDB = $_POST['montarDB'];
    $keyDB = "fisicalab12345";
if($passDB == $keyDB){
    require 'montarDB.php';
    echo '<p>Se ha creado correctamente la base de datos. <i class="material-icons">check</i></p>';
}else{echo '<p>Contraseña incorrecta <i class="material-icons">close</i></p>';}}
?>
