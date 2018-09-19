<?php
//Ficheros incluidos
include("lib/auxiliares.php");
//
?>
<html>
  <head>
<?php
CabeceraHTML("ENS2001 Ensamblador y Simulador IEEE 694");
?>
  </head>
  <body bgcolor="#FFFFFF" text="#000000" link="#0000FF" vlink="#CC66CC" alink="#0000FF">
    <table width="620" border="0">
      <tr>
        <td>
          <p align="center"><b><i><font face="Courier New, Courier, mono" size="+3">ENS2001</font></i></b></p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <p><font color="#222222"><b>¿Qu&eacute; es ENS2001?</b></font></p>
                <div align="justify">
                  <p>ENS2001 es una aplicaci&oacute;n que integra la funci&oacute;n de Ensamblador, de un subconjunto de instrucciones del est&aacute;ndar IEEE 694, y la funci&oacute;n de Simulador, ya que es capaz de ejecutar programas ensamblados para dicha implementaci&oacute;n particular del est&aacute;ndar. Se trata de una mejora de las herramientas disponibles hasta ahora, como son ASS y ENS96, a las que a&ntilde;ade una arquitectura de m&aacute;quina virtual mejorada, una implementaci&oacute;n del lenguaje m&aacute;s homog&eacute;nea, y, principalmente, una nueva y c&oacute;moda interfaz gr&aacute;fica.</p>
                  <p>Para usar la herramienta, simplemente hay que descomprimir en un directorio del disco duro los archivos contenidos en el paquete comprimido correspondiente a la versi&oacute;n que se quiera emplear. A la hora de ejecutar la aplicaci&oacute;n, el directorio de trabajo no debe estar protegido contra escritura, ya que la herramienta genera archivos temporales durante la sesi&oacute;n.</p>
                </div>
              </td>
            </tr>
          </table>
          <p><b>Ficheros disponibles para descargar:</b></p>
<?php
//Mostrar la tabla de ficheros
$ficheros=TablaFicheros("","","","");
if(!$ficheros)
{
   	echo "          <p><font face=\"Arial\" size=\"-1\" color=\"#FF0000\">No hay ficheros para descargar</font></p>\n";
}
?>
          <p><b>Novedades (Se muestran las &uacute;ltimas 5 actualizaciones):</b></p>
<?php
//Mostrar las noticias en grupos de 5 a partir de la primera
$noticias=TablaNoticias("",1,5);
if(!$noticias)
{
	echo "          <p><font face=\"Arial\" size=\"-1\" color=\"#FF0000\">No hay novedades en la p&aacute;gina</font></p>\n";
}
NoticiasAnteriores(1,5);
?>
          <div align="justify">
            <p>Si encuentras alg&uacute;n error, deseas hacer alguna sugerencia, o simplemente quieres estar al corriente de las &uacute;ltimas novedades de la herramienta ENS2001, por favor, env&iacute;a un correo electr&oacute;nico a la siguiente direcci&oacute;n:</p>
            <p><a href="mailto:ens2001@lycos.es">ens2001@lycos.es</a></p>
            <p>NOTA: A fin de poder reproducir y solucionar los errores con rapidez y precisi&oacute;n, adjunta el c&oacute;digo fuente que ha producido el error, o la secuencia de pasos que has seguido para llegar a la situaci&oacute;n err&oacute;nea. Gracias.</p>
          </div>
        </td>
      </tr>
    </table>
  <p>
  <!-- INICIO codigo contadores.miarroba.com -->
  <SCRIPT LANGUAGE="JavaScript" src="http://miarroba.com/contadores/ver.php?id=78511"></SCRIPT>
  <!-- FIN codigo contadores.miarroba.com -->
  Visitas (contador cortes&iacute;a de <a href="http://miarroba.com/">miarroba.com</a>).
  </p>
  </body>
</html>
