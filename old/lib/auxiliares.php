<?php
//Conectar a la base de datos de ENS2001
function ConectarBD()
{
	//Conecta a la base de datos de ENS2001 con el usuario ens2001
	if(!($link=mysql_connect("localhost","ens2001","ens2001")))
  	{
  		echo "ERROR EN LA CONEXI&Oacute;N A LA BASE DE DATOS";
  		return false;
  	}
  	if(!mysql_select_db("ens2001",$link))
  	{
  		echo "ERROR SELECCIONANDO LA BASE DE DATOS";
  		return false;
  	}
  	return $link;
}

//Generar la cabecera HTML
function CabeceraHTML($titulo)
{
	//Genera las etiquetas de la cabecera HTML comunes para todas las páginas
	echo "    <title>".$titulo."</title>\n";
	echo "    <meta name=\"description\" content=\"ENS2001 es un ensamblador y simulador del estandar IEEE 694 con versiones en modo consola para DOS y GNU/Linux y en modo grafico para Windows.\">\n";
        echo "    <meta name=\"description\" content=\"Ensamblador y Simulador Estandar IEEE 694\">\n";
	echo "    <meta name=\"keywords\" content=\"ens2001,ensamblador,simulador,IEEE 694,informatica,compilador,ass,ens96,windows,linux\">\n";
	echo "    <meta http-equiv=\"Expires\" content=\"Tue, 01 Jan 1980 1:00:00 GMT\">\n";
	echo "    <meta http-equiv=\"Pragma\" content=\"no-cache\">\n";
	
}

//Generar la tabla de ficheros - zona usuarios
function TablaFicheros($id,$inicial,$cantidad)
{
	//id marca un registro de la tabla, si vale "" se muestran todos
	//inicial indica el registro a partir del cual se muestra la tabla (comienza en el 1)
	//cantidad indica el numero maximo de registros, si vale "", se muestran todos
	
	//Conexion a la base de datos
	$link=ConectarBD();
	$query="select * from ficheros";
	if($id)
	{
		$query=$query." where id=\"".$id."\"";
	}
	if($inicial && $cantidad)
	{
		$query=$query." limit ".($inicial-1).",".$cantidad;
	}
	$query=$query." order by nombre asc";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
		//TABLA DE FICHEROS PARA DESCARGAR
    	//Encabezados
		echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolor=\"0\">\n";
		echo "  <tr bgcolor=\"#FFCC99\">\n";
		echo "    <th width=\"52%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Descripci&oacute;n</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"12%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Versi&oacute;n</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"9%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Fecha</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"9%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Tama&ntilde;o</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"15%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">&nbsp;</font></div>\n";
		echo "    </th>\n";
		echo "  </tr>\n";
		//Datos
		while($row=mysql_fetch_array($result))
		{
			echo "  <tr bgcolor=\"#FFFFCC\">\n";
			echo "    <td>\n";
			echo "      <font face=\"Arial\" size=\"-1\">".$row["descripcion"];
			if($row["nuevo"]=='s')
			{
				echo "<img src=\"img/new.gif\" width=\"40\" height=\"11\">";
			}
			echo "</font>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">".$row["version"]."</font></div>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">".$row["fecha"]."</font></div>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">".$row["longitud"]."Kb</font></div>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"right\"><font face=\"Arial\" size=\"-1\"><a href=\"ficheros/".$row["nombre"]."\">".$row["nombre"]."</a></font></div>\n";
			echo "    </td>\n";
			echo "  </tr>\n";  
		}	
    	echo "                </table>\n";
	}
	else
	{
	    //NO HAY FICHEROS
	    return false;
	}
	mysql_free_result($result);
	mysql_close($link);
	return true;
}

//Generar la tabla de ficheros - zona administración
function TablaFicherosAdmin($id,$inicial,$cantidad)
{
	//id marca un registro de la tabla, si vale "" se muestran todos
	//inicial indica el registro a partir del cual se muestra la tabla (comienza en el 1)
	//cantidad indica el numero maximo de registros, si vale "", se muestran todos
	
	//Conexion a la base de datos
	$link=ConectarBD();
	$query="select * from ficheros";
	if($id)
	{
		$query=$query." where id=\"".$id.$nombre."\"";
	}
	if($inicial && $cantidad)
	{
		$query=$query." limit ".($inicial-1).",".$cantidad;
	}
	$query=$query." order by nombre asc";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
		//TABLA DE FICHEROS PARA DESCARGAR
    	//Encabezados
		echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolor=\"0\">\n";
		echo "  <tr bgcolor=\"#FFCC99\">\n";
		echo "    <th>\n";
        echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Acci&oacute;n</font></div>\n";
        echo "    </th>\n";
		echo "    <th width=\"52%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Descripci&oacute;n</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"12%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Versi&oacute;n</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"9%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Fecha</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"9%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Tama&ntilde;o</font></div>\n";
		echo "    </th>\n";
		echo "    <th width=\"15%\">\n";
		echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">Fichero</font></div>\n";
		echo "    </th>\n";
		echo "  </tr>\n";
		//Datos
		while($row=mysql_fetch_array($result))
		{
			echo "  <tr bgcolor=\"#FFFFCC\">\n";
			echo "    <td>\n";
			echo "      <a href=\"editar_fichero.php?id=".$row["id"]."\">Editar</a>&nbsp;<a href=\"borrar_fichero.php?id=".$row["id"]."\">Borrar</a>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <font face=\"Arial\" size=\"-1\">".$row["descripcion"];
			if($row["nuevo"]=='s')
			{
				echo "<img src=\"img/new.gif\" width=\"40\" height=\"11\">";
			}
			echo "</font>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">".$row["version"]."</font></div>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">".$row["fecha"]."</font></div>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"center\"><font face=\"Arial\" size=\"-1\">".$row["longitud"]."Kb</font></div>\n";
			echo "    </td>\n";
			echo "    <td>\n";
			echo "      <div align=\"right\"><font face=\"Arial\" size=\"-1\"><a href=\"../ficheros/".$row["nombre"]."\">".$row["nombre"]."</a></font></div>\n";
			echo "    </td>\n";
			echo "  </tr>\n";  
		}	
    	echo "                </table>\n";
	}
	else
	{
	    //NO HAY FICHEROS
	    return false;
	}
	mysql_free_result($result);
	mysql_close($link);
	return true;
}

//Generar la tabla de noticias - zona usuarios
function TablaNoticias($id,$inicial,$cantidad)
{
	//id marca un registro de la tabla, si vale "" se muestran todos
	//inicial indica el registro a partir del cual se muestra la tabla (comienza en el 1)
	//cantidad indica el numero maximo de registros, si vale "", se muestran todos
	
	//Conexion a la base de datos
	$link=ConectarBD();
	$query="select * from noticias";
	if($id)
	{
		$query=$query." where id=\"".$id."\"";
	}
	$query=$query." order by fecha desc";
	if($inicial && $cantidad)
	{
		$query=$query." limit ".($inicial-1).",".$cantidad;
	}
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
    	//LISTADO DE NOTICIAS
    	if($inicial==1)
    	{
    		$ultima=true;
    	}
    	echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"0\">";
    	while($row=mysql_fetch_array($result))
    	{
	        echo "  <tr bgcolor=\"#FFCC99\">\n";
        	echo "    <td>\n";
        	echo "      <div align=\"right\">";
        	if($ultima)
        	{
	            echo "<i>&Uacute;ltima Actualizaci&oacute;n</i> - ";
            	$ultima=false;
        	}
        	$fecha=explode("-",$row["fecha"]);
        	echo $fecha[2].".".$fecha[1].".".$fecha[0]."</div>\n";
        	echo "    </td>\n";
        	echo "  </tr>\n";
        	echo "  <tr bgcolor=\"#FFFFCC\">\n";
        	echo "    <td>\n";
        	echo "      <div align=\"justify\">".$row["texto"]."</div>\n";
        	echo "    </td>\n";
        	echo "  </tr>\n";
    	}
    	echo "</table>";
	}
	else
	{
    	//NO HAY NOTICIAS
    	return false;
	}
	mysql_free_result($result);
	mysql_close($link);
	return true;
}

//Generar la tabla de noticias - zona administración
function TablaNoticiasAdmin($id,$inicial,$cantidad)
{
	//id marca un registro de la tabla, si vale "" se muestran todos
	//inicial indica el registro a partir del cual se muestra la tabla (comienza en el 1)
	//cantidad indica el numero maximo de registros, si vale "", se muestran todos
	
	//Conexion a la base de datos
	$link=ConectarBD();
	$query="select * from noticias";
	if($id)
	{
		$query=$query." where id=\"".$id."\"";
	}
	if($inicial && $cantidad)
	{
		$query=$query." limit ".($inicial-1).",".$cantidad;
	}
	$query=$query." order by fecha desc";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
    	//LISTADO DE NOTICIAS
    	$ultima=1;
    	echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"0\">\n";
    	while($row=mysql_fetch_array($result))
    	{
	        echo "  <tr bgcolor=\"#FFCC99\">\n";
        	echo "    <td>\n";
        	echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"0\">\n";      
        	echo "        <tr>\n";
        	echo "          <td>\n";
     		echo "            <div align=\"left\"><a href=\"editar_noticia.php?id=".$row["id"]."\">Editar</a>&nbsp;<a href=\"borrar_noticia.php?id=".$row["id"]."\">Borrar</a></div>\n";
     		echo "          </td>\n";
     		echo "          <td>\n";
        	echo "            <div align=\"right\">";
        	if($ultima==1)
        	{
	            echo "<i>&Uacute;ltima Actualizaci&oacute;n</i> - ";
            	$ultima=0;
        	}
        	$fecha=explode("-",$row["fecha"]);
        	echo $fecha[2].".".$fecha[1].".".$fecha[0]."</div>\n";
        	echo "          </td>\n";
        	echo "        </tr>\n";
        	echo "      </table>\n";
        	echo "    </td>\n";
        	echo "  </tr>\n";
        	echo "  <tr bgcolor=\"#FFFFCC\">\n";
        	echo "    <td>\n";
        	echo "      <div align=\"justify\">".$row["texto"]."</div>\n";
        	echo "    </td>\n";
        	echo "  </tr>\n";
    	}
    	echo "</table>";
	}
	else
	{
    	//NO HAY NOTICIAS
    	return false;
	}
	mysql_free_result($result);
	mysql_close($link);
	return true;
}

//Enlace a noticias anteriores
function NoticiasAnteriores($inicial,$cantidad)
{
	//Conexion a la base de datos
	$link=ConectarBD();
	$query="select * from noticias";
	$result=mysql_query($query);
   	if(($inicial+$cantidad)<=(mysql_num_rows($result)))
   	{
   		echo "          <p><b><a href=\"noticias_anteriores.php?inicial=".($inicial+$cantidad)."&cantidad=".$cantidad."\">Pincha aqu&iacute; para ver las noticias anteriores</a></b><br>";
	}
	mysql_close($link);
}

//Transforma una fecha en formato dd.mm.aaaa al tipo DATE de MySql
function aaaammdd($cadena)
{
	$fecha=explode(".",$cadena);
	return $fecha[2].$fecha[1].$fecha[0];
}

?>
