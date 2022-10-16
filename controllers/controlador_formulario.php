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
            }#ESTOOO quedooo de piiiingaaaaaaaaaa|||||!!!!!!!ESCRIBIR*/
            static public function ctrRegistro(){#Crear del CRUD
                if(isset($_POST["var_registroNombre"])){

                    /**=================================================================0
                     * !!SEGURIDAD!!  AQUÌ SEMCOLOCAS UNA FUNCION DE VALIDACION PARA DETECTAR INPUT DE JS O CODIGOSEN LOS REGISTROS
                     * ===================================================================
                     */#________DE ESTA MANERA EVITAMOS ATAQUES CROSS-SITE SCRIPTING
                                  #PROTECCION XSS (Cross-Site Scripting) CONTRA CODIGOS JS U OTROS
                     #================================================================
                    if (preg_match('/^[a-zA-ZñÑàèìòùÀÈÌÒÙüéáíóúÁÉÍÓÚ ]+$/', $_POST["var_registroNombre"])&& 
                        preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_])*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["var_registroEmail"])&&
                        preg_match('/^[0-9a-zA-Z]+$/', $_POST["var_registroPassword"])){ #En caso de còdigo no envìa el input y pasa alelse del error abajo #Darà error con caracteres de ( ESOS <>/!"]})o palabras claves en el input porque son para escribir còdigo.
                        
                    
                        $tabla="registro_usuarios";#nombre de la tabla

                         #======================================================================
                         #  REGISTRO DE TOKEN PARA SALVAGUARDAR COPIA EN BASE DE DATOS token!!!!
                     #=========================================================================
                    #=================================================================
                     # !!PROTECCIÒN CONTRA csfr(CROSS-SITE-REQUEST FORGERIES) haciendo token para evitar manipulaciones internas desde la conslola de navegador
                     #===================================================================
                        $token=md5($_POST["var_registroNombre"]."+".$_POST["var_registroEmail"]);

                        $datos=array("token"=>$token,#Acà pasamos esa variable token creada anteriormente y que contiene la cadena str con la concatenaciòn de nombre mas correo y pasada por la funciòn md5 pars generar un token que serà guardado en bd.
                        "nombre"=>$_POST["var_registroNombre"],#Variables que estàn en el la funciòn mdlRegistro de la clase ModeloFormularios del archivo modelo formulario del models y que recogen las variables de html registro y las guarda en estas variables de la clase ModeloFormularios del models y ese a su vez serà ejecutado por la clase conexiòn tambien del models.
                        "email"=>$_POST["var_registroEmail"],
                        "password"=>$_POST["var_registroPassword"]); #..y pasan al models instanciando esa clase del models en una segunda funcion aquì abajo...:
                    $respuesta=ModeloFormularios::mdlRegistro($tabla,$datos); #Almaceno lo que me entregue el modelo en el objeto respuesta. Esta respuesta viene de modelo formulario y se le devuelve a la vista porque es instanciada y llamada por registro en el view.
                    return $respuesta;#Esta respuesta se retorna de lo que traiga el modelo.

                    }else {
                        $respuesta ="error_caracter_introducido";
                        return $respuesta; #Darà error con caracteres de <>/!"]}o palabras claves en el input porque son para escribir còdigo

                    }

                    
                }
            }

            /*======================================================================
            MÈTODO DE LLAMADA AL FORMULARIO del models PARA LECTURA de DATOS DE INGRESO del registro BASE DE DATOS lectura read del crud
         =========================================================================*/
            static public function ctrSeleccionarRegistro($item, $valor){#Lectura total tabla del Read total de tabla CRUD
                $tabla="registro_usuarios";
                $respuesta=ModeloFormularios::mdlLeerRegistro($tabla, $item, $valor);#mdlLeerRegistro le llamarè a la nueva funcion que crearè dentro del models archivo modelo_formulario.php que llamarà a conexiòn para hacer el read del CRUD, leer la base de datos. Esta funcion o mètodo de la clase ControladorFormulario es llamado por la pagina inicio de los views donde estan las paginas_section con la tabla en html.
                return $respuesta;
            }


#OJOOO!!!!!Dentro de los input del html existe un atrivuto llamado name que su dato corresponde al NOMBRE DE LA VARIABLE POST que viene desde el o por el url (recuerden que la variable post a diferencia de la GET es oculta aunque ambas vienen por el url) y los valoresde esas variables seràn  datos que entren por el input de la  y anteriormente se debe definir el formulario con el mètodo post -method="post" en el DOM de HTML, sea etiqueta div, label, o lo que sea...OJO!!!!  Para evitar que la informaciòn se filtre en la url o se visualice, se coloca el metodo POST y no el mètodo GET.


       /*======================================================================
           INGRESO  MÈTODO DE LLAMADA AL FORMULARIO del models PARA LECTURA de DATOS DE INGRESO  BASE DE DATOS lectura read del crud
         =========================================================================*/#Lectura Query REad del Query del CRUD
           public function ctrIngreso(){#Esto es un mètodo dinàmico (la acciòn se va a ejecutar desde el controlador y el controlador decidirà que va a hacer), en este caso: !!! reenviarme a la pagina de inicio si hago un ingreso correcto,el mètodo dinàmico DINÂMICO puede acceder a todo tipo de variables pero SIMEPRE NECESITA CREAR ANTES UN OBJETO PARA ACCEDER AL MÈTODO, mientras que un mètodo ESTÂTICO puede llamar solamente a otros mètodos static y no puede invocar un metodo dinàmico a partir de èl; PERO: PUEDE invocarlo sin crear previamente ningùn objeto (variable=new nada!), PUEDE ACCEDER DIRECTAMENTE POR EL NOMBRE DE LA CLASE y puede solamente acceder a variables estàticas.
               if(isset($_POST["var_ingresoEmail"])){

                $tabla="registro_usuarios";#nombre de la tabla
                $item="email";#nombre de columna de la tabla de la base de datos donde quiero buscar coincidencias y se debe enviar el valor de lo que traiga la variable post del email de ingreso (parte del cliente).
                $valor=$_POST["var_ingresoEmail"];#Lo que recoje la variable del section del htmal

                $respuesta=ModeloFormularios::mdlLeerRegistro($tabla, $item, $valor);#Traigo en valor o leo todos los datos de la base de datos..

                echo '<pre>'; print_r($respuesta); echo '</pre>';
                
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
         static public function ctrActualizarRegistro(){#Update reescribir tsbla del CRUD
           
            if(isset($_POST["var_actualizarNombre"])){   #Es que aparece un nombre introducido en el campo nombre del text area input del update del cliente, (aunque acà no aparece una opciòn si el cliente o usuario no coloca algo en el campo nombre del input de actualzaciòn). SIEMPRE ESTARÀ LLENO PORQUE SE LLENA AUTOMÀTICO POR LA VARIABLE DE LECTURA por tanto nunca pasarà a la opciòn else de abajo.

                     #=================================================================================
                #________DE ESTA MANERA EVITAMOS ATAQUES CROSS-SITE SCRIPTING
                                  #PROTECCION XSS (Cross-Site Scripting) CONTRA CODIGOS JS U OTROS
                     #================================================================
                if (preg_match('/^[a-zA-ZñÑàèìòùÀÈÌÒÙüéáíóúÁÉÍÓÚ. ]+$/', $_POST["var_actualizarNombre"])&&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_])*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["var_actualizarEmail"])){

                    $usuario=ModeloFormularios::mdlLeerRegistro("registro_usuarios", "token", $_POST["var_tokenUsuario"]);#Traigo en valor o leo todos los datos de la base de datos..y este ultimo dato del argumento me viene del nombre de variable del input del boton editar de la pàgina editar
                    #echo '<pre>'; print_r($usuario); echo '0- Datos de la BD</pre>';#Viene de la tabla token que traje y todo lo demàs
                    
                    $token_busuqeda=($usuario["token"]);#token de tabla; Este igual es viejo y me debe coincidir con el var_tokenUsuario
                    #echo '<pre>'; print_r($token_busuqeda); echo ' 1- Token de la BD</pre>';
                     
                    #echo '<pre>'; print_r($_POST["var_tokenUsuario"]); echo ' 2- Antiguo token del usuario BD</pre>';
                    #Viene de cliente input token (El token original que trae el editar del pagina inicio) armado (El viejo antes de la tabla antes de la actualizaciòn..si  lo cambia se jode el usuario cliao)!!!!ESTE ES UNO DE LOS TIPOS!!!Este es el otro que tendrìa que usar en la comparaciòn que me sirve para verificar si el cliente alterò en consola navegador el token hidden que viene de la primera lectura de tabla========


                    #=================================================================
                     # !!PROTECCIÒN CONTRA csfr(CROSS-SITE-REQUEST FORGERIES) haciendo token para evitar manipulaciones internas desde la conslola de navegador MD5
                     #se hace en todosm los crud que lleven borrado o escritura 
                     #===================================================================
                    
                    $token_conformado_tabla=md5($usuario["nombre"]."+".$usuario["email"]);#tabla armando md5 ESTe es nuevo
                    #echo '<pre>'; print_r($token_conformado_tabla); echo ' 3- Token conformado md5 de los datos de la BD</pre>';

                    #echo '<br>';
                    $token_conformado_actualizado_usuario=md5($_POST["var_actualizarNombre"]."+".$_POST["var_actualizarEmail"]);#input armando md5 con lo nuevo que escriba el cliente NUEVO
                    #echo '<pre>'; print_r($_POST["var_actualizarNombre"]); print_r($_POST["var_actualizarEmail"]); echo ' Entrada actual al md5 del input</pre>';
                    #echo '<pre>'; print_r($token_conformado_actualizado_usuario); echo ' 4- Token conformado md5 de input recien</pre>';
                    #echo '</br>';

                    #echo '<br>';
                    $token_conformado_input_inicial_usuario=md5($_POST["var_armado_token_inicial_nombre_Usuario"]."+".$_POST["var_armado_token_inicial_email_Usuario"]);# armando md5 VIEJO con el input viejo de la variable nombre e email original. (con esto sè si alterò el nùmero primero de token de la tabla que debe ser este )COMPARAR.===========
                    #echo '<pre>'; print_r($_POST["var_armado_token_inicial_nombre_Usuario"]); print_r($_POST["var_armado_token_inicial_email_Usuario"]); echo ' Entrada actual al md5 del input</pre>';
                    #echo '<pre>'; print_r($token_conformado_input_inicial_usuario); echo ' 5- Token anterior input md5</pre>';
                    #echo '</br>';

                        if($token_conformado_input_inicial_usuario==$_POST["var_tokenUsuario"]){#Esta condicon me compara el directo de la variable input campo con el que conformè por tabla bd que traje y mètodo md5 El tema es garantizar que no lo manipule.#####!!!!!SI E USUARIO MANIPULA INICIALMENTE EN EL TERMINAL DEL NAVEGADOR ALGÙN DATO DE NOMBRE, EMAIL O TOKEN INICIAL; NO SE CUMPLIRÀ ESTA CONDICION Y ME BOTARÀ A ERROR DE DATO DE ACTUALIZACIÒN Y A CARTEL ERROR DE DATOS MANIPULADOS:
                            #___________________________________________________________________
                        #Si coinciden sin alterar los datos de input token conformado md5 con nombre y email de input con token input; entonces contempla el còdigo o cuerpo de esta condiciòn, sino pasarà al else....

                            if($_POST["var_actualizarPassword"] !=""){  #Esta comprueba si rellenaron el password NUEVO del input VISIBLE (quiere decir que existe voluntad del usuario por cambiarlo) para entonces asignarlo a la nueva variable creada de selcciòn es DIFERENTE DE NULO y darà TRUE por lo que pasarà a declarar en ka variable nueva este nuevo dato del cliente; pero si decidiò dejarla con el mismo (este dato vendrà vacio y sera false el !-diferente-) por lo que pasarà pasarà abajo, y no le asigna a una nueva data a la misma variable declarada password, manteniendo el dato que venìa en var_no_actualizarPassword.
                                
                                 #=================================================================================
                #                  DE ESTA MANERA EVITAMOS ATAQUES CROSS-SITE SCRIPTING
                                  #PROTECCION XSS (Cross-Site Scripting) CONTRA CODIGOS JS U OTROS
                     #================================================================
                                if (preg_match('/^[0-9a-zA-Z]+$/', $_POST["var_actualizarPassword"])){
                                    $password=$_POST["var_actualizarPassword"];#Esta viene del dato automàtico editar etiqueta input donde asigna OTRO  valor que viene porque el cliente decidiò escribir OTRA CONTRASEÑA que viene ya no vacìa vacio y pasa el dato automatico y esta condicional la verifica de escritura de codigo en su input y la bota si trae algo extraño.
                                }
                                else{
                                        $respuesta="error_caracter_introducido_password"; #esta Se me dispara ac!!!!<<<<
                                        return $respuesta;
                                        }
                                
                            }
                            else {
                                $password=$_POST["var_no_actualizarPassword"];  #Esta viene del dato automàtico editar etiqueta input donde asigna el mismo valor que viene porque es false de contrario de vacìo porque el cliente decidiò no escribir nada y viene vacio y pasa el dato automatico.(es decir: cuando venga vacio darà un falso)
                            }

                            
                            if($token_conformado_actualizado_usuario==$token_conformado_input_inicial_usuario){#Si la conformaciòn de md5 input es igual a la tabla ($usuario["token"]) $token_busuqeda: pasarè la actualizaciòn mdl; de lo contrario harè un borrar y un escribir con el nuevo token cambiado.
                                $tabla="registro_usuarios";#nombre de la tabla
                                $datos=array("token"=>$usuario["token"],#Viene del input de editar que viene de la tabla y lo pasa al CRUD data.
                                            "nombre"=>$_POST["var_actualizarNombre"],#Variables que estàn en el la funciòn mdlRegistro de la clase ModeloFormularios del archivo modelo formulario del models y que recogen las variables de html registro y las guarda en estas variables de la clase ModeloFormularios del models y ese a su vez serà ejecutado por la clase conexiòn tambien del models y lo pasa al CRUD data.
                                            "email"=>$_POST["var_actualizarEmail"],#Viene de editar input y lo pasa al CRUD  data.
                                            "password"=>$password); #..y pasan al models instanciando esa clase del models en una segunda funcion aquì abajo...
    
                                #echo '<pre>'; print_r($datos); echo '</pre>'; #Lo que manda de argumento para la tabla.           
    
                                $respuesta=ModeloFormularios::mdlActualizarRegistro($tabla, $datos); #lo pasa array data y tabla al model que llama al conetaer con el argumento
    
                                return $respuesta; #aparece el campo input var_actualizarNombre con algùn dato o siempre estarà llenoa no ser que ocurra un error
                                }#input armando md5 igual al anterior y no serà necesario actualizar o variar el token; pero si necesito variar token debo  pasar al else...!!
                                else {#Si los token me vienen diferente tomarè en vez de un update; un borrar y un mdl crear con los nuevos token...
                                    $tabla="registro_usuarios";
                                    $valor=$_POST["var_tokenUsuario"];
                                    $respuesta=ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
                                    
                                    if($respuesta=="ok"){
                                        $tabla="registro_usuarios";
                                        $datos=array("token"=>$token_conformado_actualizado_usuario,#Viene del input de editar que viene de la tabla y lo pasa al CRUD data.
                                                     "nombre"=>$_POST["var_actualizarNombre"],#Variables que estàn en el la funciòn mdlRegistro de la clase ModeloFormularios del archivo modelo formulario del models y que recogen las variables de html registro y las guarda en estas variables de la clase ModeloFormularios del models y ese a su vez serà ejecutado por la clase conexiòn tambien del models y lo pasa al CRUD data.
                                                     "email"=>$_POST["var_actualizarEmail"],#Viene de editar input y lo pasa al CRUD  data.
                                                     "password"=>$password);
                                        
                                        #echo '<pre>'; print_r($datos); echo '</pre>'; #Lo que manda de argumento para la tabla.   

                                        $respuesta=ModeloFormularios::mdlRegistro($tabla, $datos);#Traigo en valor o leo todos los datos de la base de datos..

                                        #echo '<pre>'; print_r($respuesta); echo '</pre>';
                                        return $respuesta;
                                    }

                                } 
                        #___________________________________________________________________
                        #Si coinciden sin alterar los datos de input token conformado md5 con nombre y email de input con token input; entonces contempla el còdigo o cuerpo de esta condiciòn, sino pasarà al else....
                        }
                        else {
                            $respuesta="error_de_datos_actualizaciòn"; #esta Se me dispara ac!!!!<<<<
                            return $respuesta;
                            }        
                }  
                else {
                    $respuesta ="error_caracter_introducido";
                    return $respuesta; #Darà error con caracteres de <>/!"]}o palabras claves en el input porque son para escribir còdigo / con el segundo if sin cumplir deberìa saltar este...!
                    } 
            } 
        }  
        
                /*======================================================================
            MÈTODO DE LLAMADA ELIMINAR del registro BASE DE DATOS lectura DELTE del crud
         =========================================================================*/
         public function ctrEliminarRegistro(){#Delete del crud

            if(isset($_POST["var_eliminarRegistro"])){   #Preguntamos si viene una variable post eliminar registro.
                 #si vienen algo en el post (me llamarà al mètodo del modelo mdl Eliminar registro) para concatenar los datos a la base de datos y la elaboraciòn de la sintaxis SQL y la conexiòn.

                 $usuario=ModeloFormularios::mdlLeerRegistro("registro_usuarios", "token", $_POST["var_eliminarRegistro"]);#Traigo en valor o leo todos los datos de la base de datos..
        
                 #=================================================================
                     # !!PROTECCIÒN CONTRA csfr(CROSS-SITE-REQUEST FORGERIES) haciendo token para evitar manipulaciones internas desde la conslola de navegador MD5
                     #se hace en todosm los crud que lleven borrado o escritura 
                     #===================================================================
                 
                 $comparar_token=md5($usuario["nombre"]."+".$usuario["email"]);#Guarda en token lo que viene de dto tabl nombre e email
 
                 if($comparar_token==$_POST["var_eliminarRegistro"]){#Compara md5 token tabla con token input post de boton  borrar de la pagina inicio. 
                
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
                }
            }

        }



}








