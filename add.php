<?php 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){header("location: index.php");}
include("config.inc.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
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
  <TITLE>Viaje al Templo - Consola de Administracion</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"

<style type="text/css">

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form enctype='multipart/form-data' action='process.php' method='post'>
<table border="0" align="left" bordercolor="#FFFFFF" style="border-collapse: collapse; width: 667px;">
<tr><td colspan="3" bordercolor="#A4C2C2" bgcolor="#CCFFCC"><p><font size="2" face="Verdana"><b><font face="Verdana" size="2">

  </font>Agregar Nuevo Pasajero a la Base de Datos</b></font></p></td></tr><tr>
      <td colspan="3" bgcolor="#CCCCCC" bordercolor="#A4C2C2"><strong><font size="1" face="Verdana">
	  Los campos marcados con <span class="Estilo3">*</span> son obligatorios</font></strong></td></tr><tr>
		<td rowspan="8" bordercolor="#A4C2C2" bgcolor="#CCCCCC">
		&nbsp;</td>
        <td width="143" bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">
			Nombres </span></div></td>
<td bordercolor="#FFFFFF" bgcolor="#999999" style="width: 465px">
<input type=text name='Nombre' style="width: 366px"><font face="Verdana" size="2">*</td>
</tr>
    <tr>
      <td bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">
		  Apellido</span></div></td>
<td bordercolor="#FFFFFF" bgcolor="#999999" style="width: 465px">
<input type=text name='Apellido' style="width: 364px"><font face="Verdana" size="2">*</td>
</tr>
    <tr>
      <td nowrap="nowrap" bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">
	  <font face="Verdana" size="2">DNI</span>:</div></td>
<td width="235" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#999999"><input type="text" name='Numero' />
  <span class="Estilo3">*</span></td>
    </tr>
    <tr>
      <td nowrap="nowrap" bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4">

  <font face="Verdana" size="2">Fecha de Nacimiento</font></span></div></td>
<td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#999999" style="width: 465px">
<input type="text" id="datepicker" name='FechadeNacimiento' />
 <span class="Estilo3">*</span></td>
    </tr>
    <tr>
	
      <td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><font face="Verdana" size="2">
	  Sexo</td>
      <td height="28" bordercolor="#A4C2C2" bgcolor="#999999" style="width: 465px">
	  <select name='Sexo' id="Number">
        <option value='F'> Femenino</option>
        <option value='M'> Masculino</option>
      </select>
      </td>
	
    </tr>
    <tr>
  <td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">
	  Estaca</font></span></div></td>
  <td height="28" bordercolor="#A4C2C2" bgcolor="#999999" style="width: 465px">
  <?php
  if ($myusername == 'admin'){
  ?>	  
    <select name='Estaca'>
		<option value='513598'> Estaca Rosario Norte</option>
		<option value='523690'> Estaca Rosario Oeste</option>
		<option value='507059'> Estaca Rosario</option>
		<option value='513113'> Estaca Santa Fe</option>
		<option value='Tucuman'> Estaca Tucuman</option>
		</select >
		</td>
      <?php   
	}else{
	 
    $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
    $query = sprintf("select `Estaca` from `members` WHERE username='%s'", mysql_real_escape_string( $myusername ));
	$result = mysql_query($query);
	echo "<select name ='Estaca'>";
  	while($result2 =  mysql_fetch_array($result)){
	echo "<option>" . $result2['Estaca']."</option>";
	}
	}
	?>
</tr>
    <tr>
  <td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><font face="Verdana" size="2"><span class="Estilo4">
  Unidad</span>:</font></td>
  <td height="28" bordercolor="#A4C2C2" bgcolor="#999999" style="width: 465px">
  <?php
    
  if ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == '513113'){
		$db_con = mysql_connect($hostname,$username, $password) or die("Fall&#65533; la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query = sprintf("select `username` from `members` WHERE `Tipo` = 'Barrio' and estaca='%s'", mysql_real_escape_string( $myusername ));
		$result = mysql_query($query);
		echo "<select name ='Barrio'>";
		while($result2 =  mysql_fetch_array($result)){
		echo "<option>" . $result2['username']."</option>";}
	} elseif($myusername == 'admin'){
		$db_con = mysql_connect($hostname,$username, $password) or die("Fall&#65533; la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query1 = "select `username` from `members` WHERE `Tipo` = 'Barrio'";
		$result1 = mysql_query($query1);
		echo "<select name ='Barrio'>";
		while($result3 =  mysql_fetch_array($result1)){
		echo "<option>" . $result3['username']."</option>";}
	} else {
	   	$db_con = mysql_connect($hostname,$username, $password) or die("Fall&#65533; la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query1 = sprintf("select `username` from `members` WHERE `username`='%s'", mysql_real_escape_string( $myusername ));
		$result1 = mysql_query($query1);
		echo "<select name ='Barrio'>";
		while($result3 =  mysql_fetch_array($result1)){
		echo "<option>" . $result3['username']."</option>";}
	}
?>	
</td>
</tr>
    <tr>
      <td bordercolor="#A4C2C2" bgcolor="#CCCCCC"><font face="Verdana" size="2">&nbsp;</font></td>
      <td bordercolor="#FFFFFF" bgcolor="#CCCCCC" style="width: 465px">
      <font face="Verdana" size="2"><input name="Agregar" type=submit value='Agregar'></font>
	  <button onClick="javascript:window.close()"> Cerrar</button>  </td>
     </td>
     </tr>

  </table>
</form> 
