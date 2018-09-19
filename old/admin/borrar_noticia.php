<?php
//Ficheros incluidos
include("../lib/auxiliares.php");
//
?>
<html>
  <head>
<?php
CabeceraHTML("Borrar noticia ENS2001");
?>
  </head>
  <body>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td height="20"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td>
                <div align="center"><font size="+2" color="#666666">Borrar noticia ENS2001</font></div>
              </td>
            </tr>
            <tr> 
              <td>
                <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php"  style="text-decoration:none" style="color:#666666">admin</a>&gt;<a href="gestion_noticias.php"  style="text-decoration:none" style="color:#666666">gestion_noticias</a>&gt;<font color="#333333">borrar_noticia</font></font>
              </td>
            </tr>
            <tr> 
              <td> 
                <div align="center"><br>¿Desea borrar esta noticia?<br>&nbsp;</div>
              </td>
            </tr>
            <tr> 
              <td>
<?php
TablaNoticias($id,"","");
?>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
<?php
echo "            <tr>";
echo "              <td><div align=\"center\"><form method=\"get\" action=\"gestion_noticias.php\"><input type=\"hidden\" name=\"operacion\" value=\"borrar_noticia\"><input type=\"hidden\" name=\"id\" value=\"".$id."\"></input><input type=\"submit\" value=\"Borrar Noticia\"></input></form></div>";
echo "              </td>";
echo "            </tr>";
?>
            <tr>
              <td> 
                <div align="right"><font size="+2" color="#666666"><a href="javascript:history.go(-1);" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
