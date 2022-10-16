    
        <!--==========================================================================
             SALIR
          =============================================================================-->
        
        <?php

session_destroy();#Con esto destruyo todas las variables de sesion que esxistan en mi sistema y ene el navegador...!!!!
echo '<script>window.location="index.php?var_pagina=ingreso";</script>';#Con este eco que me escribe esta lìnea de còdigo html, lo voy a mandar o redireccionar a ingreso OJO!!!Esas variables de secciòn que inicia y destruye el mètodo session, quedan ocultas siempre en el navegador aunque intente impeccionar en el terminal de consola o storage del navegador, no aparecen. SON VARIABLE OCULTAS QUE LAMENTE EL NAVEGASDOR SABE QUE EXISTE PERO NINGÙN VISITANTE DE LA PAGINA LAS PUEDE VISUALIZAR. (eso le da sefuridad al lenguaje php del lado del servidor).


                    
                    
                
        

    
   