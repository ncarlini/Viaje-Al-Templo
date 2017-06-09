<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<HTML><HEAD>
 
<script language="JavaScript" type="text/javascript">
<!--

function AddWindow()
{
window.open('add.php','Pasajero','width=700,height=300,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=no,top=150,left=150');
}

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
</style>
<form enctype='multipart/form-data' action='processpasajero.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#FFFFFF" width="95%" cellpadding="5">
  <tr>
<td colspan="4" bgcolor="#CCCCCC" height="17" bordercolor="#F0F0F0">
<p align="left\> <font size="3" face="Verdana" color="#FFFFFF">Reservar Pasaje</span></td>
</tr><tr><td colspan="4" bgcolor="#EFF3F7" height="16" bordercolor="#A4C2C2"><strong><font size="1" face="Verdana">Los campos marcados con * son obligatorios</font></strong></td></tr><tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">


  <div align="left"><span class="Estilo4"><font face="Verdana" size="2">Seleccione Miembro:</span></div></td>
<td width="438" height="30" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
<font face="Verdana">
<p>
<?php
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){echo "usuario no logueado"; 
}
  include("config.inc.php");
    $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
    if ($myusername == 'admin'){
		$query = "select * from `onlineform` ORDER By `Apellido` ASC";
	} elseif ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == '513113'){
		$query = sprintf("select * from `onlineform` WHERE Estaca='%s' ORDER By `Apellido` ASC", mysql_real_escape_string( $myusername ));
	} else {
		$query = sprintf("select * from `onlineform` WHERE Barrio='%s' ORDER By `Apellido` ASC", mysql_real_escape_string( $myusername ));
	}
	$result = mysql_query($query);
echo "<select name ='Miembro'>";
  	while($result2 =  mysql_fetch_array($result)){
	echo "<option>" . $result2['Apellido'] , " , ", 
		$result2['Nombre'] ," ; ", 
		$result2['Sexo'] ," ; ", 
		$result2['Fecha_de_Nacimiento'], " ; ", 
		$result2['Numero'] , " ; ",  
		$result2['id'] ."</option>";
	}
echo "</select>"; // End Option Tab.
  
?>
  *</p>
<label for="Miembro"></label>
<p>&nbsp;</p></td>
<td width="152" bgcolor="#EFF3F7" bordercolor="#FFFFFF"><span class="new"><font face="Verdana" size="2">
  </span>
  </td>
</tr>

 
 
 
<tr>
  <td height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
  <td height="30" bordercolor="#A4C2C2" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Barrio</span></div></td>
  <td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
 <?php
    
  if ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == '513113'){
		include("config.inc.php");
		$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query = sprintf("select `username` from `members` WHERE `Tipo` = 'Barrio' and `estaca`='%s'", mysql_real_escape_string( $myusername ));
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
		echo "</select>";
	} else {
	    include("config.inc.php");
		$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query1 = sprintf("select `username` from `members` WHERE `username`='%s'", mysql_real_escape_string( $myusername ));
		$result1 = mysql_query($query1);
		echo "<select name ='Barrio'>";
		while($result3 =  mysql_fetch_array($result1)){
		echo "<option>" . $result3['username']."</option>";}
		echo "</select>";
	}
?>	
	
	
	
	
</tr>
<tr>
  <td height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
  <td height="30" bordercolor="#A4C2C2" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Estaca</span></div></td>
  <td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
 <?php
  if ($myusername == 'admin'){
  ?>	  
    <select name='Estaca'>
		<option value='513598'> Estaca Rosario Norte</option>
		<option value='523690'> Estaca Rosario Oeste</option>
		<option value='513113'> Estaca Santa Fe</option>
		<option value='507059'> Estaca Rosario</option>
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
</tr>
<tr>
  <td height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
  <td height="30" bordercolor="#A4C2C2" bgcolor="#999999"><div align="left"><span class="Estilo4"><font face="Verdana" size="2">Fecha</span></div></td>
  <td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7"><select name='Fecha'>

  <?php
   include("config.inc.php");
    $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	$query = sprintf("select `fechas` from `viajes` WHERE `estaca` = (select `estaca` from `members` where `username` = '%s') order by `orden` ASC", mysql_real_escape_string($myusername));
	$result = mysql_query($query);
  	while($result2 =  mysql_fetch_array($result)){
	echo "<option>" . $result2[0] ."</option>";
	}
	?>

	  </select></td>
	</tr>

<tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
  <div align="left"><font face="Verdana" size="2">Ordenanza Personal: <?php echo $result2; ?> </div></td>
  <td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7"><select name='OrdenanzaPersonal'>
  <option value="No" selected="selected">No </option>
  <option value="Investidura">Investidura Propia </option>
  <option value="Sellamiento">Sellamiento </option>
</select></td></tr>
<tr><td height="30" width="8" bgcolor="#999999" bordercolor="#A4C2C2">&nbsp;</td>
<td height="30" width="118" bgcolor="#999999" bordercolor="#A4C2C2">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="2">Comentarios: <?php  echo $result2['Fechas']; ?></span></div></td>
<td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
<font face="Verdana">
<textarea name="Comentarios" cols="60" rows="5"></textarea></td>
</tr><tr><td colspan="4" bgcolor="#CCCCCC" height="25"><p align="center"><font face="Verdana" size="2">
		<input name="Anotar" type=submit value='Anotar Miembro' id="Anotar">
        <input type="submit" onClick="javascript:window.close()" value='Cerrar' id="cerrar"</> 
</font></a></td></tr>
</table>
</form>

