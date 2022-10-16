<?php
session_start(); //Esto destruye las secciones que esxistan cuando salga del sistema (mientras no se salga de la secciòn la varible de secciòn permanece con dato ok)
?>



<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web Proyecto Ejemplo Segunda Versiòn</title>

<!--==========================================================================
    PLUGGINS CSS  w3school de boostrap
=============================================================================-->
<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!--==========================================================================
    PLUGGINS JS  w3school de boostrap
=============================================================================-->
<!-- jQuery library -->
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!--==========================================================================
    VERSIÒN DE FONT   fontawesome 
=============================================================================-->
<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <!--==========================================================================
             LOGOTIPO
          =============================================================================-->

        <div class="container-fluid">
            <h3 class="text-center py-3">LOGO</h3>
        </div>

        <!--==========================================================================
             BOTONERA
          =============================================================================-->
        <!--Tengo que acà definir los botònes y una condicional para selecionar el section con el archivo que corresponda desde un GET-->

        <!--Harè lo mismo para definir los botones: lo harè desde una variable GET y a la variable le llamarè "var_activo" (tambièn vendrà por get) Y EN ESTE CASO ME COINCIDE CON EL TIPO DE PÀGINA DEL BOTON QUE ACTIVO POR TANTO CONTINUAO CON var_pagina.

        #OJO !!!!!!!!!!!1EXISTE UNA MANERA DE USAR LA SINRTAXIS PHP SIN ALTERAR LA SINTAXIS HTML: y es dentro del mismo html colocar codigos php con apertura y cierre del -< ?php ?>- en cada line de còdigo y OJO!!!! CERRAR CON OTRA LÌNEA -< ? php endif ?>- para que todo EL HTML INTERMEDIO regrese AL HTML!!!!!!!!!!!!!!1-, EL ENDIF ME DICE O ANUNCIA CUAL ES LA LINEA DE HTML QUE PUEDE SER CAMBIADA.-->

        <!--OJO!!!Como el primer include viene a registro debo tener condicionado el active del botòn siempre en registro....y por eso al fianl debo colocar un else con el active de registro botòn si es que no viene dato alguno en la variable var_registro VER AL FINAL-->

        <div class="container-fluid bg-light">
            <div class="container">
                <ul class="nav nav-justified py-2 nav-pills">

                    <?php if(isset($_GET["var_pagina"])):?>
                        <?php if($_GET["var_pagina"]=="registro"):?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?var_pagina=registro">Registro</a><!--Con ese signo de ? interrogaciòn es suficiente para que aparezcan y con el href aparecen en la url la cadena: -index.php?var_pagina=registro- -->
                    </li>

                        <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?var_pagina=registro">Registro</a>
                    </li>  

                        <?php endif ?>

                    <?php endif ?>


                    <?php if(isset($_GET["var_pagina"])):?>
                        <?php if($_GET["var_pagina"]=="ingreso"):?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?var_pagina=ingreso">Ingreso</a>
                    </li>

                        <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?var_pagina=ingreso">Ingreso</a>
                    </li>

                        <?php endif ?>

                    <?php endif ?>

                    
                    <?php if(isset($_GET["var_pagina"])):?>
                        <?php if($_GET["var_pagina"]=="inicio"):?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?var_pagina=inicio">Inicio</a>
                    </li>

                        <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?var_pagina=inicio">Inicio</a>
                    </li>

                        <?php endif ?>

                    <?php endif ?>
                    

                    <?php if(isset($_GET["var_pagina"])):?>
                        <?php if($_GET["var_pagina"]=="salir"):?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?var_pagina=salir">Salir</a>
                    </li>

                        <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?var_pagina=salir">Salir</a>
                    </li>

                        <?php endif ?>

                        <?php else: ?>
                            <li class="nav-item">
                                 <a class="nav-link active" href="index.php?var_pagina=registro">Registro</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="index.php?var_pagina=ingreso">Ingreso</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="index.php?var_pagina=inicio">Inicio</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="index.php?var_pagina=salir">Salir</a>
                            </li>

                    <?php endif ?>

                    
                </ul>
            </div>
        </div>
<!-- HASTA AQUÌ DEFINÌ POSICION Y ESTADO DE LOS BOTONES Y CONDICIÒN DE LA VARIABLE DE LA URLA PARA SER RECIBIDA POR EL GET Y REDIRECCIONAR EL SECTION DE PÀGINA QUE NECESITO-->
        <!--==========================================================================
            SECTION / CONTENIDO FORMULARIO (ingreso/registro) O CONTENIDO TABLA (inicio) O SALIR
          =============================================================================-->

        <?php
        # Acà con estas lineas de còdigo pregunto si vienen o nò variables GET en la URL; còmo se hace? : se hace con la funciòn isset y determina si una variable està definida o indefinida o null....
             if(isset($_GET["var_pagina"])){# OJO!!!El mètodo GET me busca esa variable var_pagina en la url y con el mètodo isset me determina si el dato de la variable en caso de que aparezca viene definido o null. !!!!-DEFINE SI EXISTE UNA VARIABLE Y UN DATO DE ESA VARIABLE-!!!!
                if($_GET["var_pagina"]=="salir"||#EVITA ATAQUES CODE INJECCTION con esta lista blanca!!!!!!!!!!!!!!11
                   $_GET["var_pagina"]=="editar" ||        
                   $_GET["var_pagina"]=="inicio" ||       
                   /*Aquì (en la primera etapa del if isset) me define primeramente SI EXISTE en la url ALGUNA VARIABLE y si de existir esa VARIABLE, la misma se llame "var_pagina" (trae un dato que necesito para el bloque sectiòn) Y PUEDEN HABER VARIAS CONDICIONES:
                   1- Primera conditions: No traè la url variable alguna, ni llamada var_pagina ni ningun otra. 
                   2- Trae variable la url pero no se llama "var_pagina". 
                   3- Trae una variable la url llamada "var_pàgina" y puede tener contener dato. (Que se defina una variable llamada "var_pagina")
                   4- Trae una variable la url llamada "var_pàgina" y puede tener NO contener dato alguno.

                   # Indefinido en matemàtica: Se puede ASEGURAR que no existe, no habrà posibilidad de definirlo,(como la divicion a cero) NO SE PUEDE DAR UNA DEFINICIÒN; se asegura de que no se determinarà jamàs, NUNCA EXISTIRÀ modo de saberlo. 

                   # Indeterminado en matemàticas: No se puede asegurar que no exista, o se puede saber que existe pero su valor es imposible de determinar porque puede variar. Puede tener valor o puede no tenerlo o varios.

                   # Indefinido en infirmàtica: En informàtica se refiere a la variable que no existe o que si existe pero el dato de esa variable no existe, no se puede asegurar ni determinar nada, o que la variable està definida, pero no se le asigna algùn valor a esa variable, no trae datos o valor alguno. (creo que viene a ser como el indeterminado en matemàticas). El indefinido puede ser llenado, no es categorico y no se puede asegurar sea vacìo.

                   # Nulo en infirmàtica: En informàtica se refiere al dato de la variable y esto asegura que existe la variable, està definida y es valor reservada en los càlcuklos, Y SÌ SE LE ASIGNA UN VALOR QUE ES NULO o vaciò (sin poder ocupar) SE ASEGURA no se le puede asignar algùn valor a esa variable, viene cancelada para datos o valor alguno. (creo que viene a seer como el indefinido en matemàtica) eL TERMINO NULO OCUPA ESPACIO, NO DEJA DUDAS AL VACIÒ AUNQUE ES UN VACIÒ O SEGIRUDAD DE VACIO.  OJO!!EL NULO COMO CONCEPTO ES UNA CONDICION INVARIABLE, UNA VOLUNTAD DE NO SER INDEFINIDO NI LLENADO!!!

                   */

                   #PARA ESTOS CASOS EXISTE Y SE DEFINE LA VARIABLE EN LA URL, POR TANTO  pueden ocurrir varias opciones:
                   #1- El dato de la variable estar indefinido (OJO EL DATO)
                   #2- El dato de la variable sea alguna opciòn de la selecciòn.

                   $_GET["var_pagina"]=="registro" ||
                   $_GET["var_pagina"]=="ingreso"){

                     $section= "paginas_section/".$_GET["var_pagina"].".php"; #OPCION donde la variable var-pagina existe y el dato que trae es una de las opciones que coinciden con el section y las pàginas disponibles /!!!OJO EL INDEX NO ESTARÌA POR PRIMERA VEZ por eso està en el href index.php para reiiniciar la plantilla y el index.

                   }else{
                    $section= "paginas_section/error404.php";#OPCION donde la variable var-pagina existe pero el dato que trae NO es una de las opcionesOPCIONES que coinciden con el section para armar una ruta efectiva y traer las pàginas disponibles /!!!OJO EL INDEX NO ESTARÌA POR PRIMERA VEZ TAMPOCO por eso està en el href index.php para reiiniciar la plantilla y el index PERO INTRODUCIARIA UN DATO RUIDO DESDE LA URL PARA LA RUTA QUE SERÌA UN ERROR (o serìa el ùnico caso de DATO NULL o indefine porque no es seguridad de null CON VARIABLE DEFINIDA que arroja error igualmente que variable definida y dato loco o enajenado) TODO 404..!!!!!!!!!!!!!SE HACE PORQUE SI NO ME DEJA EN BLANCO EL INCLUDE DEL SECTION!!!!!!!!!!!!!1 Y CONDICIONA AL USUARIO A VOLVER A PULSAR BOTONERA. !!!!AQUÌ SE CAE CUANDO SE EVITA FORZAR LA URL CON OTRO VALOR O CUANDO EL DATO VIENE EN BLANCO (fuera de las listas blancas o negras especificada) Entonces se le envia 404 ERROR!!!! Que permites y què no permites para tus pàginas internas.
                   }

            }else{#Si no està declarada condicionamos una ruta con include, en este caso inicio.
                $section= "paginas_section/registro.php"; #!!!SI NO EXISTE LA VARIABLE EN LA URL VIENE AQUÌ A ASIGNAR UN SECTION forzado EN EL INCLUDE /ojoo!!!! PORQUE SERÌA LA PRIMERA VEZ EN EL INDEX Y LA PLANTILLA SIEMPRE (o serìa el ùnico caso de VARIABLE NULL y claramente el dato null si no existe variable).
            }
        ?>
   
        <div class="container-fluid">
          
          <div class="container py-5">
            
            <?php
            include $section;#ESta lìnea es la que timonea con la sentencia include la opciòn de ejecutar en dependencia del url que varìa con el encadenamiento de la variable section con el get de la pàgina.
            ?>

          </div>
        </div>

    </body>
    </html>