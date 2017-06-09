<?php
include("config.inc.php");
session_start();
$myusername = $_SESSION["myusername"];
$id = $_GET['id'];
$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$DNI = $_POST["DNI"];
$FechaDeNacimiento = $_POST["FechaDeNacimiento"];
$Sexo = $_POST["Sexo"];
?>
<HTML><HEAD><TITLE>Viaje al Templo - Consola de Administracion</TITLE>
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
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
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
	font-size: 20px;
	color: #CC0000;
}

.Estilo4 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 20px;
	color: #333300;
}
.Estilo5 {
	font-family: Arial;
	font-size: 30px;
}
</STYLE>
<?php
	$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	$query=sprintf("update onlineform SET 
	Nombre='".$Nombre."',
	Apellido='".$Apellido."',
	Fecha_De_Nacimiento='".$FechaDeNacimiento."',
	Numero='".$DNI."',
	Sexo='".$Sexo."'
	where id='%s'", mysql_real_escape_string( $id ));
	mysql_query($query);
?>


<table width="574" border="0">
  <tr>
    <td colspan="3" class="Estilo5">Se ha modificado el siguiente pasajero:</td>
  </tr>
  
  <tr>

    <td width="229"><span class="Estilo4">Nombre: </span></td>
    <td width="313"><span class="Estilo3"><?php echo $Nombre; ?></td>
  </tr>
  <tr>
   
    <td width="229"><span class="Estilo4">Apellido: </span></td>
    <td width="313"><span class="Estilo3"><?php echo $Apellido; ?></td>
  </tr>

   <tr>
    <td><span class="Estilo4">Dni: </span></td>
    <td><span class="Estilo3"><?php echo $DNI; ?></td>
  </tr>

  <tr>
    <td><span class="Estilo4">Fecha de Nacimiento: </span></td>
    <td><span class="Estilo3"><?php echo $FechaDeNacimiento; ?></td>
   </tr>
  <tr>
    <td><span class="Estilo4">Sexo: </span></td>
    <td><span class="Estilo3"><?php echo $Sexo; ?></td>
  </tr>
 
  <tr>
    <td valign="top">
    <button onClick="javascript:window.close()"> Cerrar</button>  </td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<h2 class="Estilo2"><!-- Do not change anything below this line -->
<a href="index.html" class="Estilo3"></a></h2>
<p class="Estilo4">
</p>
<p class="Estilo4">&nbsp;</p>
