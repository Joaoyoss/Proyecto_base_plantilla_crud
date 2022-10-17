
<!--==========================================================================
             FORMULARIO (registro) 
=============================================================================-->


<form class="p-2" method="post"><!--ojo!!! que debì colocar antes este metodo en el form -post-!!!!!!!PERO OJOOOO COJOOOONEEEE CON MAYÙSCULA!!!!!!!!!!!!!!!!!PIIIIINNNNGAAAA-->

        <div class="form-group">
            <label for="nombre">Registre su nombre y sus apellidos:</label>
            <div class="imput-group">
            
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Coloque nombre y apellidos" id="nombre" name="var_registroNombre"></input>
                </div>
                

            </div>
        </div>

        <div class="form-group">
            <label for="email">Registre un correo electrònico vàlido:</label>
            <div class="imput-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" placeholder="Coloque direcciòn email" id="email" name="var_registroEmail"></input>
                </div>
                

            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Seleccione una clave o password:</label>
            <div class="imput-group">
            
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Coloque password" id="pwd" name="var_registroPassword"></input>
                </div>
                
        
            </div>         
        </div>

        <?php

            //$postFormularioRegistro= new ControladorFormulario(); #Esta es la manera de conectar el controllador y su clase con este archivo html (Instancio el nuevo objeto)
            //$postFormularioRegistro-> ctrRegistro(); # Esta es la manera de llamar el mètdo (Llamo o declaro el mètodo) y ene el otro lado estoy pendiente de recibir todas las variables de la clase post formulrio que tienen nombre de los input y que en el mètodo debo sacar esos datos con un if y su impresiòn.

           /*=======================================================================================
            INSTANCIA LA CLASE DE UN MÈTODO ESTÀTICO
           =======================================================================================*/
           $registroFormulario = ControladorFormulario::ctrRegistro();
           if($registroFormulario=="ok"){

            #Creando un sript de JS OJO!!!!'<script></script>'; Sirve para borrar la cachè del navegador con un poco de mètodos de  dentro de una etiqueta html que està dentro de php 
            echo '<script>
                 if (window.history.replaceState){ 
                          window.history.replaceState(null, null, window.location.href);
                 }
            </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
           }

           else if($registroFormulario=="error_caracter_introducido"){
            echo '<script>
            if (window.history.replaceState){ 
                     window.history.replaceState(null, null, window.location.href);
            }
            </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

            echo '<div class="alert alert-danger">Error, de caracteres introducidos, no se permiten caracteres especiales ni en blanco</div>';     
           }

           else if($registroFormulario=="error"){
            echo '<script>
            if (window.history.replaceState){ 
                     window.history.replaceState(null, null, window.location.href);
            }
            </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

            echo '<div class="alert alert-danger">Error de conexiòn</div>';     
           }
           #echo $registroFormulario;
           
           #if($formularioRegistro=="ok")
                #echo '<div class"alert-success">El ususario ha sido registrado</div>';

            /*=====================================================================================
            FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÈTODO DINÀMICO
            =======================================================================================*/

           /*$formularioRegistro=new ControladorFormulario();
           $formularioRegistro->ctrRegistro();
           }*/


        ?>
        
           
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary ">Enviar</button>
        </div>
</form>
