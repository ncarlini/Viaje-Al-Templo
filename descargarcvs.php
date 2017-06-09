<?php
ession_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
//echo $myusername;
//<a href="index.php">VOLVER</a>;
}
include("global.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
pt_register('POST','FechaDeViaje');

$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Fecha: ".$FechaDeViaje."";

 include("config.inc.php");
    // mySQL Table
    $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	if ($myusername != 'admin'){
    $query = sprintf("SELECT * FROM fechas WHERE fecha='" .$FechaDeViaje. "' AND barrio ='%s' ORDER BY id", mysql_real_escape_string( $myusername ));
	}else{
	$query = "SELECT * FROM fechas WHERE fecha='" .$FechaDeViaje. "' ORDER BY id";
	}
    $result = mysql_query($query);
$file = 'export';
$i = 0;
if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$csv_output .= $row['member']."; ";
$i++;
}
}
$csv_output .= "\n";

$values = mysql_query($query);
while ($rowr = mysql_fetch_row($values)) {
for ($j=0;$j<$i;$j++) {
$csv_output .= $rowr[$j]."; ";
}
$csv_output .= "\n";
}

$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
?>

