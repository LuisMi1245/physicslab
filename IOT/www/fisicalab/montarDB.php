<?php
class Montar_DB {
    protected $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;", "root", "");  
    }
     //creamos la base de datos y las tablas que necesitemos
    public function my_DB(){
               //creamos la base de datos si no existe
    $crear_db = $this->pdo->prepare('CREATE DATABASE IF NOT EXISTS lectura_exclec DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci');
    $crear_db->execute();
 
    //decimos que queremos usar la tabla que acabamos de crear
     if($crear_db):
     $use_db = $this->pdo->prepare('USE lectura_exclec');   
     $use_db->execute();
     endif;

     //si se ha creado la base de datos y estamos en uso de ella creamos las tablas
     if($use_db):
    //creamos la tabla usuarios
    $crear_tb = $this->pdo->prepare('CREATE TABLE IF NOT EXISTS datos (
        id int(20) NOT NULL AUTO_INCREMENT,
        Sensor varchar(25) COLLATE utf8_spanish_ci NOT NULL,
        Dato float(25) NOT NULL,
        Magnitud varchar(25) COLLATE utf8_spanish_ci NOT NULL,
        Fecha time NOT NULL,
        PRIMARY KEY (id)
        )');
        $crear_tb->execute();
        endif;
}}

//ejecutamos la función my_db para crear nuestra bd y las tablas
$db = new Montar_DB();
$db->my_DB();

?>