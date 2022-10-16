<?php
#En el index.php siempre mostraremos las salidas de las vistas al usuario, serìa la vitrina y a travès de èl enviaremos las acciones que el usuario solicita al controlador. (Està siempre la llamada a la clase que contienen el controllador)

require_once "controllers/controlador_plantilla.php"; #Se coloca el required y la ruta especificada.
require_once "controllers/controlador_formulario.php";
require_once "models/modelo_formulario.php";
#Los required se pueden colocar todos en el index a ecepcion del conexion que se requiere colocar donde vayya a utilizarla.

$plantilla = new ControladorPlantilla ();#Queda instanciada
$plantilla -> ctrTraerPlantilla ();#Se ejecuta con esto el mètodo

#$conexion=Conexion::conectar();#para llamar desde acà la conexion y ver sii funciona el PDO e imprimirlo y verlo reflejada el objeto de conexion desde el o en el index (claro que quito estas instancias e improesiones que son aquì solamente de prueba y las dejo comentadas.)
#echo '<pre>'; print_r($conexion); echo '</pre>';#Permite hacer cosolas tanto en php cpmp en js y la consola PJO!!!! de php la saca con -print_r- que es similar a -var_dump-  que nos muestra que trae esa variable. Estas van en modelo formulario del models.!!!!!


?>