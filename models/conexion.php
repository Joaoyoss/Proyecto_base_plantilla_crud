<?php

/*
Class Conexion{
    static public function conectar(){
        El primer paràmetro del PDO: (tipo de conexion (en este caso mysql):"nombre del servidor"; nombre de la base de datos",
          El segundo paràmetro: "nombre de ususario con que protegemos la base de datos, tercer paràmetro. la contraseña con que se protege esa base de datos)  TODAS TIENEN PJO!!! un nombre de servidor, un nombre de base de datos, un usuario y una contraseña.
           En XAMPP phpMyAdmin encontramos en la casita icono el nùmero del servidor y aparece siempre con una numeraciòn: -127.0.0.1- o en su defecto: localhost y eso se coloca en la funciòn como argumento 
           dbname (paràmetro de la base de datos como lo escribiste en phpMyAdmin -en tu caso, registro_usuarios-)
        $link=new PDO("mysql:host=127.0.0.1;dbname=registro_usuarios", #Servidor local tipo mysql 127.0.0.1 que es igual que colocar localhost y nombre de base de datos OJOO!!! ES DE LA BASE DE DATOS, NO DE LA TABLA COMO ME PASÒ!!! Y SIEMPRE EL ERROR SALE EN LA ULTIMA LINEA QUE ES DE LA CONTRASEÑA!!!!! en este caso: registro_usuarios
                      "root", #Nombre de ususario del servidor

                       " "); #contraseña (en este caso no tiene contraseña el ususario llamado root)
        $link->exec("set names utf8");  #Llevo todo a sintaxis utf8 que trabaja caracteres latinos
        return $link;
    }
}
*/

Class Conexion{
    static public function conectar(){
        $link=new PDO("mysql:host=127.0.0.1;dbname=curso_php_registro",
        "root",
        "");

        $link->exec("set names utf8");
        return $link;
    }
}



