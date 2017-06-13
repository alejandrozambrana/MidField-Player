<?php
          while ($jugadores = $todos->fetchObject()) {
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
              <button type="button" class="btn btn-default botonVender" data-codusu="<?=$jugadores->CODUSU?>" data-posicioncampo="<?=$jugadores->posicionCampo?>" data-codjug="<?=$jugadores->CODJUG?>" data-moneda="<?=$jugadores->PRECIO?>">Vender</button>
              <div class="contenedorPuntos">
                <div class="puntos">
                  <?=$jugadores->PUNTOS?>
                </div>
              </div>
            </div> 
    <?php
          }  
    ?>   

