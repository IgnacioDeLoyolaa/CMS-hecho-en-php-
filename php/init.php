<?php
 session_start();
 require 'Medoo.php';

 use Medoo\Medoo;

 try{
 $database = new Medoo([
     // [required]
     'database_type' => 'mysql',
     'server' => 'localhost',
     'database_name' => 'myweb',
     'username' => 'usuario-myweb',
     'password' => 'Atletico10.',
]);}catch(PDOException $e){
     echo "No se pudo conectar a la base de datos";
 }


?>
