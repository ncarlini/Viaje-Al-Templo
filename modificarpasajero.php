<? 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/jquery-ui.css"">
  
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
<!--
.Estilo4 {font-family: Georgia; font-size: 12px; }
.Estilo5 {
	font-family: "Times New Roman", Times, serif;
	font-size: 18px;
	color: #333300;
	font-weight: bold;
}
.Estilo3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #000099;
}
.Estilo12 {color: #336666}
.Estilo13 {font-size: 10px; font-family: Arial;}
a:link {
	text-decoration: none;
	color: #336666;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
body {
	background-color: #CCC;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form enctype='multipart/form-data' action='process.php' method='post'>
<table border="0" align="left" bordercolor="#FFFFFF" style="border-collapse: collapse">
<tr><td colspan="6" bordercolor="#A4C2C2" bgcolor="#CCFFCC"><p><font size="2" face="Verdana"><b><font face="Verdana" size="2">

  </font>Agregar Nuevo Pasajero a la Base de Datos</b></font></p></td></tr><tr>
      <td colspan="6" bgcolor="#CCCCCC" bordercolor="#A4C2C2"><strong><font size="1" face="Verdana">Los campos marcados con <span class="Estilo3">*</span> son obligatorios</font></strong></td></tr><tr><td colspan="2" rowspan="8" bordercolor="#A4C2C2" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="143" bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Nombres </span></div></td>
<td colspan="3" bordercolor="#FFFFFF" bgcolor="#999999"><input type=text name='Nombre'><font face="Verdana" size="2">*(Exactamente como figura en el DNI o Pasaporte)</td>
</tr>
    <tr>
      <td bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Apellido</span></div></td>
<td colspan="3" bordercolor="#FFFFFF" bgcolor="#999999"><input type=text name='Apellido'><font face="Verdana" size="2">*(Exactamente como figura en el DNI o Pasaporte)</td>
</tr>
    <tr>
      <td nowrap="nowrap" bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Tipo de Documento</span></div></td>
<td width="160" bordercolor="#FFFFFF" bgcolor="#999999"><select name='TipodeDocumento'><option value='DNI'>DNI<option value='Pasaporte'>Pasaporte<option value='Otro'>Otro</select>
  <span class="Estilo3">*</span></td>
<td width="58" bordercolor="#FFFFFF" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Numero</span>:</div></td>
<td width="235" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#999999"><input type="text" name='Numero' />
  <span class="Estilo3">*</span></td>
    </tr>
    <tr>
      <td nowrap="nowrap" bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4">

  <font face="Verdana" size="2">Fecha de Nacimiento</font></span></div></td>
<td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#999999">
<input type="text" id="datepicker" name='FechadeNacimiento' />
 <span class="Estilo3">*</span></td>
<td bordercolor="#FFFFFF" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Telefono</span>:</div></td>
<td bordercolor="#FFFFFF" bgcolor="#999999"><input type=text name='Telefono' /></td>
    </tr>
    <tr>
      <td bordercolor="#A4C2C2" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Nacionalidad</span></div></td>
<td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#999999"><input name='Nacionalidad' type="text" value="Argentino" />
  <span class="Estilo3">*</span></td>
  
  
<td align="right" bordercolor="#FFFFFF" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Correo</span>:</div></td>
<td bordercolor="#FFFFFF" bgcolor="#999999"><input type="text" name='Correo' /></td>
    </tr>
    <tr>
	
      <td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><font face="Verdana" size="2">Sexo</td>
      <td height="28" bordercolor="#A4C2C2" bgcolor="#999999">
	  <select name='Sexo' id="Number">
        <option value='F'> Femenino</option>
        <option value='M'> Masculino</option>
      </select>
      <span class="Estilo3">*</span></td>
      <td colspan="3" bordercolor="#FFFFFF" bgcolor="#999999">&nbsp;</td>
	
    </tr>
    <tr>
  <td nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Estaca</font></span></div></td>
  <td height="28" bordercolor="#A4C2C2" bgcolor="#999999">
  <?php
  if ($myusername == 'admin'){
  ?>	  
    <select name='Estaca'>
		<option value='513598'> Estaca Rosario Norte</option>
		<option value='523690'> Estaca Rosario Oeste</option>
		</select >
		<span class="Estilo3">*</span>
    <?php   
	}else{
	 include("config.inc.php");
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
	</td>
  <td align="right" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2"><font face="Verdana" size="2">Unidad</font></span>:</div></td>
  <td bgcolor="#999999">
  <?php
    
  if ($myusername == '523690' or $myusername == '513598'){
		include("config.inc.php");
		$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query = sprintf("select `username` from `members` WHERE `Tipo` = 'Barrio' and estaca='%s'", mysql_real_escape_string( $myusername ));
		$result = mysql_query($query);
		echo "<select name ='Barrio'>";
		while($result2 =  mysql_fetch_array($result)){
		echo "<option>" . $result2['username']."</option>";}
	} elseif($myusername == 'admin'){
		include("config.inc.php");
		$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query1 = "select `username` from `members` WHERE `Tipo` = 'Barrio'";
		$result1 = mysql_query($query1);
		echo "<select name ='Barrio'>";
		while($result3 =  mysql_fetch_array($result1)){
		echo "<option>" . $result3['username']."</option>";}
	} else {
	    include("config.inc.php");
		$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query1 = sprintf("select `username` from `members` WHERE `username`='%s'", mysql_real_escape_string( $myusername ));
		$result1 = mysql_query($query1);
		echo "<select name ='Barrio'>";
		while($result3 =  mysql_fetch_array($result1)){
		echo "<option>" . $result3['username']."</option>";}
	}
?>	
    <span class="Estilo3">*</span></td>
      
</tr>
    <tr>
      <td bordercolor="#A4C2C2" bgcolor="#CCCCCC"><font face="Verdana" size="2">

        <input name="Agregar" type=submit value='Agregar'/>
      </font></td>
      <td colspan="3" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
     <button onClick="javascript:window.close()"> Cerrar</button></td>
       
</tr>
  </table>
<p>&nbsp;</p>
</form> 
