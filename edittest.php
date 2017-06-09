<?php
session_start();
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
include("global.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
pt_register('POST','FechaDeViaje');
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Fecha: ".$FechaDeViaje."
";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>Viaje al Templo - Estaca Rosario Norte - Consola de Administracion</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<STYLE>
P {
	PADDING-LEFT: 8px; FONT-SIZE: 12px; MARGIN: 10px; COLOR: #333333; LINE-HEIGHT: 18px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
.small {
	PADDING-LEFT: 10px; FONT-WEIGHT: normal; FONT-SIZE: 10px; COLOR: #333333; LINE-HEIGHT: 14px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
.big {
	PADDING-LEFT: 10px; FONT-SIZE: 14px; COLOR: #333333; LINE-HEIGHT: 14px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
TD {
	FONT-SIZE: 12px; COLOR: #333333; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
A:link {
	FONT-WEIGHT: bold; COLOR: #336666; TEXT-DECORATION: none
}
A:visited {
	FONT-WEIGHT: bold; COLOR: #333333; TEXT-DECORATION: none
}
A:active {
	FONT-WEIGHT: bold; COLOR: #333333; TEXT-DECORATION: none
}
A:hover {
	FONT-WEIGHT: bold; COLOR: #666666; TEXT-DECORATION: overline
}
INPUT {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 10px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
}
TEXTAREA {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 10px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
}
SELECT {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 10px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
}
INPUT.button {
	BORDER-RIGHT: #999 2px outset; BORDER-TOP: #999 2px outset; BORDER-LEFT: #999 2px outset; BORDER-BOTTOM: #999 2px outset; BACKGROUND-COLOR: #ccc
}
.Estilo1 {	font-family: "Times New Roman", Times, serif;
	font-size: 18px;
	color: #333300;
	font-weight: bold;
}
.Estilo3 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #CC0000;
}
.Estilo5 {
	font-family: Arial;
	font-size: 10px;
}
.Estilo4 {font-family: Georgia; font-size: 12px; }
</STYLE>

<form enctype='multipart/form-data' action='editarpasaje.php' method='post'>

</HEAD>
<BODY bgColor=#eeeeee>
<button onClick="javascript:window.close()"> Cerrar</button>
<p class="small">
  <?php
  include("config.inc.php");
    $db_con = mysql_connect($hostname,$username, $password) or die("Fall&oacute; la conexion con la base de datos!");
    mysql_select_db($dbname);
    if ($myusername != 'admin'){
    $query = sprintf("select * from `fechas` WHERE Barrio='%s' ORDER By `Apellido` ASC", mysql_real_escape_string( $myusername ));
	}
	else{
	$query = "SELECT * FROM fechas WHERE fecha='" .$FechaDeViaje. "' ORDER BY id";
	}
	$result = mysql_query($query);
	echo "<select name ='Miembro'";
  	while($result2 =  mysql_fetch_array($result)){
	echo "<option>" . $result2['member']."</option>";
	}
	echo "</select>"; // End Option Tab.
  // mySQL ends
?>
</p>
<form name="form1" method="post" action="">
  Editar
    <input type="submit" name="Editar" id="Editar" value="Submit">
</form>
</body></html>
