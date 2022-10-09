<?php
session_start(); 
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

        <!--==========================================================================
            SECTION / CONTENIDO FORMULARIO (ingreso/registro) O CONTENIDO TABLA (inicio) O SALIR
          =============================================================================-->

        <?php
        
             if(isset($_GET["var_pagina"])){

                if($_GET["var_pagina"]=="salir"||
                   $_GET["var_pagina"]=="editar" ||        
                   $_GET["var_pagina"]=="inicio" ||       
                   $_GET["var_pagina"]=="registro" ||
                   $_GET["var_pagina"]=="ingreso"){

                     $section= "paginas_section/".$_GET["var_pagina"].".php"; 

                   }else{
                    $section= "paginas_section/error404.php";
                   }

            }else{
                $section= "paginas_section/registro.php"; 
            }
        ?>
   
        <div class="container-fluid">
          
          <div class="container py-5">
            
            <?php
            include $section;
            ?>

          </div>
        </div>

    </body>
    </html>