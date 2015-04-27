<?php
session_start();
require ('conexion.php');
//Datos de la conexion
$host = 'localhost';
$usr = 'root';
$pass = '';
$bd = 'progresardb';

// Datos recibidos
$user = $_POST['user'];
$pass = $_POST['pass'];
/* if(TRUE){ //si esta logueado, 
  //iniciamos sesion
  $_SESION['user'] = $user;

  echo $_SESION['user'];
  echo 'Usuario autorizado'; */
if ($link = conectarse($host, $usr, $pass, $bd)){ //pregunto si existe el usuario en la base de datos
    //echo'aaaaaaaaaaaaaaaaaaaaaaa'; exit;
    $sql = 'SELECT * FROM propietario WHERE usuario="'.$user.'"AND contrasena="'.$pass.'"';
    $query = mysql_query($sql, $link);
    //lo recuperado de la consulta lo guardamos en un array
    $row = mysql_fetch_array($query);

    if (mysql_num_rows($query) == 1) {
        $_SESSION['id'] = $row['usuario'];
        echo"<script>window.location.href='listado.php';</script>";
    } else {
        echo 'Uusuario no autorizado';
    }
}
?>