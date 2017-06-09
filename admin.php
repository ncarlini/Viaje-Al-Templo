<?php 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){header("location: index.php");}
include("config.inc.php");
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta http-equiv="refresh" content="60" > 
<HTML><HEAD>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "input[type=submit], a, button" )
      .button()
      .click(function( event ) {
        event.preventDefault();
      });
  });
  </script>
  
  <TITLE>Viaje al Templo - Consola de Administracion</TITLE>
<STYLE>
table {
    border-collapse: collapse;
    width: 50%;
}

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
	FONT-WEIGHT: bold; COLOR: #990000; TEXT-DECORATION: none
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
</STYLE>

<script language="JavaScript" type="text/javascript">
<!--
function AddWindow()
{
window.open('add.php','Add','width=700,height=300,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=no,top=150,left=150');
}

function PasajeWindow()
{
window.open('pasaje.php','Pasajero','width=750,height=400,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=no,top=150,left=150');
}

function ReservasWindow()
{
window.open('fechareserva.php','Reserva','width=1000,height=400,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=no,top=150,left=150');
}

function DbWindow()
{
window.open('dbpasajeros.php','DbPasajeros','width=1200,height=600,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0');
}

function FechasWindow()
{
window.open('Fechas.php','Fechas','width=1200,height=600,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0');
}

function UsuariosWindow()
{
window.open('Usuarios.php','Usuarios','width=1200,height=600,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0');
}

function FondosWindow()
{
window.open('solicitudfondos.pdf','Fondos','width=1200,height=600,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0');
}

function InvestiduraWindow()
{
window.open('investidura.xls','Investidura','width=1200,height=600,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0');
}

function SellamientoWindow()
{
window.open('sellamiento.xls','Sellamiento','width=1200,height=600,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0');
}

</script>
</HEAD>
<BODY bgColor=#eeeeee>
<p>
<span class="logo">
<p>
</p>
<font size="6" color="Black" face="Arial, Helvetica, sans-serif">Bienvenido <?php
session_start();
if (!isset($_SESSION["myusername"]) ){
header("location: index.php"); 
}
$myusername = $_SESSION["myusername"];
include("config.inc.php");
    // mySQL Table
 $db_con = mysql_connect($hostname,$username, $password) or die("Fall� la conexion con la base de datos!");
    mysql_select_db($dbname);

    $query1 = sprintf("select * from `members` WHERE `username`='%s'", mysql_real_escape_string( $myusername ));
		$result1 = mysql_query($query1);
		if (!$result1) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result1);
echo $row[3]; // 42

?> </span></p>
<p><input name="Salir" type="submit" onClick=parent.location='logout.php' value="Salir"></p>

<p><span class="logo"><img src="images/banner.jpg" width="630" height="224"></span></p>
<p>
<font size="5" color="Black" face="Arial, Helvetica, sans-serif"></p>
<table width="927" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="282"><input name="Add" type="submit" onClick="JavaScript:AddWindow()" value="Agregar Datos de Nuevo Pasajero"></td>
    <td width="85">&nbsp;</td>
    <td width="560"><input type="submit" onClick="JavaScript:FondosWindow()" value="Formulario de Solicitud de Fondos Para Asistencia al templo"></td>
  </tr>
  <tr>
    <td><input name="Pasaje" type="submit" onClick="JavaScript:PasajeWindow()" value="Anotar Pasajero a Proximo Viaje"></td>
    <td>&nbsp;</td>
    <td><input type="submit" onClick="JavaScriptt:InvestiduraWindow()" value="Formulario Para Investiduras"></td>
  </tr>
  <tr>
    <td><input name="Reservas" type="submit" onClick="JavaScript:ReservasWindow()" value="Ver Reservas de Viajes"></td>
    <td>&nbsp;</td>
    <td><input type="submit" onClick="JavaScript:SellamientoWindow()" value="Formulario Para Sellamientos"></td>
  </tr>
  <tr>
    <td><input name="DbPasa" type="submit" onClick="JavaScript:DbWindow()" value="Ver Base de Datos de Pasajeros"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>

<?php
include("config.inc.php");
    // mySQL Table
 $db_con = mysql_connect($hostname,$username, $password) or die("Fall� la conexion con la base de datos!");
    mysql_select_db($dbname);

	if ($myusername != admin){
   // $query = sprintf("select `fechas`, `Comentarios`  from `viajes` WHERE `estaca` = (select `estaca` from `members` where `username` = '%s') order by `orden` asc", mysql_real_escape_string($myusername));
	$query = sprintf("SELECT viajes.fechas as 'Fecha de Viaje' , viajes.Comentarios as 'Unidades Asignadas', count(anotados.id) as 'Total Anotados de la Estaca'  FROM  viajes Left JOIN (anotados) ON (anotados.fecha=viajes.fechas and anotados.Estaca = viajes.Estaca) where viajes.Estaca = (select `estaca` from `members` where `username` = '%s')  group by viajes.fechas order by viajes.orden asc;", mysql_real_escape_string($myusername));
}else{
  //  $query = "select `fechas`, `Comentarios` from `viajes` order by `orden` asc";
	$query = sprintf("SELECT viajes.fechas as 'Fecha de Viaje' , viajes.Comentarios as 'Unidades Asignadas', count(anotados.id) as 'Total Anotados'  FROM  viajes Left JOIN (anotados) ON (anotados.fecha=viajes.fechas) group by viajes.fechas order by viajes.orden asc;");

}
    $result = mysql_query($query);
$fields_num = mysql_num_fields($result);

echo "<p><font size='4' color= Black> Proximos Viajes:</p>";
echo "<table border='0'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
$field2 = mysql_fetch_field($result2);
    echo "<td>{$field2->name}</td>";
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td> $cell</td>";
    echo "</tr>\n";
}
mysql_free_result($result);
?>
</p>
<p>
</p>
<p>
</p>

</body></html>
