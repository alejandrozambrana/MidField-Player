 <!--crea una tabla con los datos-->
      <div id="divTabla" class="table-responsive">
        <table class="table table-striped" id="tablaAdministrador">
          <tr>
            <td><b>Codigo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Imagen Equipo</b></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
    <?php
            foreach($data['equipos'] as $datos) {
    ?>
          <tr>
            <td><?=$datos->getCODEQUIPO()?></td>
            <td><?=$datos->getNOMBRE()?></td>
            <td><?=$datos->getIMGEQUIPO()?></td>
            <td>
              <!--boton modificar-->
              <button id="botonModificar" class="btn btn-info" data-tabla="equipo" data-codigo="<?=$datos->getCODEQUIPO()?>" data-pru="<?=$datos->getNOMBRE()?>"
                      data-img="<?=$datos->getIMGEQUIPO()?>">
                <span class="glyphicon glyphicon-pencil"></span>
                <a id="FuenteBotonBorrar">Modificar</a>
              </button>
            </td>
            <td>
              <!--boton eliminar-->
              <button id="botonEliminar" data-tabla="equipo" data-codigo="<?=$datos->getCODEQUIPO()?>" data-campo="CODEQUIPO" class="btn btn-danger" >
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