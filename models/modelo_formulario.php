<?php

require_once "conexion.php";

Class ModeloFormularios{

    /*=================================================
         Registro
    ===========================================*/
      /*=================================================
         FUNCION de CREAR Registro en la base de usuarios, la C del CRUD. 
        ===========================================*/

    static public function mdlRegistro($tabla, $datos){ #Tengo dos paràmetros: nombre de la tabla y los datos
         #1ro Debo crear un objeto que me traiga la conexiòn de la base de datos y se llmamarà stmt (statement -declaraciòn en español-)
         #2do Necesito que el modelo devuelva un ok al controlador cuando almacene la infirmaciòn y el controlador de ese ok a la vista.
         $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)"); #Objeto muy tradicional en las conexiones PDO que instancia a conexion. Esto trae el link de conexiòn a la base de datos que es lo que devuelve conectar para poder hacer una preparaciòn de sentencia SQL que va dentro del parentesis (usarè la sentencia insertar) se copia el fragmento tal cual de SQL de la base de dato consola. (con dos puntos es paràmetros ocultos que vienen en ka variable datos).

         #Usaremos la funciòn bindParam() que sirve para vincular una variable de php a un paràmetro de sustituciòn con nombre o de signo de interrogaciòn correspondiente de la sentencia SQL usada para preparar la sentencia.
         $stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
         $stmt->bindParam(":email",$datos["email"], PDO::PARAM_STR);
         $stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);

         if($stmt->execute()){
            return "ok";
         }else{
            print_r(Conexion::conectar()->errorInfo());
         }
         $stmt->close();
         $stmt=null;
    }

    /*=================================================
         Registro
    ===========================================*/
      /*=================================================
         FUNCION de LEER Registro en la base de usuarios, la R del CRUD. 
        ===========================================*/

    static public function mdlLeerRegistro ($tabla, $item, $valor){
        #Acà nuevamente, igual que el mètodo anterior, debemos hacer una sentencia QL con los datos que recibo del controllador que los trae de la pagina del views y prepraran la conexiòn para pasar al SQL de la base de datos.
        #$stmt=Conexion::conectar()->prepare("SELECT*FROM $tabla"); Asì originalmente...abajo con la funciòn SQL de myadmin para variar la data de presentaciòn de fecha.

          if($item==null && $valor==null){

          

        $stmt=Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC"); #Senttencia SQL!!!!!Llamando a la conexiòn con un mètodo sfisticado de conectar (archivo conexion.php en models) y pasando como argumento en forma de la sentencia en sintaxis SQL de base de dartos la lectura read. OJOOO!!!!ESA SE PUEDE IR DIRECTAMENTE A LA BASE DE DATOS MySQL MyADMINPHP Y EJECUTAR EN EL EDITOR Y COPIAR DIRECTAMENTE EL CODIGO QUE TE COLOCA. ; en este caso es -""SELECT =from (nombre de la tabla de la base de dartos que consultarè): "registro_usuarios"- en este caso no selecciono el HERE que aparece en la sintaxis porque traerè toda la tabla en lectura y no solamente un id|||||||!!!!!!!!!1 Aquì en tabla definì que estaria en controllador formulario dentro de todos los mètodos el nombre de la tasbla.
        #Ahora ejecuto el bindParams que es la funcion publica que sirve para la conexiòn ejecutando la declaraciòn -execute()- del stmt mandando el read y despuès el -close()- de ese stmt y vaciando todo...
        $stmt->execute(); #...y retorno esa declaraciòn (a diferencia del CREAR C aquì debo recibir datos) y debo retornar esa declaraciòn con una funciòn que se llama fetchAll(); fechall significa DEVOLVER TODOS LOS REGISTROS. (devuelve todos los registros id que encuentra o tenga la tabla de la base de datos). tambièn tenemos la opciòn de un fech() es cuando devolvemos un solo regisrtro con id.
        return $stmt->fetchAll();
       }else{
        $stmt=Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item  ORDER BY id DESC"); 
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute(); 
        return $stmt->fetch();
          
       }
        $stmt->close();
        $stmt=null; #Por seguridad cierro y limpio los adgoritmos y hasta acà lo recibe todo el controlador.
    }

      /*=================================================
         FUNCION de ACTUALIZAER Registro en la base de usuarios, la U del CRUD. Es casi igual que el crear del crud pero cambiando la sentencia SQL a update
        ===========================================*/

      static public function mdlActualizarRegistro($tabla, $datos){
        
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id=:id");#cooojooooneeee!!!!EL PUNTO O LA COMA PINGAAAA!!!!(:) es el dato en SQL
        #$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET `nombre`=':nombre', `email`=':email', `password`=':password' WHERE `id`=':id'"); 

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if($stmt->execute()){
           return "ok";
        }else{
           print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->close();
        $stmt=null;
      }

          /*=================================================
         FUNCION eliminar registro CRUD. Es casi igual que el crear del crud pero cambiando la sentencia SQL 
        ===========================================*/

        static public function mdlEliminarRegistro($tabla, $valor){
        
          $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");#cooojooooneeee!!!!EL PUNTO O LA COMA PINGAAAA!!!!(:) es el dato en SQL
          #$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET `nombre`=':nombre', `email`=':email', `password`=':password' WHERE `id`=':id'"); 
  
          $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
  
          if($stmt->execute()){
             return "ok";
          }else{
             print_r(Conexion::conectar()->errorInfo());
          }
          $stmt->close();
          $stmt=null;
        }
  




}



?>
