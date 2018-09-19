<?php
//Ficheros incluidos
include("../lib/auxiliares.php");
include("../lib/operaciones.php");
//
switch($operacion)
{
	case "nuevo_fichero" :
		$mensaje=NuevoFichero($fichero,$fichero_name,$descripcion,$nuevo,$version,$fecha);
		break;
	case "borrar_fichero" :
		$mensaje=BorrarFichero($id);
		break;
	case "editar_fichero" :
		$mensaje=EditarFichero($id,$nombre,$descripcion,$nuevo,$version,$fecha);
		break;
}
?>
<html>
  <head>
<?php
CabeceraHTML("Gesti&oacute;n de ficheros ENS2001");
?>
  </head>
  <body>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <div align="center"><font size="+2" color="#666666">Gesti&oacute;n de ficheros ENS2001</font></div>
              </td>
            </tr>
            <tr>
              <td>
                <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php"  style="text-decoration:none" style="color:#666666">admin</a>&gt;<font color="#333333">gestion_ficheros</font></font>
              </td>
            </tr>

<?php
if($mensaje)
{  
	echo "            <tr>\n";
	echo "              <td>\n";
	echo "                <div align=\"center\">".$mensaje."</div>\n";  
	echo "              </td>\n";
	echo "            </tr>\n";   
}
?>         
            <tr>
              <td>
                <br>
<?php
$ficheros=TablaFicherosAdmin("","","","");
if(!$ficheros)
{
    echo "                <div align=\"center\"><font color=\"#FF0000\" size=\"+1\">La lista de ficheros est&aacute; vac&iacute;a</div></font>\n";  
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
                      <div align="left"><font size="+2" color="#666666"><a href="nuevo_fichero.php" style="text-decoration:none" style="color:#666666">A&ntilde;adir Fichero</a></font></div>
                    </td>
                    <td>
                      <div align="right"><font size="+2" color="#666666"><a href="administracion.php" style="text-decoration:none" style="color:#666666">Volver</a></font></div>
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
