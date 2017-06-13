<script src="../../View/js/dragDrop.js"></script>
<?php
    $posicion = 11;
  while ($jugadores = $banquillo->fetchObject()) {
            $posicion++;
            if($jugadores->CODJUG == 16){
    ?>
            <div class="fichaJugador<?php echo $posicion?>" data-posicion="<?=$jugadores->posicionCampo?>" data-codjug="<?=$jugadores->CODJUG?>" data-titular="no" style="opacity: 0.6;">
              <div class="capaTranparenteFicha"></div>
              <div class="contenedorImagenEqui">
    <?php
            }else{
    ?>
            <div class="fichaJugador<?php echo $posicion?> banquillo" draggable="true" data-posicion="<?=$jugadores->posicionCampo?>" data-codjug="<?=$jugadores->CODJUG?>" data-titular="no">
              <div class="capaTranparenteFicha"></div>
              <div class="contenedorImagenEqui">
    <?php
            }
                if($jugadores->IMGEQUIPO == "NULL"){
    ?>
                  <img class="imagenEquipoBanquillo" src="../../View/Multimedia/imagen/fotoEscudos/escudoNull.png"> f
    <?php
                }else{
    ?>
                  <img class="imagenEquipoBanquillo" src="<?=$jugadores->IMGEQUIPO?>"><br>
    <?php
                }
    ?>
              </div>
              
              <div class="contenedorPosicionBanquillo">
                <p class="posicionBanquillo"><?=$jugadores->ABREVIATURA?></p>
              </div>
        
              <div class="contenedorImagenBanquillo">
    <?php
                if($jugadores->IMAGEN == "NULL"){
    ?>
                  <img class="imagenJugadorBanquilloNull" src="../../View/Multimedia/imagen/fotoEscudos/jugadorNull.png">
    <?php
                }else{
    ?>
                  <img class="imagenJugadorBanquillo" src="<?=$jugadores->IMAGEN?>"><br>
    <?php
                }
    ?>
              </div>
    <?php
                if($jugadores->NOMBRE == "NULL"){
    ?>
                  <p class="nombrejugadorBanquillo">Vacio</p> 
    <?php
                }else{
    ?>
                  <p class="nombrejugadorBanquillo"><?=$jugadores->NOMBRE?></p> 
    <?php
                }
    ?> 
              <div class="trianguloBanquillo"></div>
            </div>
    <?php
          }