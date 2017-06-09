<?php 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){echo "usuario no logueado";}
include("config.inc.php");

$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$Numero = $_POST["Numero"];
$Barrio = $_POST["Barrio"];
$FechadeNacimiento = $_POST["FechadeNacimiento"];
$Sexo = $_POST["Sexo"];
$Estaca = $_POST["Estaca"];


if($Nombre=="" || $Apellido=="" || $Numero=="" || $Barrio=="" || $FechadeNacimiento==""|| $Sexo==""|| $Estaca==""){
$errors=1;
$error.="<li>No ingresó los campos obligatorios. Por favor vuelva y rellene todos los datos.";
echo $Barrio;
echo $Estaca;
echo $Nombre;
echo $Apellido;
echo $Numero;
echo $Barrio;
echo $FechadeNacimiento;
echo $Sexo;

}
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Nombre: ".$Nombre."
Apellido: ".$Apellido."
Numero: ".$Numero."
Barrio: ".$Barrio."
Fecha de Nacimiento: ".$FechadeNacimiento."
Sexo: ".$Sexo."
Estaca: ".$Estaca."
";

//envio de correo:

include("config.inc.php");
		$db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
		mysql_select_db($dbname);
		$query1 = sprintf("select `Correo` from `members` WHERE `username`='%s'", mysql_real_escape_string( $Barrio ));
		$result1 = mysql_query($query1);
		$result3 =  mysql_fetch_array($result1);
		$toemail = implode(", ",$result3);
$message = stripslashes($message);
mail($toemail,"Base de Datos: Nuevo Pasajero",$message,"From: info@viajealtemplo.com.ar");

//Update en la base:
//$link = mysql_connect("localhost","db","db2012");
//mysql_select_db("templo",$link);
$query="insert into onlineform (Nombre,Apellido,Numero,Barrio,Fecha_de_Nacimiento,Sexo,Estaca) values ('".$Nombre."','".$Apellido."','".$Numero."','".$Barrio."','".$FechadeNacimiento."','".$Sexo."','".$Estaca."')";
mysql_query($query);

?>


<!-- This is the content of the Thank you page, be careful while changing it -->
<style type="text/css">

</style>

<table width="574" border="0">
  <tr>
    <td colspan="3" class="Estilo4">Base de Datos: Nuevo nombre agregado: </td>
  </tr>
  <tr>
    <td width="20" rowspan="10">&nbsp;</td>
    <td width="412"><span class="Estilo4">Nombre:</span></td>
    <td width="128"><?php echo $Nombre; ?></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Apellido: </span></td>
    <td><?php echo $Apellido; ?></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Numero: </span></td>
    <td><?php echo $Numero; ?></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Barrio: </span></td>
    <td><?php echo $Barrio; ?></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Fecha de Nacimiento: </span></td>
    <td><?php echo $FechadeNacimiento; ?></td>
  </tr>

    <tr>
    <td valign="top"><span class="Estilo4">Sexo: </span></td>
    <td valign="top"><?php echo $Sexo; ?></td>
  </tr>
  </tr>
    <tr>
    <td valign="top"><span class="Estilo4">Estaca: </span></td>
    <td valign="top"><?php echo $Estaca; ?></td>
  </tr>
  <tr>
    <td valign="top"><button onClick="javascript:window.close()"> Cerrar</button> </td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<h2 class="Estilo2"><!-- Do not change anything below this line -->
<a href="index.html" class="Estilo3"></a></h2>
<p class="Estilo4">
<?php 
}
?>
</p>
<p class="Estilo4">&nbsp;</p>
