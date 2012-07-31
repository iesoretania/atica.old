# ATICA

Aplicación Telemática para la Implantación de Sistemas de Gestión de la Calidad.

ÁTICA es una aplicación de código abierto que pretende facilitar el trabajo diario
con los sistemas de gestión de la calidad. Entre sus funcionalidades encontramos:

  * Gestión de usuarios y perfiles.
  * Creación de actividades para que los usuarios sólo vean lo que necesitan ver.
  * Preparación de un "calendario de acciones" para que los usuarios sepan qué tienen que hacer.
  * Gestión del flujo de trabajo de los documentos, incluyendo su subida, revisión y aprobación.
  * Mantenimiento de las revisiones de los documentos mediante seguimiento.
  
## Requisitos
Estos son los requisitos para poder ejecutar ÁTICA:

  * Servidor web con PHP 5.2 o posterior.
  * Acceso a un base de datos MySQL, PostgreSQL, MSSQL, u Oracle. También se permite SQLite pero no se recomienda por motivos de rendimiento.
  * Para el cliente: IE 7.0+, Firefox 3.6+ o navegador basado en Webkit (Safari 3+, Chrome 10+, iOS 3+, Android Browser 2.2+), etc.

## Instalación
Siga estos sencillos pasos:

  * Descomprima el código fuente en una carpeta que sea accesible por el servidor web.
  * Cree un *schema* de base de datos y un usuario que tenga acceso completo a dicho *schema*.
  * Abra un navegador web y apunte al fichero *index.php*.
  * Ejecute el asistente de instalación.

## Agradecimientos
Esta aplicación usa las siguientes librerías de terceros:

  * [TinyMCE].
  * [Restler].
  * [Propel].

Se ha prestado especial cuidado en asegurar que las respectivas licencias de uso son respetadas. Si encontrara que esto no es así, le rogamos que abra un *ticket* para su resolución.

## Licencia
Esta aplicación está bajo licencia [AGPL version 3].

[TinyMCE]: http://www.tinymce.com/index.php
[Restler]: http://luracast.com/products/restler/
[Propel]: http://www.propelorm.org/
[AGPL version 3]: http://www.gnu.org/licenses/agpl.html