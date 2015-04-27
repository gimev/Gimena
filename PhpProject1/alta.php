<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ('conexion.php'); //invoco a todo lo qe esta en el arch conexion.php

	//variables
    $patente=$_POST['patente'];
    $modelo=$_POST['modelo'];
    $anio=$_POST['anio'];
	$nombre= $_POST['nombre']; //muestra solo un valor en especifico
	$apellido= $_POST['apellido'];
	$estado= $_POST['estado'];
	$fechaIngreso=$_POST['fechaIngreso'];
	$fechaEgreso=$_POST['fechaEgreso'];
	$observacion= $_POST['observacion'];

	/*echo "<pre>"; //echo p mostrar contenido html, POST get son srreglos, pre solo muestra la informacion
	print_r ($_POST);
	echo"<pre>";*/




	//valida el ingreso si o si de la patente
	if($patente ==""){
		echo"<script>window.location.href='registro.html';</script>";
	}

	$host='localhost';
	$user='root';
	$pass='';
	$db='progresardb';

	if($link = conectarse($host, $user, $pass, $db)){
		//insertar datos
		$sql='insert into vehiculos(patente,modelo,anio,nombre,apellido,estado,fechaIngreso, fechaEgreso ,observacion) values("'.$patente.'","'.$modelo.'","'.$anio.'","'.$nombre.'","'.$apellido.'","'.$estado.'","'.$fechaIngreso.'","'.$fechaEgreso.'","'.$observacion.'")';
		$query = mysql_query($sql, $link);

		if($query){
			echo"<script>window.location.href='lista.php'; </script>"; //goglearrrrr window
		}else {
			echo'Los Datos NO han sido guardados';
			echo '<a href="registro.html">Volver</a>';
		}

		/*if($query){
			echo'datos guardados';
		}else {
			echo'Los datos no se guardaron';
		}
	}*/
}

?>
