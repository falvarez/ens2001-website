<?php
//Ficheros incluidos
include("../lib/auxiliares.php");
include("../lib/operaciones.php");
//
switch($operacion)
{
	case "nueva_noticia" :
		$mensaje=NuevaNoticia($fecha,$texto);
		break;	
	case "borrar_noticia" :
		$mensaje=BorrarNoticia($id);
		break;
	case "editar_noticia" :
		$mensaje=EditarNoticia($id,$fecha,$texto);
		break;
}
?>
<html>
  <head>
<?php
CabeceraHTML("Gesti&oacute;n de noticias ENS2001");
?>
  </head>
  <body>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td>
                <div align="center"><font size="+2" color="#666666">Gesti&oacute;n de noticias ENS2001</font></div>
              </td>
            </tr>
            <tr> 
              <td>
                <font color="#666666" face="Arial, Helvetica, sans-serif" size="-2"><a href="../index.php" style="text-decoration:none" style="color:#666666">ens2001</a>&gt;<a href="administracion.php"  style="text-decoration:none" style="color:#666666">admin</a>&gt;<font color="#333333">gestion_noticias</font></font>
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
$noticias=TablaNoticiasAdmin("","","");
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
                      <div align="left"><font size="+2" color="#666666"><a href="nueva_noticia.php" style="text-decoration:none" style="color:#666666">A&ntilde;adir Noticia</a></font></div>
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
