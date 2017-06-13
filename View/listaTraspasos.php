    <?php 
          while ($jugadores = $fichajes->fetchObject()) {
    ?>
            <div class="plantillaContenedor">
              <div class="plantillaEquipoContImg">
                <img class="plantillaEquipoImg" src="<?=$jugadores->IMGEQUIPO?>"><br>
              </div>
              
              <div class="plantillaContenedorPosicion">
                <p class="plantillaPosicion"><?=$jugadores->ABREVIATURA?></p>
              </div>
   
              <div class="plantillaContenedorImagenJug">
                <img class="plantillaImagenJugador" src="<?=$jugadores->IMAGEN?>"><br>
              </div>
              <div class="precio">
                <p><?=$jugadores->PRECIO?> <i class="fa fa-money" aria-hidden="true"></i></p>
              </div>
              <p class="PlantillaNombreJugador"><b><?=$jugadores->NOMBRE?></b></p> 
              <button type="button" class="btn btn-default botonFichar" data-codusu="<?=$_SESSION['idUsuario']?>" data-codjug="<?=$jugadores->CODJUG?>" data-null="<?=$numNull?>" data-moneda="<?=$jugadores->PRECIO?>">Fichar</button>
            </div> 
    <?php
          }  
    ?>   

