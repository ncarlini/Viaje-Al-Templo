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
<meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/jquery-ui.css">
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd/mm/yy',
	  yearRange: "1900:+nn"
    });
  });
   
  </script>
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
<form enctype='multipart/form-data' action='processeditarrec.php?id=<?php echo $id?>' method='post'>
<?php
   $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	$query1 = sprintf("SELECT * FROM onlineform  WHERE id ='%s'", mysql_real_escape_string( $id ));
	$result1 = mysql_query($query1);
	$row = mysql_fetch_row($result1);
?>
<table border="1" cellspacing="1" style="border-collapse: collapse; width: 50%; height: 50%;" bordercolor="#FFFFFF" cellpadding="5">
  <tr>
<td colspan="3" bgcolor="#CCCCCC" bordercolor="#F0F0F0" style="height: 17px">
<p align="left\> <font size="4" face="Verdana" color="#FFFFFF"><strong>
<span class="auto-style1">Editar Registro: 
</span></span></strong></td>
</tr>

	<tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="4">Nombre: </span></div></td>
	<td height="30" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px"><div align="left"><span class="Estilo4"><font face="Verdana" size="4">
		<font face="Verdana"><p> <textarea name="Nombre" cols="20" rows="1"><?php echo $row[1];?></textarea> </p>
	</td>
</tr>

<tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="4">Apellido: </span></div></td>
	<td height="30" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px"><div align="left"><span class="Estilo4"><font face="Verdana" size="4">
		<font face="Verdana"><p> <textarea name="Apellido" cols="20" rows="1"><?php echo $row[2];?></textarea> </p>
	</td>
</tr>

<tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
  <div align="left"><font face="Verdana" size="4">Sexo: </div></td>
  <td height="30" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px"><select name='Sexo'>
  <option selected="selected"><?php 	echo $row[6];?></option>
  <option value="M">M </option>
  <option value="F">F </option>
</select></td>

<tr><td height="30" width="8" bgcolor="#999999" bordercolor="#A4C2C2">&nbsp;</td>
<td height="30" width="118" bgcolor="#999999" bordercolor="#A4C2C2">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="4">Fecha de Nacimiento:</span></div></td>
<td height="30" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px">
<font face="Verdana">
<input type="text" id="datepicker" name="FechaDeNacimiento" cols="10" rows="1" Value="<?php echo $row[5];?>"/></td>

<tr><td height="30" width="8" bgcolor="#999999" bordercolor="#A4C2C2">&nbsp;</td>
<td height="30" width="118" bgcolor="#999999" bordercolor="#A4C2C2">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="4">DNI:</span></div></td>
<td height="30" bordercolor="#FFFFFF" bgcolor="#EFF3F7" style="width: 177px">
<font face="Verdana">
<textarea name="DNI" cols="10" rows="1"><?php 	echo $row[3];?> </textarea></td>


</tr><tr><td colspan="3" bgcolor="#CCCCCC" height="25"><p align="center"><font face="Verdana" size="4">
		<input name="Editar" type=submit value='Editar' id="Editar">
        <input type="button" onClick="javascript:window.close()" value='Cerrar' id="cerrar"</> 
</font></a></td></tr>
</table>
</form>

