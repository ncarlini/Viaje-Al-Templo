<? 
session_start();
$myusername = $_SESSION["myusername"];
if (!isset($myusername) ){
echo "usuario no logueado"; 
}
?>

<html>
<body>
Login Successful
</body>
</html>