<?php


if (isset($_GET["id"])){

    $item="id";
    $valor=$_GET["id"];
    $usuarioRecibido=ControladorFormulario::ctrSeleccionarRegistro($item, $valor);

}
echo'<b1 class="d-flex justify-content-center py-3"> EDITE los datos que desea modificar de:  '; echo'<b4>'; print_r($usuarioRecibido["nombre"]); echo'</b4>'; echo'</b1>';
?>

<!--==========================================================================
             FORMULARIO (registro) lo que se envia desde la interface a la base de datos
=============================================================================-->


<form class="p-2" method="post">

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
                    <input type="hidden" name="var_no_actualizarPassword" value="<?php echo $usuarioRecibido["password"];?>"></input>
                    <input type="hidden" name="var_idUsuario" value="<?php echo $usuarioRecibido["id"]; ?>"></input>
                </div>
                
        
            </div>         
        </div>
                      
        <?php
            

            
          
            /*=====================================================================================
            LLAMADA METODO UPDATE para modificar datos (vae_actualizar...)
            =======================================================================================*/

          $actualizarFormulario= ControladorFormulario::ctrActualizarRegistro();
          if ($actualizarFormulario=="ok"){
            echo '<script>
               if (window.history.replaceState){ 
                     window.history.replaceState(null, null, window.location.href);
                    }
                  </script>'; #Esto borra la informaciòn que trae el formulario en el navegador html

               echo '<div class="alert alert-success text-center py-3">El usuario ha sido actualizado</div>

               <script>
                    setTimeout(function(){
                       window.location="index.php?var_pagina=inicio";
                    },1500);
               </script>';
     }; #else {echo '<div class="danger danger-success">Lo sentimo, ocurriò un error</div>';}#Salta a esta lìnea si no 

          


?>

        
           
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary ">Actualizar</button>
        </div>
</form>

