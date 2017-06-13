<?php
  require_once '../Model/Liga.php';
  
  // Obtiene todas las ligas
  $data['ligas'] = Liga::getLiga();
?>

  <div id="capaBloquearBotonesLiga"></div>
  <div id="formularioUnirteLiga">
    <button type="button" class="btn btn-default btn-lg cerrar">
      <span  class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
    <h2>Unete</h2></br>
    <form action="#" method="GET">
      <label for="seleccionaLiga" class="labelSeleccionaLiga">Selecione una liga:</label><br>
      <select name="liga" class="form-control center-block tamañoBuscador" id="seleccionaLiga">
        <option selected value> -- Selecciona -- </option>
        <?php
        foreach($data['ligas'] as $pos) {
        ?>
          <option data-participantes="<?=$pos->getPARTICIPANTES()?>" value="<?=$pos->getCODLIGA()?>"><?=$pos->getNOMBRE()?></option>
        <?php  
        }
        ?>
      </select></br>
      <button type="submit" class="btn btn-default botonUnirte" name="action">Unirte
        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
      </button>
    </form>
  </div> 
 

