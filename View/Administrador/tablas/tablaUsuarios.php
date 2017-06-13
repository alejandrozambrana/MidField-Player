      <!--crea una tabla con los datos-->
        <div id="divTabla" class="table-responsive">
          <table class="table table-striped" id="tablaAdministrador">
            <tr>
              <td><b>Codigo</b></td>
              <td><b>Nombre Usuario</b></td>
              <td><b>Email</b></td>
              <td><b>Contraseña</b></td>
              <td><b>Nombre</b></td>
              <td><b>Apellidos</b></td>
              <td><b>Monedas</b></td>
              <td><b>Tipo Usuario</b></td>
              <td><b>Nombre Equipo</b></td>
              <td><b>Escudo</b></td>
              <td><b>Codigo Liga</b></td>
              <td></td>
              <td></td>
            </tr>
      <?php
          while ($datostabla = $datosUsuarios->fetchObject()) {
      ?>
            <tr>
              <td><?=$datostabla->CODUSU?></td>
              <td><?=$datostabla->NOMBREUSU?></td>
              <td><?=$datostabla->EMAIL?></td>
              <td><?=$datostabla->CONTRASEÑA?></td>
              <td><?=$datostabla->USUNOM?></td>
              <td><?=$datostabla->APELLIDOS?></td>
              <td><?=$datostabla->MONEDAS?></td>
              <td><?=$datostabla->TIPOUSU?></td>
              <td><?=$datostabla->NOMEQUIPO?></td>
      <?php
              if($datostabla->ESCUDO == ""){
      ?>
                <td>NULL</td>
      <?php
              } else {
      ?>
                <td><?=$datostabla->ESCUDO?></td>
      <?php
              }
              if($datostabla->NOMBRE == ""){
      ?>
                <td>NULL</td>
      <?php
              } else {
      ?>
                <td><?=$datostabla->NOMBRE?></td>
      <?php
              }
      ?>
              <td>
                <!--boton modificar-->
                <button id="botonModificar" class="btn btn-info" data-tabla="usuarios" data-codigo="<?=$datostabla->CODUSU?>" data-pru="<?=$datostabla->NOMBREUSU?>"
                        data-email="<?=$datostabla->EMAIL?>" data-contraseña="<?=$datostabla->CONTRASEÑA?>" data-nombre="<?=$datostabla->USUNOM?>" 
                        data-apellidos="<?=$datostabla->APELLIDOS?>" data-monedas="<?=$datostabla->MONEDAS?>" data-tip="<?=$datostabla->TIPOUSU?>"
                        data-equi="<?=$datostabla->NOMEQUIPO?>" data-liga="<?=$datostabla->CODLIGA?>">
                  <span class="glyphicon glyphicon-pencil"></span>
                  <a id="FuenteBotonBorrar">Modificar</a>
                </button>
              </td>
              <td>
                <!--boton eliminar-->
                <button id="botonEliminar" data-tabla="usuarios" data-codigo="<?=$datostabla->CODUSU?>" data-campo="CODUSU" class="btn btn-danger" >
                  <span class="glyphicon glyphicon-trash"></span>
                  <a id="FuenteBotonBorrar">Eliminar</a>
                </button>
              </td>
    
            </tr>
      <?php
          }
      ?>
          </table>
        </div>
     