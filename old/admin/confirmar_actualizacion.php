<?
//Ficheros incluidos
include("../lib/auxiliares.php");
include("../lib/operaciones.php");
//
$mensaje_noticia=NuevaNoticia($fecha,$texto);
for($i=0;$i<10;$i++)
{
	$fichero_i="fichero_".$i;
	$nombre_i="fichero_".$i."_name";
	$descripcion_i="descripcion_".$i;
	$nuevo_i="nuevo_".$i;
	$version_i="version_".$i;
	$fecha_i="fecha_".$i;
	$longitud_i="longitud_".$i;
	$mensaje_fichero[$i]=NuevoFichero($$fichero_i,$$nombre_i,$$descripcion_i,$$nuevo_i,$$version_i,$$fecha_i,$$longitud_i);
}
?>
<html>
  <head>
<?php
CabeceraHTML("Actualizaci&oacute;n de la web ENS2001");
?>
  </head>
  <body>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td>
                <div align="center"><font size="+2" color="#666666">Actualizaci&oacute;n de la web ENS2001</font></div>
              </td>
            </tr>
            <tr> 
              <td>
                <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php" style="text-decoration:none" style="color:#666666">admin</a>&gt;<a href="actualizacion.php"  style="text-decoration:none" style="color:#666666">actualizacion</a>&gt;<font color="#333333">confirmar_actualizacion</font></font>
              </td>
            </tr>
<?php
if($mensaje_noticia)
{  
	echo "            <tr>\n";
	echo "              <td>\n";
	echo "                <br>\n";
	echo "                <div align=\"center\">NOTICIA: ".$mensaje_noticia."</div>\n";  
	echo "              </td>\n";
	echo "            </tr>\n";   
}
for($i=0;$i<10;$i++)
{ 
	echo "            <tr>\n";
	echo "              <td>\n";
	echo "                <div align=\"center\">FICHERO ".$i.": ".$mensaje_fichero[$i]."</div>\n";  
	echo "              </td>\n";
	echo "            </tr>\n";   	
}
?>                
            <tr> 
              <td>
                <br>
<?php
$ficheros=TablaFicheros("","","");
if(!$ficheros)
{
	echo "                <div align=\"center\"><font color=\"#FF0000\" size=\"+1\">La lista de ficheros est&aacute; vac&iacute;a</font></div>\n";  
}
	echo "				  <br>\n";
$noticias=TablaNoticias("","","");
if(!$noticias)
{
    echo "                <div align=\"center\"><font color=\"#FF0000\" size=\"+1\">La lista de noticias est&aacute; vac&iacute;a</font></div>\n";  
}
?>
              </td>
            </tr>
            <tr> 
              <td> 
                <br>
                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                  <tr>
                    <td>
                      &nbsp;
                    </td>
                    <td>
                      <div align="right"><font size="+2" color="#666666"><a href="javascript:history.go(-1)" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
