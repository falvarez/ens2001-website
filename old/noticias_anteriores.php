<?php
//Ficheros incluidos
include("lib/auxiliares.php");

$inicial = $_GET["inicial"];
$cantidad = $_GET["cantidad"];
//
?>
<html>
  <head>
<?php
CabeceraHTML("Noticias anteriores ENS2001");
?>
  </head>
  <body bgcolor="#FFFFFF" text="#000000" link="#0000FF" vlink="#CC66CC" alink="#0000FF">
    <table width="620" border="0">
      <tr>
        <td>
          <p align="center"><b><i><font face="Courier New, Courier, mono" size="+3">ENS2001</font></i></b></p>
          <p><b>Noticias anteriores (se muestran en grupos de 5):</b></p>
<?php
$noticias=TablaNoticias("",$inicial,$cantidad);
if(!$noticias)
{
	echo "          <p><font face=\"Arial\" size=\"-1\" color=\"#FF0000\">No hay novedades en la p&aacute;gina</font></p>\n";
}
NoticiasAnteriores($inicial,$cantidad);
?>
        </td>
      </tr>
    </table>
    <p><b><a href="index.php">Volver a la p&aacute;gina principal</a></b><br>
  </body>
</html>
