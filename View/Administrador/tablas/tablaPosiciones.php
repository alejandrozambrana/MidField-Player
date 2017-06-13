<!--crea una tabla con los datos-->
      <div id="divTabla" class="table-responsive">
        <table class="table table-striped" id="tablaAdministrador">
          <tr>
            <td><b>Codigo</b></td>
            <td><b>Posicion</b></td>
            <td><b>Abreviatura</b></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
    <?php
            foreach($data['posiciones'] as $datos) {
    ?>
          <tr>
            <td><?=$datos->getCODPOS()?></td>
            <td><?=$datos->getPOSICION()?></td>
            <td><?=$datos->getABREVIATURA()?></td>
            <td>
              <!--boton modificar-->
              <button id="botonModificar" class="btn btn-info" data-tabla="posiciones" data-codigo="<?=$datos->getCODPOS()?>" data-pru="<?=$datos->getPOSICION()?>"
                      data-abrevi="<?=$datos->getABREVIATURA()?>">
                <span class="glyphicon glyphicon-pencil"></span>
                <a id="FuenteBotonBorrar">Modificar</a>
              </button>
            </td>
            <td>
              <!--boton eliminar-->
              <button id="botonEliminar" data-tabla="posiciones" data-codigo="<?=$datos->getCODPOS()?>" data-campo="CODPOS" class="btn btn-danger" >
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