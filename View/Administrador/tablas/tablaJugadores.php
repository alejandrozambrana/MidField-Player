<!--crea una tabla con los datos-->
      <div id="divTabla" class="table-responsive">
        <table class="table table-striped" id="tablaAdministrador">
          <tr>
            <td><b>Codigo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Precio</b></td>
            <td><b>Imagen</b></td>
            <td><b>Puntos</b></td>
            <td><b>Equipo</b></td>
            <td><b>Posicion</b></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
    <?php
           foreach($data['jugadores'] as $datos) {
    ?>
          <tr>
            <td><?=$datos->getCODJUG()?></td>
            <td><?=$datos->getNOMBRE()?></td>
            <td><?=$datos->getPRECIO()?></td>
            <td><?=$datos->getIMAGEN()?></td>
            <td><?=$datos->getCODPUNT()?></td>
    <?php
            foreach($data['equipos'] as $equipos) {
              if($equipos->getCODEQUIPO() == $datos->getCODEQUIPO()){
    ?>
              <td><?=$equipos->getNOMBRE()?></td>
    <?php
              }
            }
    ?>
    <?php
            foreach($data['posiciones'] as $pos) {
              if($pos->getCODPOS() == $datos->getCODPOS()){
    ?>
              <td><?=$pos->getPOSICION()?></td>
    <?php
              }
            }
    ?>
            <td>
            <!--boton modificar-->
              <button id="botonModificar" class="btn btn-info" data-tabla="jugadores" data-codigo="<?=$datos->getCODJUG()?>" data-pru="<?=$datos->getNOMBRE()?>"
                      data-precio="<?=$datos->getPRECIO()?>" data-img="<?=$datos->getIMAGEN()?>" data-puntos="<?=$datos->getCODPUNT()?>" 
                      data-equipo="<?=$datos->getCODEQUIPO()?>" data-posicion="<?=$datos->getCODPOS()?>">
                <span class="glyphicon glyphicon-pencil"></span>
                <a id="FuenteBotonBorrar">Modificar</a>
              </button>
            </td>
            <td>
              <!--boton eliminar-->
              <button id="botonEliminar" data-tabla="jugadores" data-codigo="<?=$datos->getCODJUG()?>" data-campo="CODJUG" class="btn btn-danger" >
                <span class="glyphicon glyphicon-trash"></span>
                <a id="FuenteBotonBorrar">Eliminar</a>
              </button>
            </td>
          </tr>
    <?php
            }
    ?>
          </tr>
        </table>
      </div>
     