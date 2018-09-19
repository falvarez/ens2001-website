<?php
//Ficheros incluidos
include("../lib/auxiliares.php");
//
$link=ConectarBD();
$query_ficheros="select * from ficheros where id=\"$id\"";
$result_ficheros=mysql_query($query_ficheros,$link);
if(!$result_ficheros)
{
	$mensaje_error="                <div align=\"center\"><font color=\"#FF0000\" size=\"+1\">Identificador de fichero no v&aacute;lido</div></font>";
	$error=true;
}
else if(mysql_num_rows($result_ficheros)==0)
{
	$mensaje_error="                <div align=\"center\"><font color=\"#FF0000\" size=\"+1\">El fichero no existe</div></font>";
	$error=true;
}
else if(mysql_num_rows($result_ficheros)>1)
{
	$mensaje_error="                <div align=\"center\"><font color=\"#FF0000\" size=\"+1\">Identificador de fichero duplicado</div></font>";
	$error=true;
}
else
{
	$error=false;
}
?>
<html>
  <head>
<?php
CabeceraHTML("Editar fichero ENS2001");
?>
  </head>
  <body>
	<form name="fichero" method="post" action="gestion_ficheros.php">
	  <input type="hidden" name="operacion" value="editar_fichero"></input>
<?php
	echo "	  <input type=\"hidden\" name=\"id\" value=\"".$id."\"></input>\n";
?>
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>
                  <div align="center"><font size="+2" color="#666666">Editar fichero ENS2001</font></div>
                </td>
              </tr>
              <tr> 
                <td>
                  <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="index.php"  style="text-decoration:none" style="color:#666666">admin</a>&gt;<a href="gestion_ficheros.php"  style="text-decoration:none" style="color:#666666">gestion_ficheros</a>&gt;<font color="#333333">editar_fichero</font></font>
                </td>
              </tr>
              <tr> 
                <td>
                  <br>
<?php
if(!$error)
{
    //TABLA DE FICHEROS
	$row=mysql_fetch_array($result_ficheros);
	//Encabezados
    echo "                  <table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolor=\"0\">\n";
    echo "                    <tr bgcolor=\"#FFCC99\">\n";
    echo "                      <th>\n";
    echo "                        <div align=\"center\"><font face=\"Arial\" size=\"-1\">Descripci&oacute;n</font></div>\n";
    echo "                      </th>\n";
    echo "                      <th>\n";
    echo "                        <div align=\"center\"><font face=\"Arial\" size=\"-1\">Nuevo</font></div>\n";
    echo "                      </th>\n";
    echo "                      <th>\n";
    echo "                        <div align=\"center\"><font face=\"Arial\" size=\"-1\">Versi&oacute;n</font></div>\n";
    echo "                      </th>\n";
    echo "                      <th>\n";
    echo "                        <div align=\"center\"><font face=\"Arial\" size=\"-1\">Fecha</font></div>\n";
    echo "                      </th>\n";
    echo "                      <th>\n";
    echo "                        <div align=\"center\"><font face=\"Arial\" size=\"-1\">Fichero</font></div>\n";
    echo "                      </th>\n";
    echo "                    </tr>\n";
    //Datos
	echo "                    <tr bgcolor=\"#FFFFCC\">\n";
    echo "                      <td>\n";
    echo "                        <div align=\"center\"><input type=\"text\"  maxlength=\"255\" size=\"30\" name=\"descripcion\" value=\"".$row["descripcion"]."\"></input></div>\n";
    echo "                      </td>\n";
    echo "                      <td>\n";
    echo "                        <div align=\"center\"><input type=\"checkbox\" name=\"nuevo\" ";
    if($row["nuevo"]=='s')
    {
	   echo "checked";
	}
	echo "></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"text\" maxlength=\"15\" size=\"8\" name=\"version\" value=\"".$row["version"]."\"></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"text\" maxlength=\"10\" size=\"8\" name=\"fecha\" value=\"".$row["fecha"]."\"></input></div>\n";
	echo "                      </td>\n";
	echo "                      <td>\n";
	echo "                        <div align=\"center\"><input type=\"text\" maxlength=\"127\" size=\"15\" name=\"nombre\" value=\"".$row["nombre"]."\"></input></div>\n";
	echo "                      </td>\n";
	echo "                    </tr>\n";
	echo "                  </table>\n";
	echo "                </td>\n";
	echo "              </tr>\n";
	echo "              <tr>\n";
	echo "                <td>\n";
	echo "                  <br>\n";
	echo "                  <input type=\"submit\" value=\"Modificar\"></input>\n";
	echo "                  <input type=\"reset\"></input>\n";
	echo "                </td>\n";
	echo "              </tr>\n";
	mysql_free_result($result_ficheros);	 
}
else
{
	    echo "              <tr>\n";
	    echo "                <td>\n";
	    echo "                <br>\n";
	    echo $mensaje_error;
	    echo "                </td>\n";
	    echo "              </tr>\n";
}	
?>
              <tr> 
                <td> 
                  <div align="right"><font size="+2" color="#666666"><a href="administracion.php" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
<?php
echo "    </form>\n";
?>
  </body>
</html>
<?php
mysql_close($link);
?>
