<? 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
}

include("global.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
pt_register('POST','FechaDeViaje');
pt_register('POST','Miembro');

$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Fecha: ".$FechaDeViaje."
";
?>

<script language="JavaScript" type="text/javascript">
<!--

function AddWindow()
{
window.open('add.php','Pasajero','width=750,height=400,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=no,top=150,left=150');
}
//-->
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
<!--
.Estilo4 {font-family: Georgia; font-size: 12px; }
.Estilo5 {
	font-family: "Times New Roman", Times, serif;
	font-size: 18px;
	color: #333300;
	font-weight: bold;
}
.Estilo3 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #CC0000;
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
.small {	PADDING-LEFT: 10px; FONT-WEIGHT: normal; FONT-SIZE: 10px; COLOR: #333333; LINE-HEIGHT: 14px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
-->
</style>
<form enctype='multipart/form-data' action='processpasajero.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#FFFFFF" width="95%" cellpadding="5">
  <tr>
<td colspan="4" bgcolor="#CCCCCC" height="17" bordercolor="#F0F0F0">
<p align="left\><b><font face=" class="Estilo5"Verdana" size="2" color="#FFFFFF">Editar Pasaje - Estaca Rosario Norte </span></td>
</tr><tr><td colspan="4" bgcolor="#EFF3F7" height="16" bordercolor="#A4C2C2"><strong><font size="1" face="Verdana">Los campos marcados con * son obligatorios</font></strong></td></tr><tr><td width="9" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="124" height="30" bordercolor="#A4C2C2" bgcolor="#999999">


  <div align="left"><span class="Estilo4">Miembro:</span></div></td>
<td width="307" height="30" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
<font face="Verdana">
<? 
echo "<p>" .$Miembro. "</p>";
?>
<label for="Miembro"></label>
<p>&nbsp;</p></td>
<td width="314" bgcolor="#EFF3F7" bordercolor="#FFFFFF">&nbsp;</td>
</tr>

<tr><td width="9" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
  <td width="124" height="30" bordercolor="#A4C2C2" bgcolor="#999999">
    <div align="left">Ordenanza Personal:</div></td>
  <td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7"><select name='OrdenanzaPersonal'>
    <option value="No" selected="selected">No </option>
    <option value="Investidura">Investidura Propia </option>
    <option value="Sellamiento">Sellamiento </option>
</select></td></tr>
<tr>
  <td height="30" bgcolor="#999999" bordercolor="#A4C2C2">&nbsp;</td>
  <td height="30" bgcolor="#999999" bordercolor="#A4C2C2"><div align="left">Monto Abonado:</div></td>
  <td height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
  <span class="small">
  <?php
  include("config.inc.php");
    $db_con = mysql_connect($hostname,$username, $password) or die("Fall&oacute; la conexion con la base de datos!");
    mysql_select_db($dbname);
 	//$query = "select * from 'fechas' WHERE member = '" .$miembro. "' AND fecha = '" .$FechaDeViaje. "'";
	$query3 = "select * from 'fechas' WHERE member = 'Wagner, Maite ;19/7/1990; Doc: 35222232'";
	$result = mysql_query($query3);
//  	echo "<p>" . $result. "</p>";
//	while ($result3 = mysql_fetch_assoc($query3)) {
    echo $result3['abono'];
//}

  // mySQL ends
?>
  </span></td>
</tr>
<tr><td height="154" width="9" bgcolor="#999999" bordercolor="#A4C2C2">&nbsp;</td>
<td height="154" width="124" bgcolor="#999999" bordercolor="#A4C2C2">
  <div align="left"><span class="Estilo4"><font face="Verdana" size="2">Comentarios</span></div></td>
<td height="154" colspan="2" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
<font face="Verdana">
<textarea name="Comentario" cols="60" rows="5"></textarea></td>
</tr><tr><td colspan="4" bgcolor="#CCCCCC" height="25"><p align="center"><font face="Verdana" size="2"><input type=submit value='Anotar Miembro'>&nbsp;
        <input type=reset value='Borrar Valores' />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><a  class="Estilo3"><font face="Verdana" size="2">
<button onClick="javascript:window.close()"> Cerrar</button> 
</font></a></td></tr>
</table>
</form>

