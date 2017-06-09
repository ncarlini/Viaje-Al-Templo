<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include("config.inc.php");
mysql_connect($host,$username, $password) or die("Falló la conexion con la base de datos!");
$myusername = $_SESSION["myusername"];
?>

<HTML><HEAD><TITLE>Viaje al Templo - Estacas de Rosario - Consola de Administracion</TITLE>
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

</HEAD>
<font size="2" color="Black" face="Arial, Helvetica, sans-serif">Bienvenido <?php echo $myusername; ?> </span></p>
<BODY bgColor=#eeeeee>
<button onClick="javascript:window.close()"> Cerrar</button>
<p class="small">&nbsp;</p>
<p class="small">
 <?php
    $db_con = mysql_connect($hostname,$username, $password) or die("Falló la conexion con la base de datos!");
    mysql_select_db($dbname);
	if ($myusername == 'admin'){
		$query = "select * from `onlineform` ORDER By `Apellido` ASC";
	} elseif ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == '513113'){
		$query = sprintf("select * from `onlineform` WHERE Estaca='%s'", mysql_real_escape_string( $myusername ));
	} else {
		$query = sprintf("select * from `onlineform` WHERE Barrio='%s'", mysql_real_escape_string( $myusername ));
	}
	$result = mysql_query($query);
    $i = 0;
    while ($i < mysql_num_fields($result)) {
      $meta = mysql_fetch_field($result);
      $columns[$i] = $meta->name;
      $i++;
    }

    echo "<table cellspacing=\"0\" cellpadding=\"4\" border=\"1\" width=\"90%\">\n";
    echo "<tr><td colspan=\"" . (sizeof($columns)+2) . "\">\n";
    echo "<table cellspacing=\"0\" cellpadding=\"2\" border=\"0\" width=\"100%\">\n";
    echo "<tr><td class=\"small\" bgcolor=\"#6495ED\" align=\"center\" valign=\"middle\">\n";
    echo "<font color=\"#ffffff\">Datos de Miembros</td></tr></table></td></tr><tr>\n";

    for($i=1;$i<sizeof($columns);$i++) {
		echo "<td class='small'><center><b>".$columns[$i]."</td>";
    }
	if ($myusername == 'admin'){
		$query = "select * from `onlineform` ORDER By `Apellido` ASC";
	} elseif ($myusername == '523690' or $myusername == '513598' or $myusername == '507059' or $myusername == 'Tucuman' or $myusername == '513113'){
		$query = sprintf("select * from `onlineform` WHERE Estaca='%s'", mysql_real_escape_string( $myusername ));
	} else {
		$query = sprintf("select * from `onlineform` WHERE Barrio='%s'", mysql_real_escape_string( $myusername ));
	}
	$result = mysql_query($query);
    $j=0;

    while($row=mysql_fetch_array($result)) {
      echo "<tr>";

      for($i=1;$i<sizeof($columns);$i++) {
        echo "<td class='small'><center>".$row[$columns[$i]]."</td>";
      }

      $j=$row[$columns[0]];
	  echo "<td class='small'><center><a href='editar_rec.php?id=".$j."'>Editar</a></td>";
      echo "<td class='small'><center><a href='delete_rec.php?id=".$j."'>Eliminar</a></td>";
	}
    echo "</table>";

  // mySQL ends

?>
</p>
<p class="small">&nbsp; </p>
</body></html>
