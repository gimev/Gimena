<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('conexion.php');

$host='localhost';
$user='root';
$pass='';
$db='progresardb';
$patente=$_GET['id']; //averiguarrrrr GET

if($link=conectarse($host, $user, $pass, $db )){

	$sql='delete from vehiculos where patente='.$patente ;

//ya hicimos la consulta y ahora la funciòn
	$query= mysql_query($sql,$link);
	if($query){
		echo'<script>window.location.href="lista.php"; </script>';
	}else {
		echo'Datos no eliminado';
		echo'<a href="lista.php">Volver</a>';

	}
}


?>

