<?php
//Nuevo Fichero
function NuevoFichero($fichero,$nombre,$descripcion,$nuevo,$version,$fecha)
{
	//Añade un fichero a la base de datos y lo sube al servidor
	$sobrescribir=false;
	$mensaje=""; //Mensaje de retorno
	//Conectar a la Base de Datos
	$link=ConectarBD();
	//Comprobar si se rellenaron todos los campos del formulario
	if(!$nombre)
	{
	    $mensaje="<font color=\"#666666\">No se especific&oacute; ning&uacute;n fichero</font>";    	
	}
	else if(!$descripcion || !$version || !$fecha)
	{
	    $mensaje="<font color=\"#FF0000\">ERROR: alguno de los campos se dej&oacute; en blanco</font>";    	
	}
	else
	{
		//Comprobar si el fichero existe en el servidor, si es así borrarlo
		$query_ficheros="select * from ficheros where nombre = \"$nombre\"";
		$result_ficheros=mysql_query($query_ficheros,$link);
		if(mysql_num_rows($result_ficheros)>0)
		{
			$sobrescribir=true;
			$row=mysql_fetch_array($result_ficheros);
			$query_ficheros="delete from ficheros where id=\"".$row["id"]."\"";
			$result_ficheros=mysql_query($query_ficheros,$link);
			unlink("../ficheros/".$nombre);
		}
		//Subir fichero
		$extension=explode(".",$nombre);
		$num=count($extension)-1;
		if(!copy($fichero,"../ficheros/".$nombre))
		{
			$mensaje="<font color=\"#FF0000\">ERROR: al almacenar el fichero en el servidor</font>";
		}
		else
		{
			//Calcular el tamaño del fichero
			$longitud_fichero=floor(filesize("../ficheros/".$nombre)/1024);
			//El fichero está en el servidor, hacer el insert en la Base de Datos
			if($sobrescribir)
			{
				$mensaje="<font color=\"#666666\">Fichero sobrescrito en el servidor correctamente</font>";
			}
			else
			{
				$mensaje="<font color=\"#666666\">Fichero almacenado en el servidor correctamente</font>";
			}
			//Consulta a la base de datos
			if($nuevo)
			{
				$query_ficheros="insert into ficheros (id,descripcion,nuevo,version,fecha,longitud,nombre) values (LAST_INSERT_ID(),\"$descripcion\",\"s\",\"$version\",\"$fecha\",\"$longitud_fichero\",\"$nombre\")";
			}
			else
			{
				$query_ficheros="insert into ficheros (id,descripcion,nuevo,version,fecha,longitud,nombre) values (LAST_INSERT_ID(),\"$descripcion\",\"n\",\"$version\",\"$fecha\",\"$longitud_fichero\",\"$nombre\")";
			}
			$result_ficheros=mysql_query($query_ficheros,$link);
			if($result_ficheros)
			{
				$id=mysql_insert_id($link);
			}
			else
			{
				$mensaje="<font color=\"#FF0000\" >Error en el acceso a la tabla de ficheros.Se ejecut&oacute; la query: \"".$query_ficheros."\"</font>";
				//Echamos para atrás el upload del fichero
				unlink("../ficheros/".$nombre);
			}
		}
		//Cerrar la conexión a la Base de Datos
		mysql_close($link);
	}	
	return $mensaje;
}

//Editar Fichero
function EditarFichero($id,$nombre,$descripcion,$nuevo,$version,$fecha)
{
	//Edita un fichero almacenado en el servidor
	$mensaje=""; //Mensaje de retorno
	//Conectar a la Base de Datos
	$link=ConectarBD();
	$query_ficheros="select * from ficheros where id=\"$id\"";
	$result_ficheros=mysql_query($query_ficheros,$link);
	if(!$result_ficheros)
	{
		$mensaje="<font color=\"#FF0000\" size=\"+1\">Identificador de fichero no v&aacute;lido</font>";
	}
	else if(mysql_num_rows($result_ficheros)==0)
	{
		$mensaje="<font color=\"#FF0000\" size=\"+1\">El fichero no existe</font>";
	}
	else if(mysql_num_rows($result_ficheros)>1)
	{
		$mensaje="<font color=\"#FF0000\" size=\"+1\">Identificador de fichero duplicado</font>";
		$error=true;
	}
	else
	{
		$row=mysql_fetch_array($result_ficheros);
		if($row["nombre"]!=$nombre)
		{
			//Hay que renombrar el fichero en el servidor
			rename("../ficheros/".$row["nombre"],"../ficheros/".$nombre);
		}
		if($nuevo)
		{
	    	$query_ficheros="update ficheros set nombre=\"$nombre\", descripcion=\"$descripcion\", version=\"$version\", nuevo=\"s\", fecha=\"$fecha\" where id=$id";
		}
		else
		{
    		$query_ficheros="update ficheros set nombre=\"$nombre\", descripcion=\"$descripcion\", version=\"$version\", nuevo=\"n\", fecha=\"$fecha\" where id=$id";
		}
		$result_ficheros=mysql_query($query_ficheros,$link);
		if($result_ficheros)
		{
    		$mensaje="<font color=\"#666666\">La edici&oacute;n se efectu&oacute; con &eacute;xito</font>";
		}
		else
		{
    		$mensaje="<font color=\"#FF0000\">Error en el acceso a la tabla de ficheros.Se ejecut&oacute; la query: \"".$query_ficheros."\"</font>";
		}
		//Cerrar la conexión a la Base de Datos
		mysql_close($link);
	}
	return $mensaje;
}

function BorrarFichero($id)
{
	//Borra un fichero a la base de datos y lo elimina del servidor
	$mensaje=""; //Mensaje de retorno
	//Conectar a la base de datos
	$link=ConectarBD();
	$query_ficheros="select * from ficheros where id=$id";
	$result_ficheros=mysql_query($query_ficheros,$link);
	if(mysql_num_rows($result_ficheros)==0)
	{
		$mensaje="<font color=\"#FF0000\" >No existe ningún registro con ese identificador para ser borrado</font>";
	}
	else{
		//se borra el fichero del servidor
		$row=mysql_fetch_array($result_ficheros);
		unlink("../ficheros/".$row["nombre"]);
		//se borra la entrada de la base de datos
		$query_ficheros="delete from ficheros where id=$id";
		$result_ficheros=mysql_query($query_ficheros,$link);
		if($result_ficheros)
		{
			$mensaje="<font color=\"#666666\">El borrado se efectuó con éxito</font>";
		}
		else
		{
			$mensaje="<font color=\"#FF0000\" >Error en el acceso a la tabla de ficheros.Se ejecutó la query: \"".$query_ficheros."\"</font>";
		}
	}
	return $mensaje;
}

//Nueva Noticia
function NuevaNoticia($fecha,$texto)
{
	//Comprobar que se han rellenado todos los campos
	if(!$fecha || !$texto)
	{
	    $mensaje="<font color=\"#FF0000\">ERROR: alguno de los campos se dej&oacute; en blanco</font>";    	
	}
	else
	{
		//Pasar la fecha al formato de la base de datos
		$fecha=aaaammdd($fecha);
		//Hacer la inserción en la base de datos
		$link=ConectarBD();
		$query_noticias="insert into noticias (id,fecha,texto,timestamp) values (LAST_INSERT_ID(),\"$fecha\",\"$texto\",NOW())";
	    $result_noticias=mysql_query($query_noticias,$link);
		if($result_noticias)
		{
			$id=mysql_insert_id($link);
			$mensaje="<font color=\"#666666\">La inserci&oacute;n se efectu&oacute; con &eacute;xito</font>";
		}
		else
		{
			$mensaje="<font color=\"#FF0000\">ERROR: en el acceso a la tabla de noticias.Se ejecutó la query: \"".$query_noticias."\"</font>";
		}
		mysql_close($link);
	}
	return $mensaje;
}

//Borrar Noticia
function BorrarNoticia($id)
{
	$link=ConectarBD();
	$query_noticias="select * from noticias where id=$id";
	$result_noticias=mysql_query($query_noticias,$link);
	if(mysql_num_rows($result_noticias)==0)
	{
		$mensaje="<font color=\"#FF0000\" >No existe ning&uacute;n registro con ese identificador para ser borrado</font>";
	}
	else
	{
		$query_noticias="delete from noticias where id=$id";
		$result_noticias=mysql_query($query_noticias,$link);
		if($result_noticias)
		{
			$mensaje="<font color=\"#666666\">El borrado se efectu&oacute; con &eacute;xito</font>";
		}
		else
		{
			$mensaje="<font color=\"#FF0000\" >Error en el acceso a la tabla de noticias.Se ejecut&oacute; la query: \"".$query_noticias."\"</font>";
		}
	}
	mysql_close($link);
	return $mensaje;
}

//Editar Noticia
function EditarNoticia($id,$fecha,$texto)
{
	$link=ConectarBD();
	//Pasar la fecha al formato de la base de datos
	$fecha=aaaammdd($fecha);
	$query_noticias="update noticias set fecha=\"$fecha\", texto=\"$texto\", timestamp=NOW() where id=$id";
	$result_noticias=mysql_query($query_noticias,$link);
	if($result_noticias)
	{
		$mensaje="<font color=\"#666666\">La edici&oacute;n se efectu&oacute; con &eacute;xito</font>\n";
		$query_noticias="select * from noticias where id=$id";
		$result_noticias=mysql_query($query_noticias,$link);
	}
	else
	{
		$mensaje="<font color=\"#FF0000\">Error en el acceso a la tabla de noticias.Se ejecutó la query: \"".$query_noticias."\"</font>\n";
	}
	mysql_close($link);
	return $mensaje;
}
?>