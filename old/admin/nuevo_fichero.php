<?php
//Ficheros incluidos
include("../lib/auxiliares.php");
//
?>
<html>
  <head>
<?php
CabeceraHTML("Nuevo fichero ENS2001");
?>
  </head>
  <body>
    <form name="fichero" method="post" action="gestion_ficheros.php" enctype="multipart/form-data">
      <input type="hidden" name="operacion" value="nuevo_fichero"></input>
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>
                  <div align="center"><font size="+2" color="#666666">Nuevo fichero ENS2001</font></div>
                </td>
              </tr>
              <tr> 
                <td>
                  <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php" style="text-decoration:none" style="color:#666666">admin</a>&gt;<a href="gestion_ficheros.php"  style="text-decoration:none" style="color:#666666">gestion_ficheros</a>&gt;<font color="#333333">nuevo_fichero</font></font>
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
                    <tr bgcolor="#FFFFCC">
                      <td>
                        <div align="center"><input type="text"  maxlength="255" size="30" name="descripcion"></input></div>
                      </td>
                      <td>
                        <div align="center"><input type="checkbox" name="nuevo" checked></input></div>
                      </td>
                      <td>
                        <div align="center"><input type="text" maxlength="15" size="7" name="version"></input></div>
                      </td>
                      <td>
<?php
echo "                        <div align=\"center\"><input type=\"text\" maxlength=\"10\" size=\"8\" name=\"fecha\" value=\"".date("d.m.Y")."\"></input></div>\n";
?>
                      </td>
                      <td>
                        <div align="center"><input type="file" size="7" name="fichero" value="A&ntilde;adir"></input></div>
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
                  <div align="right"><font size="+2" color="#666666"><a href="gestion_ficheros.php" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
