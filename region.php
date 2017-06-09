<style type="text/css">
body,td,th {
	color: #000;
}
body {
	background-color: #CCC;
	background-image: url(images/login.jpg);
}
.menu {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checkloginregion.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><pre class="menu"><strong>Ingrese su Usuario y Contraseña</strong></pre></td>
</tr>
<tr>
<td width="78" class="menu">Usuario</td>
<td width="6">:</td>
<td width="294"><select name='myusername' id="myusername">

    <option value='Estaca Rosario Oeste'>Estaca Rosario Oeste</option>
    <option value='Estaca Rosario'>Estaca Rosario</option>
    <option value='Estaca San Nicolas'>Estaca San Nicolas</option>
    <option value='Estaca Pergamino'>Estaca Pergamino</option>
    <option value='Distrito Venado Tuerto'>Distrito Venado Tuerto</option>
    <option value='Distrito Canada'>Distrito Cañada</option>
    <option value="admin">Estaca Rosario Norte - Admin</option>
</select></td>
</tr>
<tr>
<td class="menu">Contraseña</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td><input type="submit" name="Ingresar" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
