<? 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
}


//Update en la base:
$link = mysql_connect("localhost","db","db2012");
mysql_select_db("templo",$link);

$query = mysql_query("SELECT * FROM  `onlineform` WHERE  `id` LIKE  '$id'");
// display query results
while($row = mysql_fetch_array($query))
    {
		$Nombre = $row['Nombre'];
		$Apellido = $row['Apellido'];
		$TipodeDocumento = $row['TipodeDocumento'];
		$Numero = $row['Numero'];
		$Barrio = $row['Barrio'];
		$FechadeNacimiento = $row['FechadeNacimiento'];
		$Telefono = $row['Telefono'];
		$Correo = $row['Correo'];
		$Nacionalidad = $row['Nacionalidad'];
		$Sexo = $row['Sexo'];
		$Estaca  = $row['Estaca'];                           
    } 

//$query="insert into onlineform (Nombre,Apellido,Tipo_de_Documento,Numero,Barrio,Fecha_de_Nacimiento,Telefono,Correo,Nacionalidad,Sexo,Estaca) values ('".$Nombre."','".$Apellido."','".$TipodeDocumento."','".$Numero."','".$Barrio."','".$FechadeNacimiento."','".$Telefono."','".$Correo."','".$Nacionalidad."','".$Sexo."','".$Estaca."')";

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
    <td width="128"><input name="Nombre" type="text" value="<?php echo $Nombre; ?>" size="60" id="Nombre" /></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Apellido: </span></td>
    <td>
    <input name="Apellido" type="text" value="<?php echo $Apellido; ?>" size="60" id="Apellido" /></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Tipo de Documento:</span></td>
    <td><?php echo $TipodeDocumento; ?></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Numero: </span></td>
    <td><?php echo $Numero; ?>
    <input name="Apellido2" type="text" value="" size="60" id="NUmero" /></td>
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
    <td><span class="Estilo4">Nacionalidad: </span></td>
    <td><?php echo $Nacionalidad; ?>
    <input name="Nacionalidad" type="text" value="" size="60" id="NUmero2" /></td>
  </tr>
  <tr>
    <td><span class="Estilo4">Telefono: </span></td>
    <td><?php echo $Telefono; ?>
    <input name="Telefono" type="text" value="" size="60" id="NUmero3" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="Estilo4">Correo: </span></td>
    <td valign="top"><?php echo $Correo; ?>
    <input name="Correo" type="text" value="" size="60" id="NUmero4" /></td>
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

?>
</p>
<p class="Estilo4">&nbsp;</p>
