
        
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
            
           $ingresoFormulario = new ControladorFormulario(); 
           $ingresoFormulario->ctrIngreso();
           
        ?>

            


            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
            </div>

            <button type="submit" class="btn btn-primary">Ingresar</button>
          </form>
        </div>
        
    