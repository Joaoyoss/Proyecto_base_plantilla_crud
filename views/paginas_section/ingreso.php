
        
        <!--==========================================================================
             FORMULARIO (ingreso)
          =============================================================================-->
        <div class="d-flex justify-content-center">
          <form class="p-2" method="post">      

            <div class="form-group">
            <label for="email">Email address:</label>
            <div class="imput-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" placeholder="Enter email" id="email" name="var_ingresoEmail"></input>
                </div>        

            </div>
            </div>

            <div class="form-group">
            <label for="pwd">Password:</label>
            <div class="imput-group">
            
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="var_ingresoPassword"></input>
                </div>
                      
            </div>         
            </div>


            <?php
            
           $ingresoFormulario = new ControladorFormulario(); #Esto es un mètodo dinàmico (la acciòn se va a ejecutar desde el controlador y el controlador decidirà que va a hacer), en este caso: !!! reenviarme a la pagina de inicio si hago un ingreso correcto,el mètodo dinàmico DINÂMICO puede acceder a todo tipo de variables pero SIMEPRE NECESITA CREAR ANTES UN OBJETO PARA ACCEDER AL MÈTODO, mientras que un mètodo ESTÂTICO puede llamar solamente a otros mètodos static y no puede invocar un metodo dinàmico a partir de èl; PERO: PUEDE invocarlo sin crear previamente ningùn objeto (variable=new nada!), PUEDE ACCEDER DIRECTAMENTE POR EL NOMBRE DE LA CLASE y puede solamente acceder a variables estàticas.
           $ingresoFormulario->ctrIngreso();

           
           #echo $registroFormulario;
           
           #if($formularioRegistro=="ok")
                #echo '<div class"alert-success">El ususario ha sido registrado</div>';
           
        ?>

            


            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
            </div>

            <button type="submit" class="btn btn-primary">Ingresar</button>
          </form>
        </div>
        
    