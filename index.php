<style type="text/css">
body,td,th {
	color: #000;
}
body {
	background-color: #CCC;

	height:100%;
   width:100%;
   background-image:url(images/login.jpg);/*your background image*/  
   background-repeat:no-repeat;/*we want to have one single image not a repeated one*/  
   background-size:cover;/*this sets the image to fullscreen covering the whole screen*/  
   /*css hack for ie*/     
   filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='.image.jpg',sizingMethod='scale');
   -ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='image.jpg',sizingMethod='scale')";
 }
.menu {
	font-family: Arial, Helvetica, sans-serif;
}
a {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><pre class="menu"><strong>Ingrese su Unidad y Contraseña</strong></pre></td>
</tr>
<tr>
<td width="78" class="menu">Unidad</td>
<td width="6">:</td>
<td width="294"><select name='myusername' id="myusername">
	<option value='523690'>Estaca Rosario Oeste</option>
	<option value='AZC-114235'>Oeste - Barrio Azcuenaga</option>
    <option value='BEL-224022'>Oeste - Barrio Belgrano</option>
	<option value='CAN-106712'>Oeste - Rama Cañada de Comez</option>
	<option value='CAR-132780'>Oeste - Rama Carcaraña</option>
	<option value='CAS-116386'>Oeste - Rama Casilda</option>
	<option value='ECH-062073'>Oeste - Barrio Echesortu</option>
	<option value='GOD-235237'>Oeste - Barrio Godoy</option>
	<option value='FRA-385832'>Oeste - Barrio Francia</option>
	<option value='FUN-132713'>Oeste - Rama Funes</option>
	
	<option value='507059'>Estaca Rosario</option>
	<option value='ARR-229334'>Rosario - Rama Arroyo Seco</option>
	<option value='IND-140929'>Rosario - Barrio Independencia</option>
	<option value='DEL-253510'>Rosario - Barrio Las Delicias</option>
	<option value='HER-240990'>Rosario - Barrio Las Heras</option>
	<option value='URQ-059927'>Rosario - Barrio Parque Urquiza</option>
	<option value='SAL-062316'>Rosario - Barrio Saladillo</option>
	<option value='SMA-105805'>Rosario - Barrio San Martin</option>
	<option value='GAL-229334'>Rosario - Barrio Villa Gdor. Galvez</option>
	
	<option value='513598' >Estaca Rosario Norte</option>
	<option value='Alberdi'>Norte - Barrio Alberdi</option>
    <option value='Arroyito'>Norte - Barrio Arroyito</option>
    <option value='Baigorria'>Norte - Barrio Baigorria</option>
    <option value='Capitan Bermudez'>Norte - Barrio Capitan Bermudez</option>
    <option value='Fisherton'>Norte - Barrio Fisherton</option>
    <option value='Fray Luis Beltran'>Norte - Rama Fray Luis Beltran</option>
    <option value='La Florida'>Norte - Barrio La Florida</option>
    <option value='Parque Field'>Norte - Barrio Parque Field</option>
    <option value='San Lorenzo'>Norte - Rama San Lorenzo </option>
	
	<option value='513113'>Estaca Santa Fe</option>
	<option value='PAR-126012'>Stanta Fe - Barrio Parque Sur</option>
	<option value='COS-59099'>Stanta Fe - Barrio Costanera</option>
	<option value='MAY-357170'>Stanta Fe - Barrio Mayoráz</option>
	<option value='RIN-132802'>Stanta Fe - Barrio Rincón</option>
	<option value='RUR-125946'>Stanta Fe - Barrio Rural</option>
	<option value='SAN-120928'>Stanta Fe - Barrio Santo Tomé</option>
	
	<option value='EstudiantilTucuman'>Consejo Estudiantil Tucuman</option>
	<option value="admin">Super Admin</option>

</select></td>
</tr>
<tr>
<td class="menu">Contraseña</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>

<tr>
<td><input type="submit" name="Ingresar" value="Login">
<td>
<td>
<a href="instructivo.pptx">Ayuda</a>
</td>
</td>
</td>
</tr>
 
</table>
</td>

</form>
</tr>

</table>

