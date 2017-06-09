<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start(); 
include("config.inc.php");
mysql_connect($host,$username, $password) or die("Falló la conexion con la base de datos!");

$myusername = $_SESSION["myusername"];
$FechaDeViaje = $_POST["FechaDeViaje"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>Viaje al Templo - Consola de Administracion</TITLE>
<STYLE>

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
	FONT-WEIGHT: bold; COLOR: #336666; TEXT-DECORATION: none
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
.Estilo5 {
	font-family: Arial;
	font-size: 10px;
}
</STYLE>
<script language="JavaScript" type="text/javascript">

</script>
</HEAD>
<BODY bgColor=#eeeeee>
<p class="small">
 <?php
    $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	if ($myusername == 'admin'){
		$query = "SELECT onlineform.id, anotados.id, onlineform.barrio, onlineform.apellido, onlineform.nombre, onlineform.Numero,  onlineform.fecha_de_nacimiento, onlineform.sexo, anotados.fecha, anotados.fecha_anotado, anotados.ordenanza, anotados.comentario  FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.fecha ='" .$FechaDeViaje. "' order by anotados.id asc"; 
	} elseif ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == 'Tucuman' or $myusername == '513113'){
		$query = sprintf("SELECT onlineform.id, anotados.id, onlineform.barrio, onlineform.apellido, onlineform.nombre, onlineform.Numero,  onlineform.fecha_de_nacimiento, onlineform.sexo, anotados.fecha, anotados.fecha_anotado, anotados.ordenanza, anotados.comentario  FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.fecha ='" .$FechaDeViaje."' AND onlineform.estaca ='%s' order by anotados.id asc", mysql_real_escape_string( $myusername )); 
	} else {
		$query = sprintf("SELECT onlineform.id, anotados.id, onlineform.barrio, onlineform.apellido, onlineform.nombre, onlineform.Numero,  onlineform.fecha_de_nacimiento, onlineform.sexo, anotados.fecha, anotados.fecha_anotado, anotados.ordenanza, anotados.comentario  FROM onlineform INNER JOIN (anotados) ON (anotados.idMiembro=onlineform.id) WHERE anotados.fecha ='" .$FechaDeViaje. "' AND onlineform.barrio ='%s' order by anotados.id asc", mysql_real_escape_string( $myusername )); 
    }
    $result = mysql_query($query);
    $i = 0;
    while ($i < mysql_num_fields($result)) {
      $meta = mysql_fetch_field($result);
      $columns[$i] = $meta->name;
      $i++;
    }

    echo "<table cellspacing=\"0\" cellpadding=\"4\" border=\"1\" width=\"100%\">\n";
    echo "<tr><td colspan=\"" . (sizeof($columns)+2) . "\">\n";
    echo "<table cellspacing=\"0\" cellpadding=\"2\" border=\"0\" width=\"100%\">\n";
    echo "<tr><td class=\"small\" bgcolor=\"#6495ED\" align=\"center\" valign=\"middle\">\n";
	echo "<font face=\"Verdana\" size=\"4\">\n";
    echo "<font color=\"#ffffff\">Datos de Viaje</td></tr></table></td></tr><tr>\n";

    for($i=1;$i<sizeof($columns);$i++) {
        echo "<td class='small'><center><b>".$columns[$i]."</td>";
    }
	echo "<td class='small'><center><a href=$i></a></td>";
	echo $fecha;
		
    $result = mysql_query($query);
    $j=0;
    $r=0;
    while($row=mysql_fetch_array($result)) {
      echo "<tr>";
	  
	  
       for($i=1;$i<sizeof($columns);$i++) {
           echo "<td class='small'><center>".$row[$columns[$i]]."</td>";
      }
      $r=$r+1;
      $j=$row[$columns[0]];
		  echo "<td class='small'><center><a href='editar_reserva.php?id=".$j."'>Editar</a></td>";
		  echo "<td class='small'><center><a href='delete_reserva.php?id=".$j."'>Eliminar</a></td>";
    }
    echo "</table>";
	echo "<p class='big'>&nbsp";
	echo "<a>Total anotados: $r </a>";
	echo "</p>";
?>
<p>
&nbsp; 
</p>
<p>
<button onclick="window.location.href='exportexcel.php?FechaDeViaje=<?php echo $FechaDeViaje?>'">Exportar Excel - <?php echo $myusername?> <?php echo $FechaDeViaje?></button>
<button onClick="javascript:window.close()"> Cerrar</button>
</p>
<p class="small">&nbsp; </p>


</body></html>
