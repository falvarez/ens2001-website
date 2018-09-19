<?
//Ficheros incluidos
include("../lib/auxiliares.php");
//
?>
<html>
  <head>
<?php
CabeceraHTML("Nueva noticia ENS2001");
?>
  </head>
  <body>
    <form name="noticia" method="post" action="gestion_noticias.php">
      <input type="hidden" name="operacion" value="nueva_noticia"></input>
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                  <div align="center"><font size="+2" color="#666666">Nueva noticia ENS2001</font></div>
                </td>
              </tr>
              <tr>
                <td>
                  <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php" style="text-decoration:none" style="color:#666666">admin</a>&gt;<a href="gestion_noticias.php"  style="text-decoration:none" style="color:#666666">gestion_noticias</a>&gt;<font color="#333333">nueva_noticia</font></font>
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
                  <br>
                  <input type="submit" value="A&ntilde;adir"></input>
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
