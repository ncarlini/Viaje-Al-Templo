<?php
session_start();
include("config.inc.php");
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){echo "usuario no logueado";} //$FechaDeViaje = $_GET['FechaDeViaje'];
$id = $_GET['id'];
$db = mysql_connect($hostname,$username,$password);
mysql_select_db($dbname);
$query2 = "SELECT anotados.id, onlineform.apellido, onlineform.nombre, anotados.fecha, onlineform.barrio FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.id ='".$id."'";
$result2 = mysql_query($query2);
$query = "delete from anotados where id='".$id."'";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result2);
$anotados = $row['fecha'];
$mensaje = "Mes del Viaje: " .$row['fecha'] ." - " .$row['apellido']." ".$row['nombre']." - ".$row['barrio'];
$titulo = "Baja de Viaje: ".$row['apellido']." ".$row['nombre']." - ".$row['barrio'];
	$query1 = sprintf("select `Correo` from `members` WHERE `username`='%s'", mysql_real_escape_string( $myusername ));
		$result1 = mysql_query($query1);
		$result3 =  mysql_fetch_array($result1);
		$toemail = implode(", ",$result3);
$mensaje = stripslashes($mensaje);
mail($toemail,$titulo,$mensaje,"From: info@viajealtemplo.com.ar");
header("Refresh: 0;url=fechareserva.php");
?>