<?php
//Ficheros incluidos
include("../lib/auxiliares.php");
//
$link=ConectarBD();
$query_noticias="select * from noticias where id=$id";
$result_noticias=mysql_query($query_noticias,$link);
if(!$result_noticias)
{
    echo "Error en el acceso a la tabla de noticias.\n";
    echo $query_noticias."\n";
    exit();
}
?>
<html>
  <head>
<?php
CabeceraHTML("Editar noticia ENS2001");
?>
  </head>
  <body>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td>
                <div align="center"><font size="+2" color="#666666">Editar noticia ENS2001</font></div>
              </td>
            </tr>
            <tr> 
              <td>
                <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php" style="text-decoration:none" style="color:#666666">admin</a>&gt;<a href="gestion_noticias.php"  style="text-decoration:none" style="color:#666666">gestion_noticias</a>&gt;<font color="#333333">editar_noticia</font></font>
              </td>
            </tr>
            <tr> 
              <td>
                <br>
<?php
echo "                <form name=\"noticia\" method=\"post\" action=\"gestion_noticias.php\">\n";
echo "                  <input type=\"hidden\" name=\"operacion\" value=\"editar_noticia\"></input>\n";
echo "                  <input type=\"hidden\" name=\"id\" value=\"".$id."\"></input>\n";
echo "                  <table border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolor=\"0\">\n";
while($row=mysql_fetch_array($result_noticias))
{
    echo "                    <tr bgcolor=\"#FFCC99\">\n";
    echo "                      <td>\n";
    echo "                        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "                          <tr>\n";
    echo "                            <td bgcolor=\"#FFCC99\">\n";
    $fecha=explode("-",$row["fecha"]);
    $fecha_formateada=$fecha[2].".".$fecha[1].".".$fecha[0];
    echo "                              <div align=\"right\">Fecha:&nbsp;<input type=\"text\" name=\"fecha\" value=\"".$fecha_formateada."\"></div>\n";
    echo "                            </td>\n";
    echo "                          </tr>\n";
    echo "                        </table>\n";
    echo "                      </td>\n";
    echo "                    </tr>\n";
    echo "                    <tr bgcolor=\"#FFFFCC\">\n";
    echo "                      <td>\n";
    echo "                        <div align=\"justify\">\n";
    echo "                          Texto: (puede emplear etiquetas HTML)<br>\n";
    echo "                          <textarea name=\"texto\" cols=\"80\" rows=\"6\" wrap=\"virtual\">".$row["texto"]."</textarea>\n";
    echo "                        </div>\n";
    echo "                      </td>\n";
    echo "                    </tr>\n";
    echo "                  </table>\n";
    echo "                  <br>\n";
    echo "                  <button type=\"submit\">Modificar</button>&nbsp;\n";
    echo "                  <input type=\"reset\"></input>\n";
}
echo "                </form>\n";
echo "              </td>\n";
echo "            </tr>\n";
?>
            <tr> 
              <td> 
                <div align="right"><font size="+2" color="#666666"><a href="gestion_noticias.php" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
<?php
mysql_free_result($result_noticias);
mysql_close($link);
?>
