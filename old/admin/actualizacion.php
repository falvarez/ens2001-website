<?
//Ficheros incluidos
include("../lib/auxiliares.php");
//
?>
<html>
  <head>
<?php
CabeceraHTML("Actualizaci&oacute;n ENS2001");
?>
  </head>
  <body>
    <form name="noticia" method="post" action="confirmar_actualizacion.php" enctype="multipart/form-data">
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                  <div align="center"><font size="+2" color="#666666">Actualizaci&oacute;n ENS2001</font></div>
                </td>
              </tr>
              <tr>
                <td>
                  <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php"  style="text-decoration:none" style="color:#666666">admin</a>&gt;<font color="#333333">actualizacion</font></font>
                </td>
              </tr>
              <tr> 
                <td> 
                  <div align="center"><br>Es necesario rellenar todos los campos</div>
                </td>
              </tr>
              <tr>
                <td>
                  <br>
                  <table border="1" cellspacing="0" cellpadding="1" bordercolor="0">
                    <tr bgcolor="#FFFFCC">
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="#FFCC99">
<?php
echo "                              <div align=\"right\">Fecha:&nbsp;<input type=\"text\" name=\"fecha\" value=\"".date("d.m.Y")."\"></div>\n";
?>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr bgcolor="#FFFFCC">
                      <td>
                        <div align="justify">Texto: (puede emplear etiquetas HTML)<br><textarea name="texto" cols="80" rows="6" wrap="virtual"></textarea></div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td> 
                  <div align="center"><br>Introduzca un m&aacute;ximo de 10 ficheros</div>
                </td>
              </tr>
              <tr>
                <td>
                  <br>
                  <table width="100%" border="1" cellspacing="0" cellpadding="1" bordercolor="0">
                    <tr bgcolor="#FFCC99">
                      <th>
                        <div align="center"><font face="Arial" size="-1">Descripci&oacute;n</font></div>
                      </th>
                      <th>
                        <div align="center"><font face="Arial" size="-1">Nuevo</font></div>
                      </th>
                      <th>
                        <div align="center"><font face="Arial" size="-1">Versi&oacute;n</font></div>
                      </th>
                      <th>
                        <div align="center"><font face="Arial" size="-1">Fecha</font></div>
                      </th>
                      <th>
                        <div align="center"><font face="Arial" size="-1">Fichero</font></div>
                      </th>
                    </tr>
<?php
for($i=0;$i<10;$i++)
{
	echo "                    <tr bgcolor=\"#FFFFCC\">\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"text\"  maxlength=\"255\" size=\"30\" name=\"descripcion_".$i."\"></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"checkbox\" name=\"nuevo\" checked></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"text\" maxlength=\"15\" size=\"7\" name=\"version_".$i."\"></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"text\" maxlength=\"10\" size=\"8\" name=\"fecha_".$i."\" value=\"".date("d.m.Y")."\"></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"file\" size=\"10\" name=\"fichero_".$i."\" value=\"A&ntilde;adir\"></input></div>\n";
	echo "                      </td>\n";
	echo "                    </tr>\n";
}
?>
                  </table>
                </td>
              </tr>
              <tr>
                <td>
                  <br>
                  <input type="submit" value="Actualizar"></input>
                  <input type="reset"></input>  
                </td>
              </tr>
              <tr>
                <td>
                  <div align="right"><font size="+2" color="#666666"><a href="gestion_noticias.php" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
