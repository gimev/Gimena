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
$patente = @$_GET['id'];


$link=conectarse ($host, $user, $pass, $db);

if(@$_POST['editar']){ //si se presiona el boton editar, actualiza
	$patente=$_POST['patente'];
    $modelo=$_POST['modelo'];
    $anio=$_POST['anio'];
	$nom = $_POST['nombre'];
	$ape = $_POST['apellido'];
	$estado= $_POST['estado'];
	$fechaIngreso=$_POST['fechaIngreso'];
	$fechaEgreso=$_POST['fechaEgreso'];
	$observacion= $_POST['observacion'];
	$patenteb = $_POST['patente'];

	$sql = "UPDATE vehiculos SET patente='$patente', modelo='$modelo', anio='$anio', nombre = '$nom', apellido= '$ape', estado = '$estado', fechaIngreso='$fechaIngreso', fechaEgreso='$fechaEgreso', observacion='$observacion' WHERE patente = $patenteb";


	$query=mysql_query($sql, $link);
	
	if($query){
		echo'<script>window.location.href="lista.php";</script>';
	}else {
		echo"<script> javascript>alert('Datos no modificadossss')</script>";
	}

} else {





	/*if($link=conectarse($host, $user, $pass, $db )){*/

	$sql= 'select * from vehiculos where patente='.(int)$patente ; //una vez echa la consulta, la ejecuto ahora

	$query=mysql_query($sql, $link);


	$row=mysql_fetch_array($query); 

	?>
	 

	 <form action="editar.php" method="POST">
	 	
		<fieldset>
			<legend> Datos Vehiculos </legend>
			<input type="hidden" name="patente" value="<?= $row['patente'] ?>"/> 
			<!-- Los tipos hidden son inputs ocultos, y estos sirven para pasar informacion a la pagina o algun tipo de script, sin que estos datos sean visibles para el usurio, pero que al escript le puedan servir de referencia. -->
			<label for="nombre"> Nombre </label>
			<input type="text"name="nombre" value="<?= $row['nombre']?>"/>
			<br>
			<label for="apellido"> Apellido </label>
			<input type="text"name="apellido"value="<?= $row['apellido']?>"/>
			<br>
			<!--<label for="sexo">Sexo</label>
				<select name="sexo">
				<option value='m'<?php echo($row['sexo']=='m')?'selected':'';?>> Femenino</option>
				<option value='h'<?php echo($row['sexo']=='h')?'selected':'';?>>Masculino</option>
				<option value='o'<?php echo($row['sexo']=='o')?'selected':'';?>>Otros</option>
				</select>
				<br>-->

			<input type="submit" name="editar"/>
			







		</fieldset>


	 </form>
	 
	 <?php } ?>

