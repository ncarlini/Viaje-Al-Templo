<?php
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){echo "usuario no logueado";}
$id = $_GET['id'];
//pt_register('POST','id');
// Start regular stuff

if($id=="")
header("Refresh: 0;url=dbpasajeros.php");
else
{
include("config.inc.php");
$db = mysql_connect($hostname,$username,$password);
mysql_select_db($dbname);
$query = "delete from ".$table." where id='".$id."'";
$result = mysql_query($query);
header("Refresh: 0;url=dbpasajeros.php");
}
?>