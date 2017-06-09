<?php
session_start(); 
include("config.inc.php");
mysql_connect($host,$username, $password) or die("Falló la conexion con la base de datos!");
mysql_select_db($dbname);
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM `members` WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
	$_SESSION["myusername"] = $myusername;
	$_SESSION["mypassword"] = $mypassword;
	header('Location: admin.php');
}
else {
echo " Usuario o Contraseña incorrecta - ";?>
<a href="index.php" class="Estilo3"> VOLVER</a>
<?php }
?>