<script src="../../View/js/dragDrop.js"></script>
<?php

  $posicion = 0;
  while ($jugadores = $onceinicial->fetchObject()) {
    $posicion++;            
?>
    <div class="fichaJugador<?php echo $posicion?> jugCampo" draggable="true" data-posicion="<?=$jugadores->posicionCampo?>" data-codjug="<?=$jugadores->CODJUG?>" data-titular="si">
      <div class="capaTranparenteFicha"></div>
      <div class="contenedorImagenEqui">
        <img class="imagenEquipo" src="<?=$jugadores->IMGEQUIPO?>"><br>
      </div>
      <?php
      if($jugadores->ABREVIATURA == "LI"){
        ?>
      <div class="contenedorPosicion">
        <p class="posicion" style="left: 18px;"><?=$jugadores->ABREVIATURA?></p>
      </div>
        <?php
      }else{
        ?>
      <div class="contenedorPosicion">
        <p class="posicion"><?=$jugadores->ABREVIATURA?></p>
      </div>
      <?php
      }
      ?>
      
      <div class="contenedorImagenJug">
        <img class="imagenJugador" src="<?=$jugadores->IMAGEN?>"><br>
      </div>
      <p class="nombrejugador"><?=$jugadores->NOMBRE?></p>  
      <div class="triangulo"></div>
    </div> 
<?php
  }  
?>
