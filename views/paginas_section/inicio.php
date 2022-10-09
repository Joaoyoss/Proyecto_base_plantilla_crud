
<?php

if(isset($_SESSION["var_validarIngreso"])){
  if($_SESSION["var_validarIngreso"] !="ok"){
    echo'<script>window.location="index.php?var_pagina=ingreso";</script>';
    return;
    }
  }else{
    echo'<script>window.location="index.php?var_pagina=ingreso";</script>';#Esto impide el acceso o redirige a ingreso o bota la pàgina inicio si no està la condiciòn de seccion ok que es solamente con logueo y el mètodo lo activa siempre el index con la plantilla.
    return;
  
}

$lectura_datos_almacenados=ControladorFormulario::ctrSeleccionarRegistro(null, null);

/*____________________________________________________________
ESTA ES LA DATA QUE TRAE: (justo como aoarece en el navegador)
Array
(
  [0] => Array
      (
          [id] => 1
          [0] => 1
          [nombre] => Juan Pérez
          [1] => Juan Pérez
          [email] => juan@gmail.comm
          [2] => juan@gmail.comm
          [password] => 123456
          [3] => 123456
          [fecha] => 2022-09-28 14:21:56
          [4] => 2022-09-28 14:21:56
      )

  [1] => Array
      (
          [id] => 2
          [0] => 2
          [nombre] => Marìa Elena Travieso
          [1] => Marìa Elena Travieso
          [email] => maria@gmail.com
          [2] => maria@gmail.com
          [password] => 7890
          [3] => 7890
          [fecha] => 2022-09-28 14:18:30
          [4] => 2022-09-28 14:18:30
      )

  [2] => Array
      (
          [id] => 3
          [0] => 3
          [nombre] => Manuel Antonio Noriega
          [1] => Manuel Antonio Noriega
          [email] => jose1981@gmail.com
          [2] => jose1981@gmail.com
          [password] => pepe7622
          [3] => pepe7622
          [fecha] => 2022-09-28 14:23:06
          [4] => 2022-09-28 14:23:06
      )

  [3] => Array
      (
          [id] => 4
          [0] => 4
          [nombre] => Sara Jiménez 
          [1] => Sara Jiménez 
          [email] => sara86@gamil.com
          [2] => sara86@gamil.com
          [password] => 76182
          [3] => 76182
          [fecha] => 2022-09-28 22:21:07
          [4] => 2022-09-28 22:21:07
      )

  [4] => Array
      (
          [id] => 5
          [0] => 5
          [nombre] => Josefa Bacalao
          [1] => Josefa Bacalao
          [email] => josefinab@hotmail.com
          [2] => josefinab@hotmail.com
          [password] => 162400123
          [3] => 162400123
          [fecha] => 2022-09-28 22:30:27
          [4] => 2022-09-28 22:30:27
      )

  [5] => Array
      (
          [id] => 6
          [0] => 6
          [nombre] => Juan Junior
          [1] => Juan Junior
          [email] => juanjunior@gmail.com
          [2] => juanjunior@gmail.com
          [password] => 16990632
          [3] => 16990632
          [fecha] => 2022-09-30 08:39:31
          [4] => 2022-09-30 08:39:31
      )

  [6] => Array
      (
          [id] => 7
          [0] => 7
          [nombre] => Gilberto Gómez 
          [1] => Gilberto Gómez 
          [email] => gilberto@hotmail.com
          [2] => gilberto@hotmail.com
          [password] => 54321
          [3] => 54321
          [fecha] => 2022-09-30 08:42:01
          [4] => 2022-09-30 08:42:01
      )

)*/


?>

        <!--==========================================================================
             CONTENIDO TABLA ESTATICO o QUEMADO
          =============================================================================
   
                   
            <table class="table">
              <thead>  Encabezado  de la tabla  
                <tr>
                  <th>Conditions</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha de creaciòn</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>  Cuerpo  de la tabla  
                <tr>
                  <td>Default</td>
                  <td>Defaultson</td>
                  <td>def@somemail.com</td>
                  <td>00/00/2022</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button> ojo!!!Se puede reemplazar donde dice editar, por ese icono o texto por la referencia de la imagen en codigo html fonaweson
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>      
                <tr class="table-primary">
                  <td>Primary</td>
                  <td>Joe</td>
                  <td>joe@example.com</td>
                  <td>10/10/2022</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-success">
                  <td>Success</td>
                  <td>Doe</td>
                  <td>john@example.com</td>
                  <td>12/10/2022</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-danger">
                  <td>Danger</td>
                  <td>Moe</td>
                  <td>mary@example.com</td>
                  <td>01/11/2022</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-info">
                  <td>Info</td>
                  <td>Dooley</td>
                  <td>july@example.com</td>
                  <td>09/10/2022</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-warning">
                  <td>Warning</td>
                  <td>Refs</td>
                  <td>bo@example.com</td>
                  <td>09/09/2022</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-active">
                  <td>Active</td>
                  <td>Activeson</td>
                  <td>act@example.com</td>
                  <td>08/08/2021</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-secondary">
                  <td>Secondary</td>
                  <td>Secondson</td>
                  <td>sec@example.com</td>
                  <td>12/10/2020</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-light">
                  <td>Light</td>
                  <td>Angie</td>
                  <td>angie@example.com</td>
                  <td>06/07/2019</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
                <tr class="table-dark text-dark">
                  <td>Dark</td>
                  <td>Bo</td>
                  <td>bo@example.com</td>
                  <td>06/01/2006</td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                  </td>
                </tr>
              </tbody>
            </table>
          -->

          

            <!--==========================================================================
             CONTENIDO TABLA DINÀMICO CON FOREACH PHP DENTRO DE HTML
          =============================================================================
        OJO!!!!! En el body o cuerpo o a partir de este, donde dice nombre coloco  el còdigo php: -->

          <table class="table">
              <thead><!--  Encabezado  de la tabla  -->
                <tr>
                  <th>No.</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha de creaciòn</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody><!--  Cuerpo  de la tabla  -->

              <?php foreach ($lectura_datos_almacenados as $key => $value):?> 
                <!--Hace un recorrido por $lectura_datos_almacenados y por cada uno de sus recorridos toma sus valores array 1, array 2, array3...y lo reemplazamos dentro del html que va abriendo o visualizando php con etiquetas php haciendo ecos del values llamada por la columna que se reepetirà cuantos array existan en el each-->
                
                <tr class="table-warning">
                  <td><?php echo ($key+1);?></td>
                  <td><?php echo $value["nombre"];?></td>
                  <td><?php echo $value["email"];?></td>
                  <td><?php echo $value["fecha"];?></td>
                  <td>
                  <div class="btn-group">

                    <div class="px-1">
                    <a href="index.php?var_pagina=editar&id=<?php echo $value["id"];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>  <!--!!!!OJO se debe poner obligatoriamente la etiqueta <a> ancor (anclaje) y no button para que me trabaje el href porue sin la etiqueta anle NO TRABAJA EL HREF; el href solo trabaja en etiquetas ancle!!-->
                    </div>

                    <div class="px-1">
                    <form method="post"><!--En este caso del boton delete para el crud a diferencia del update que se mandaba el dato con get por url, acà se envia el id para el delete del crus sql por un post en un etiqueta dom de html formulario y el boton delete se convuerte en tipo submit o envìo de formulario, sleeccionando el mètodo en la etiqueta formulario: colocando methodo post-->
                      <input type="hidden" value="<?php echo $value["id"]; ?>" name="var_eliminarRegistro"><!--Aquì existe posibilidad de enviar un paràmetro tipo oculto que tendrà como nombre de variable: -->
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                         <?php
                            $eliminar=new ControladorFormulario();
                            $eliminar->ctrEliminarRegistro();
                         ?>

                    </form><!--Este form input botton delette dentro, hace una peticiòn al controllador desde un mètodo estàtico creado para configurar un SQL delette para el la D del CRUD y aquì mismo lo llamo con un call php (arriba)-->
                    </div>


                  </div>
                  </td>
                </tr>

                <?php endforeach ?>
                
              </tbody>
            </table>
          
          