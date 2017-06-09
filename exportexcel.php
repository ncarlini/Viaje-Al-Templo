<?php 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
}

include("global.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
$FechaDeViaje = $_GET['FechaDeViaje'];
//pt_register('POST','FechaDeViaje');
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="FechaDeViaje=".$FechaDeViaje."
";

include("config.inc.php");
$db = mysql_connect($hostname,$username,$password);
mysql_select_db($dbname);
if ($myusername == 'admin'){
		$query = "SELECT onlineform.barrio, onlineform.apellido, onlineform.nombre,  onlineform.Numero, onlineform.fecha_de_nacimiento, onlineform.sexo, anotados.fecha, anotados.fecha_anotado, anotados.ordenanza, anotados.comentario  FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.fecha ='" .$FechaDeViaje. "' order by onlineform.barrio asc"; 
	} elseif ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == 'Tucuman' or $myusername == '513113'){
	$query = sprintf("SELECT onlineform.barrio, onlineform.apellido, onlineform.nombre,  onlineform.Numero,  onlineform.fecha_de_nacimiento, onlineform.sexo, anotados.fecha, anotados.fecha_anotado, anotados.ordenanza, anotados.comentario  FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.fecha ='" .$FechaDeViaje. "' AND onlineform.estaca ='%s' order by onlineform.barrio asc", mysql_real_escape_string( $myusername )); 
	} else {
   $query = sprintf("SELECT onlineform.barrio, onlineform.apellido, onlineform.nombre,  onlineform.Numero,  onlineform.fecha_de_nacimiento, onlineform.sexo, anotados.fecha, anotados.fecha_anotado, anotados.ordenanza, anotados.comentario  FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.fecha ='" .$FechaDeViaje. "' AND onlineform.barrio ='%s' order by onlineform.barrio asc", mysql_real_escape_string( $myusername )); 
  
   }

$header = '';
$data ='';

$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>