<?php 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){echo "usuario no logueado";}
include("config.inc.php");
$id = $_GET['id'];
//$id = $_POST["id"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<style type="text/css">
.Estilo3 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #CC0000;
}
.new {
	font-family: Verdana, Geneva, sans-serif;
}
</style>
<style type="text/css">
.auto-style1 {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<form enctype='multipart/form-data' action='processeditar.php?id=<?php echo $id?>' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse; width: 100%; height: 100%;" bordercolor="#FFFFFF" cellpadding="5">
  <tr>
<td colspan="3" bgcolor="#CCCCCC" bordercolor="#F0F0F0" style="height: 17px">
<p align="left\> <font size="4" face="Verdana" color="#FFFFFF"><strong>
<span class="auto-style1">Editar Pasaje: 
</span></span></strong></td>
</tr>

	<tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
	&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">


  <div align="left"><span class="Estilo4"><font face="Verdana" size="4">Miembro: </span></div></td>
<td height="30" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px"><div align="left"><span class="Estilo4"><font face="Verdana" size="4">
<font face="Verdana"><p>
<label for="Miembro"><?php
   $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	$query1 = sprintf("SELECT onlineform.apellido, onlineform.nombre, anotados.fecha  FROM onlineform  INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.id ='%s'", mysql_real_escape_string( $id ));
	$result1 = mysql_query($query1);
	$row = mysql_fetch_row($result1);
	echo $row[0], " , ",$row[1] ;
?>
</label>
&nbsp;</p></td>
</tr>


<tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
  <div align="left"><font face="Verdana" size="4">Ordenanza Personal: </div></td>
  <td height="30" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px"><select name='OrdenanzaPersonal'>
  <option value="No" selected="selected"><?php
   $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	$query1 = sprintf("SELECT anotados.ordenanza  FROM onlineform  INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.id ='%s'", mysql_real_escape_string( $id ));
	$result1 = mysql_query($query1);
	$row = mysql_fetch_row($result1);
	echo $row[0];
?></option>
  <option value="Investidura">Investidura Propia </option>
  <option value="Sellamiento">Sellamiento </option>
   <option value="No">No </option>
</select></td></tr>
<tr><td height="30" width="8" bgcolor="#999999" bordercolor="#A4C2C2">&nbsp;</td>
<td height="30" width="118" bgcolor="#999999" bordercolor="#A4C2C2">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="4">Comentarios:</span></div></td>
<td height="30" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px">
<font face="Verdana">
<textarea name="Comentarios" cols="70" rows="5"><?php
   $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	$query1 = sprintf("SELECT anotados.comentario  FROM onlineform  INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.id ='%s'", mysql_real_escape_string( $id ));
	$result1 = mysql_query($query1);
	$row = mysql_fetch_row($result1);
	echo $row[0];
?></textarea></td>
</tr><tr><td colspan="3" bgcolor="#CCCCCC" height="25"><p align="center"><font face="Verdana" size="4">
		<input name="Anotar" type=submit value='Editar' id="Anotar">
        <input type="button" onClick="javascript:window.close()" value='Cerrar' id="cerrar"</> 
</font></a></td></tr>
</table>
</form>

