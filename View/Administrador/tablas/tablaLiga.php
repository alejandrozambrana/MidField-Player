<!--crea una tabla con los datos-->
      <div id="divTabla" class="table-responsive">
        <table class="table table-striped" id="tablaAdministrador">
          <tr>
            <td><b>Codigo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Participantes</b></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
    <?php
            foreach($data['liga'] as $datos) {
    ?>
          <tr>
            <td><?=$datos->getCODLIGA()?></td>
            <td><?=$datos->getNOMBRE()?></td>
            <td><?=$datos->getPARTICIPANTES()?></td>
            <td>
              <!--boton modificar-->
              <button id="botonModificar" class="btn btn-info" data-tabla="liga" data-codigo="<?=$datos->getCODLIGA()?>" data-pru="<?=$datos->getNOMBRE()?>"
                      data-parti="<?=$datos->getPARTICIPANTES()?>">
                <span class="glyphicon glyphicon-pencil"></span>
                <a id="FuenteBotonBorrar">Modificar</a>
              </button>
            </td>
            <td>
              <!--boton eliminar-->
              <button id="botonEliminar" data-tabla="liga" data-codigo="<?=$datos->getCODLIGA()?>" data-campo="CODLIGA" class="btn btn-danger" >
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