<?php
/*====================================================
            CONTROLADOR DEL FORMULARIO del registro (estos igualan o asignan los datos del frente al fondo de la base de datos)
=====================================================*/
Class ControladorFormulario{
         /*======================================================================
            MÈTODO DE LLAMADA A MODELO_FORMULARIO DEL MODELS PARA DATOS DE INGRESO registro BASE DE DATOS escritura crear del crud
         =========================================================================*/
         /*public function ctrRegistro(){ #Para poder conectar esta vista con la del controlador, yo necedsito ejecutar el metodo y ese mètodo me recibe el input y nombre y dato de la variable que se trate y lo devuelve a una variable que tengo en el mismo registro y que se llama formularioRegistro que està destinada a ser objeto  mapas; paquetes de las mismas variables repetidas...y en ese lugar aparecerà la respuesta del controllador.
               if(isset($_POST["var_registroNombre"])){
                echo $_POST["var_registroNombre"];
               }

        static public function ctrRegistro(){
            if(isset($_POST["var_registroNombre"],$_POST["var_registroEmail"],$_POST["var_registroPassword"])){
                $var_registro= $_POST["var_registroNombre"]."<br>".$_POST["var_registroEmail"]."<br>".$_POST["var_registroPassword"]."<br>";#Se debe usar return porque con estatic no se debe usar echo.OJO !!!!!Vemos a retornar un valor a una variable de la vista.
                return $var_registro;
               }
         } 
            }#ESTOOO quedooo de piiiingaaaaaaaaaa|||||!!!!!!!*/
            static public function ctrRegistro(){
                if(isset($_POST["var_registroNombre"])){
                    $tabla="registro_usuarios";#nombre de la tabla
                    $datos=array("nombre"=>$_POST["var_registroNombre"],#Variables que estàn en el la funciòn mdlRegistro de la clase ModeloFormularios del archivo modelo formulario del models y que recogen las variables de html registro y las guarda en estas variables de la clase ModeloFormularios del models y ese a su vez serà ejecutado por la clase conexiòn tambien del models.
                                 "email"=>$_POST["var_registroEmail"],
                                 "password"=>$_POST["var_registroPassword"]); #..y pasan al models instanciando esa clase del models en una segunda funcion aquì abajo...:
                    $respuesta=ModeloFormularios::mdlRegistro($tabla,$datos); #Almaceno lo que me entregue el modelo en el objeto respuesta. Esta respuesta viene de modelo formulario y se le devuelve a la vista porque es instanciada y llamada por registro en el view.
                    return $respuesta;#Esta respuesta se retorna de lo que traiga el modelo.
                }
            }

            /*======================================================================
            MÈTODO DE LLAMADA AL FORMULARIO del models PARA LECTURA de DATOS DE INGRESO del registro BASE DE DATOS lectura read del crud
         =========================================================================*/
            static public function ctrSeleccionarRegistro($item, $valor){
                $tabla="registro_usuarios";
                $respuesta=ModeloFormularios::mdlLeerRegistro($tabla, $item, $valor);#mdlLeerRegistro le llamarè a la nueva funcion que crearè dentro del models archivo modelo_formulario.php que llamarà a conexiòn para hacer el read del CRUD, leer la base de datos. Esta funcion o mètodo de la clase ControladorFormulario es llamado por la pagina inicio de los views donde estan las paginas_section con la tabla en html.
                return $respuesta;
            }


#OJOOO!!!!!Dentro de los input del html existe un atrivuto llamado name que su dato corresponde al NOMBRE DE LA VARIABLE POST que viene desde el o por el url (recuerden que la variable post a diferencia de la GET es oculta aunque ambas vienen por el url) y los valoresde esas variables seràn  datos que entren por el input de la  y anteriormente se debe definir el formulario con el mètodo post -method="post" en el DOM de HTML, sea etiqueta div, label, o lo que sea...OJO!!!!  Para evitar que la informaciòn se filtre en la url o se visualice, se coloca el metodo POST y no el mètodo GET.


       /*======================================================================
           INGRESO  MÈTODO DE LLAMADA AL FORMULARIO del models PARA LECTURA de DATOS DE INGRESO  BASE DE DATOS lectura read del crud
         =========================================================================*/
           public function ctrIngreso(){#Esto es un mètodo dinàmico (la acciòn se va a ejecutar desde el controlador y el controlador decidirà que va a hacer), en este caso: !!! reenviarme a la pagina de inicio si hago un ingreso correcto,el mètodo dinàmico DINÂMICO puede acceder a todo tipo de variables pero SIMEPRE NECESITA CREAR ANTES UN OBJETO PARA ACCEDER AL MÈTODO, mientras que un mètodo ESTÂTICO puede llamar solamente a otros mètodos static y no puede invocar un metodo dinàmico a partir de èl; PERO: PUEDE invocarlo sin crear previamente ningùn objeto (variable=new nada!), PUEDE ACCEDER DIRECTAMENTE POR EL NOMBRE DE LA CLASE y puede solamente acceder a variables estàticas.
               if(isset($_POST["var_ingresoEmail"])){

                $tabla="registro_usuarios";#nombre de la tabla
                $item="email";#nombre de columna de la tabla de la base de datos donde quiero buscar coincidencias y se debe enviar el valor de lo que traiga la variable post del email de ingreso (parte del cliente).
                $valor=$_POST["var_ingresoEmail"];#Lo que recoje la variable del section del htmal

                $respuesta=ModeloFormularios::mdlLeerRegistro($tabla, $item, $valor);#Traigo en valor o leo todos los datos de la base de datos..

                #echo '<pre>'; print_r($respuesta); echo '</pre>';
                
                if($respuesta["email"] == $_POST["var_ingresoEmail"] && $respuesta["password"] == $_POST["var_ingresoPassword"]){

                    $_SESSION["var_validarIngreso"]="ok";

                    echo '<script>
                 if (window.history.replaceState){ 
                          window.history.replaceState(null, null, window.location.href);
                 }
                          window.location="index.php?var_pagina=inicio";
                 </script>'; 

                }else{

                    echo '<script>
                 if (window.history.replaceState){ 
                          window.history.replaceState(null, null, window.location.href);
                 }
                          </script>'; 

            echo '<div class="alert alert-danger">No existe usuario registrado con ese email o la contraseña es incorrecta</div>';

                }

                #echo '<pre>'; print_r($respuesta); echo '</pre>'; #Esta lìnea debe traerme las coincidencia de la base de datos si las encontrò por lo que el metodo que en realidad uso para el ingreso es el R del CRUd en la base de datos a los mètodos que estàn dentro del archivo modelo_formulario de la carpeta models que a su vez ya recibe las varibles con los datos adecuados a la tabla y los incorpora en concatenamiuento a la cadena del SQL que llama a la conexiòn que lo envìa al URL y junto con la sintaxis SQL recibe y procesa los datos de ida y vuelta.
            }
        }

        /*======================================================================
            MÈTODO DE LLAMADA AL FORMULARIO del models PARA LECTURA de DATOS DE ACTUALIZAR del registro BASE DE DATOS lectura UPDATE del crud
         =========================================================================*/
         static public function ctrActualizarRegistro(){
           
            if(isset($_POST["var_actualizarNombre"])){   #Es que aparece un nombre introducido en el campo nombre del text area input del update del cliente, (aunque acà no aparece una opciòn si el cliente o usuario no coloca algo en el campo nombre del input de actualzaciòn). SIEMPRE ESTARÀ LLENO PORQUE SE LLENA AUTOMÀTICO POR LA VARIABLE DE LECTURA por tanto nunca pasarà a la opciòn else de abajo.
        
                if($_POST["var_actualizarPassword"] !=""){  #Esta comprueba si rellenaron el password NUEVO del input VISIBLE (quiere decir que existe voluntad del usuario por cambiarlo) para entonces asignarlo a la nueva variable creada de selcciòn es DIFERENTE DE NULO y darà TRUE por lo que pasarà a declarar en ka variable nueva este nuevo dato del cliente; pero si decidiò dejarla con el mismo (este dato vendrà vacio y sera false el !-diferente-) por lo que pasarà pasarà abajo, y no le asigna a una nueva data a la misma variable declarada password, manteniendo el dato que venìa en var_no_actualizarPassword.
        
                    $password=$_POST["var_actualizarPassword"];#Esta viene del dato automàtico editar etiqueta input donde asigna el mismo valor que viene porque el cliente decidiò no escribir nada y viene vacio y pasa el dato automatico.
        
                    }else{
        
                    $password=$_POST["var_no_actualizarPassword"];  #Esta viene del dato automàtico editar etiqueta input donde asigna el mismo valor que viene porque es false de contrario de vacìo (es decir: cuando venga vacio darà un falso)
                   }
                       
                $tabla="registro_usuarios";#nombre de la tabla
                $datos=array("id"=>$_POST["var_idUsuario"],#Viene del input de editar que viene de la tabla y lo pasa al CRUD data.
                             "nombre"=>$_POST["var_actualizarNombre"],#Variables que estàn en el la funciòn mdlRegistro de la clase ModeloFormularios del archivo modelo formulario del models y que recogen las variables de html registro y las guarda en estas variables de la clase ModeloFormularios del models y ese a su vez serà ejecutado por la clase conexiòn tambien del models y lo pasa al CRUD data.
                             "email"=>$_POST["var_actualizarEmail"],#Viene de editar input y lo pasa al CRUD  data.
                             "password"=>$password); #..y pasan al models instanciando esa clase del models en una segunda funcion aquì abajo...
                $respuesta=ModeloFormularios::mdlActualizarRegistro($tabla, $datos); #lo pasa array data y tabla al model que llama al conetaer con el argumento

                return $respuesta;


                     #aparece el campo input var_actualizarNombre con algùn dato o siempre estarà llenoa no ser que ocurra un error
                }  
        }  
        
                /*======================================================================
            MÈTODO DE LLAMADA ELIMINAR del registro BASE DE DATOS lectura DELTE del crud
         =========================================================================*/
         public function ctrEliminarRegistro(){

            if(isset($_POST["var_eliminarRegistro"])){   #Preguntamos si viene una variable post eliminar registro.
                 #si vienen algo en el post (me llamarà al mètodo del modelo mdl Eliminar registro) para concatenar los datos a la base de datos y la elaboraciòn de la sintaxis SQL y la conexiòn.

                $tabla="registro_usuarios";
                $valor=$_POST["var_eliminarRegistro"];

                $respuesta=ModeloFormularios::mdlEliminarRegistro($tabla, $valor);#Traigo en valor o leo todos los datos de la base de datos..

                if($respuesta=="ok"){

                    echo '<script>
                    if (window.history.replaceState){ 
                             window.history.replaceState(null, null, window.location.href);
                    }
                             window.location="index.php?var_pagina=inicio";
                           </script>'; #Esta lìnea refresca la pàgina de inicio y automaticamente me actualiza lo que existe desde la base de datos.

                    #'<div class="alert alert-success text-center py-3">Fuè eliminada </div>';
                    #echo'<b2 class="d-flex justify-content-center py-3"> Edite los datos que desea modificar de: '; print_r($value["nombre"]); echo'</b2>';

   

                }

                return $respuesta;
         }

    }



}




?>



