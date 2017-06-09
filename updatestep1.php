<? 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
 
<script language="JavaScript" type="text/javascript">
<!--

function AddWindow()
{
window.open('modificarpasajero.php','Pasajero','width=700,height=300,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=no,top=150,left=150');
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
</style>
<form enctype='multipart/form-data' action='updatestep2.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#FFFFFF" width="95%" cellpadding="5">
  <tr>
<td colspan="3" bgcolor="#CCCCCC" height="17" bordercolor="#F0F0F0">
<p align="left\> <font size="3" face="Verdana" color="#FFFFFF">Modificar Miembro</td>
</tr><tr><td colspan="3" bgcolor="#EFF3F7" height="16" bordercolor="#A4C2C2"><strong><font size="1" face="Verdana">Los campos marcados con * son obligatorios</font></strong></td></tr><tr><td width="8" height="30" bordercolor="#A4C2C2" bgcolor="#999999">&nbsp;</td>
<td width="118" height="30" bordercolor="#A4C2C2" bgcolor="#999999">


  <div align="left"><span class="Estilo4"><font face="Verdana" size="2">Seleccione Miembro:</span></div></td>
<td width="438" height="30" nowrap="nowrap" bordercolor="#FFFFFF" bgcolor="#EFF3F7">
  <font face="Verdana">
  <p>
    <?php
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
	echo "<option value=".  $result2['id'] ."> " . $result2['Apellido'] . ", ". $result2['Nombre']."</option>";
	}
echo "</select>"; // End Option Tab.
  // mySQL ends
  
?>
    *</p>
  <label for="Miembro"></label>
  <p>&nbsp;</p></td>
</tr><tr><td colspan="3" bgcolor="#CCCCCC" height="25"><p align="center"><font face="Verdana" size="2">
		<input name="Modificar" type=submit value='Modificar Miembro' id="Modificar">
        <input type="submit" onClick="javascript:window.close()" value='Cerrar' id="cerrar"</> 
</font></a></td></tr>
</table>
</form>

