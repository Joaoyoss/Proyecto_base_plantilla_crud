<?php


if (isset($_GET["var_gt_token"])){

    $item="token";#Nombre de la columna de la tabla de la base de datos; me buscarà en la columna llamada sting token de la base de dartos.
    $valor=$_GET["var_gt_token"];#Se almacena todo lo que viene de inicio pagina y es la variable GET de valor de token de tabla para ese usuario y aasume el dato del valor de token columna base de datos
    $usuarioRecibido=ControladorFormulario::ctrSeleccionarRegistro($item, $valor);#Si viene algo en el id (el nùmero de usuario de la tabla) (con el metodo isset para identificar que no sea nulo) traigo ese usuario o sus datos de tabla con el nùmero id de tabla y tomo los datos y los guardo en la variable $valor, seleccionando el mètodo seleccionar ctr registro pasando los paràmetros $item de $valor, guardandolos en la variable, hago la busqueda en la base de dato con el mètodo que me relacione la sintaxis usada antes para leer esosmdatos de la base de datos y despuès un nuevo ,ètodo que llamarè par ala actualizaciòn del update del CRUD y que contendarà en el string la sintaxis para SQL de un update de la base de datos.
    #Hacemos un print r de html de esa variable dentro o con un echo de php para visualizar en html lo què trae: 
    
    #echo'<pre>'; print_r($usuarioRecibido); echo'</pre>';#Con esta lìnea compruebo que me llegan los datos que solicitè en la base de datos.

    #echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';

}
echo'<b1 class="d-flex justify-content-center py-3"> EDITE los datos que desea modificar de:';  print_r(" ".$usuarioRecibido["nombre"]);  echo'</b1>';
?>

<!--==========================================================================
             FORMULARIO (registro) lo que se envia desde la interface a la base de datos
=============================================================================-->
<!--div class="container py-5">
                    <h5 class="text-center container py-3">Registrate aquì</h5>
</!--div-->
<!--<div class="d-flex justify-content-center">-->

<form class="p-2" method="post"><!--ojo!!! que debì colocar antes este metodo en el form!!!!!!!PERO OJOOOO COJOOOONEEEE CON MAYÙSCULA!!!!!!!!!!!!!!!!!11PIIIIINNNNGAAAA||||||||Y TIENES QUE COLOCAR LA DIRECCIÒN DE URL COOOÑOOO|||||||!!!!!!!!!!!!!!!!!SE COLOCA SIEMPRE EN ACTION LA DIRECCIÒN DEL INDEX QUE ENLAZA CON EL CONTROLADOR ---PORQUE ES QUIÈN TIENE TODOS LO REQUIRED--- QUE ENLAZA CON EL RESTO DE LA PLANTILLA QUE ES QUIENN LLAMA EL SECTION DE PLANTILLA Y LOS SECTION-->

        <div class="form-group">
            
            <div class="imput-group">
            
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" class="form-control" value="<?php echo $usuarioRecibido["nombre"]; ?>" placeholder="Coloque nombre y apellidos" id="nombre" name="var_actualizarNombre"></input>
                </div>
                

            </div>
        </div>

        <div class="form-group">
            
            <div class="imput-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" value="<?php echo $usuarioRecibido["email"]; ?>" placeholder="Coloque direcciòn email" id="email" name="var_actualizarEmail"></input>
                </div>
                

            </div>
        </div>

        <div class="form-group">
            
            <div class="imput-group">
            
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Coloque nuevo password si desea actualizar" id="pwd" name="var_actualizarPassword"></input>
                    <input type="hidden" name="var_no_actualizarPassword" value="<?php echo $usuarioRecibido["password"];#password anterior viejo se almacena acà o se escribe automàticamente en la variable !!!!OJO?>"></input><!--estos input tipo hidden son input ocultos!!!!-->
                    <input type="hidden" name="var_tokenUsuario" value="<?php echo $usuarioRecibido["token"]; ?>"></input><!--Viene de la tabla--->
                    <input type="hidden" name="var_armado_token_inicial_nombre_Usuario" value="<?php echo $usuarioRecibido["nombre"]; ?>"></input><!--Viene de la tabla VARIABLE OCULTA DE ENNVÌO DEL HTML AL CONTROLADOR PARA LA CONFORMACION DEL MD5 ORIGINAL DE LOS NOMBRES por si el cliente cambia los nombre y el email--->
                    <input type="hidden" name="var_armado_token_inicial_email_Usuario" value="<?php echo $usuarioRecibido["email"]; ?>"></input><!--Viene de la tabla VARIABLE OCULTA DE ENNVÌO DEL HTML AL CONTROLADOR PARA LA CONFORMACION DEL MD5 ORIGINAL DE LOS NOMBRES por si el cliente cambia los nombre y el email--->
                </div>
                
        
            </div>         
        </div>
                      
        <?php
            #Hasta aquì me trajo los datos de inicio que aparecen en el front de la pagina con el mètodo que los recolecta y lee, seleccionando lo que necesitaba especificamente con el where y respecto de la base de datos y posteriormente uso ahora el otro mètodo del query MySQL (NUEVO X CREAR AHORA!!!) del CRUD con la sintaxis SQL para reescribir la tabla con la informaciòn. (El mètodo como todos, lo creo en el controlador para llamar al metodo de sintaxis SEQL que tambièn debo crear en el models y a su vez este llama al de conexiòn en el models con la cadena de sintaxis SQL!!!!)

            /*=====================================================================================
            METODO UPDATE para modificar datos (vae_actualizar...)
            =======================================================================================*/

          #$actualizarFormulario=new ControladorFormulario #En este caso enviàmos a la pàgina de inicio y mandamos una notificaciòn de alert verde de usuario o dato actualizàdo.
            
          
            /*=====================================================================================
            LLAMADA METODO UPDATE para modificar datos (vae_actualizar...)
            =======================================================================================*/

          $actualizarFormulario= ControladorFormulario::ctrActualizarRegistro();#ctrActualizar registro se ejecuta como un mètodo estatrico y de esa manera se se puede ejecurar prte del còdigo acà y por eso se imprime acà en este archivo y no en el controllador donde està la funciòn que me traerìa la impresiòn sin poner return y no la variable $actualizarFormulario.
          
    
          
          if ($actualizarFormulario=="ok"){
            echo '<script>
               if (window.history.replaceState){ 
                     window.history.replaceState(null, null, window.location.href);
                    }
                  </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

               echo '<div class="alert alert-success text-center py-3">El usuario ha sido actualizado</div>

               <!-- <script>
                    setTimeout(function(){
                       window.location="index.php?var_pagina=inicio";
                    },1500);
               </script> -->';
    }; #else {echo '<div class="danger danger-success">Lo sentimo, ocurriò un error</div>';}#Salta a esta lìnea si no 

         if ($actualizarFormulario=="error_de_datos_actualizaciòn"){
            echo '<script>
                if (window.history.replaceState){ 
                  window.history.replaceState(null, null, window.location.href);
                }
                </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

                echo '<div class="alert alert-danger text-center py-3">Error de coincidencia de datos del usuario durante la actualizaciòn DATOS MANIPULADOS</div>';
    };

         if($actualizarFormulario=="error_caracter_introducido"){
        echo '<script>
        if (window.history.replaceState){ 
                 window.history.replaceState(null, null, window.location.href);
        }
        </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

        echo '<div class="alert alert-danger">Error, de caracteres introducidos, no se permiten caracteres especiales</div>';     
    };

    if($actualizarFormulario=="error_caracter_introducido_passwor"){
        echo '<script>
        if (window.history.replaceState){ 
                 window.history.replaceState(null, null, window.location.href);
        }
        </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

        echo '<div class="alert alert-danger">Error, de caracteres introducidos en el password, no se permiten caracteres especiales</div>';     
    };
          


?>

        
           
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary ">Actualizar</button>
        </div>
</form>

<!--</div>-->