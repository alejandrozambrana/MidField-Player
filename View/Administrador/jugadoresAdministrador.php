<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>MilField Player</title>
    <link rel="shortcut icon" type="image/png" href="../../View/Multimedia/imagen/logo.png"/>
    <!--bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../View/js/jquery.min.js"></script>
    <script src="../../View/js/funciones.js"></script>
    <script src="../../View/js/jquery-ui.js"></script>
    <!--validate-->
    <script src="../../View/js/jquery.validate.js"></script>
    <!--Estos dos enlaces son para el cuadro de dialogo-->
    <link rel="stylesheet" href="../../View/css/jquery-ui.css">
    <!-- CSS de Bootstrap -->
    <link href="../../View/bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css propio-->
    <link href="../../View/css/estilos.css" REL="stylesheet" TYPE="text/css" >
    <!--letra-->
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <!--Iconos de font awesome-->
    <script src="https://use.fontawesome.com/d84eaf8c71.js"></script>
  </head>
  <body>
    <?php
    if($_SESSION['logueado'] == "true"){
      
    ?>
      <div class="fondo" name="<?=$_SESSION['idUsuario']?>">

        <div class="tituloLogin" class="col-xs-12 col-sm-8 col-md-12">
          <img src="../../View/Multimedia/imagen/logoNombre.png" name="MidField Player" alt="MidField Player" width="480" >
        </div>

        <!--Menu-->
        <nav id="menu">
          <ul>
            <?php
            while ($datos = $usuarioDatos->fetchObject()) {
              if($datos->CODLIGA === NULL){
                $liga = "nulo";
              }
            ?>
              <div class="informacionUsuario">
                <div class="contenedorEscudo">
            <?php
                  if($datos->ESCUDO === NULL || $datos->ESCUDO === "" ){
            ?>
                  <img class="escudoNull" src="../../View/Multimedia/imagen/fotoEscudos/escudoNull.png"> 
            <?php
                  }else{
            ?>
                  <img class="escudo" src="../../View/Multimedia/imagen/fotoEscudos/<?=$datos->ESCUDO?>"> 
            <?php
                  }
            ?>
                </div>
                <div class="datos">
                  <p class="nombreEquipo"><i class="fa fa-futbol-o" aria-hidden="true"></i> <b><?=$datos->NOMEQUIPO?></b></p>
                  <p style="margin: 0px;"><i class="fa fa-user" aria-hidden="true"></i> <?=$datos->NOMBREUSU?></p>
                  <p><?=$datos->MONEDAS?> <i class="fa fa-money" aria-hidden="true"></i></p>
                </div>
              </div>
            <?php
            }
            ?>
            <li><a href="./menuAdministrador.php"><i class="fa fa-home" style="font-size: 18px;" aria-hidden="true"></i>&nbsp; Home</a></li>
            <li><a href="./jugadoresAdministrador.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Jugadores</a></li>
            <li><a href="./equipoAdministrador.php"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Equipos</a></li>
            <li><a href="./ligaAdministrador.php"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Liga</a></li>
            <li><a href="./posicionesAdministrador.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Posiciones</a></li>
            <li><a href="../../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Salir</a></li>
          </ul>
        </nav>

        <!--Boton de cierre de menu-->
        <div id="cierreMenu">
          <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
        </div>
        
        <div id="tablaJugadores">
          <?php
              include './jugadoresAdminTabla.php';
          ?>
        </div>
      </div>
      <!--dialogo eliminar fila-->
      <div id="borraFila" title="¿Desea borrar esta fila?">
        <p>¿Estas seguro que quieres borrar esta fila?</p>
      </div>
     
      <!--Cuadro de dialogo Modificar-->
        <div id="cuadroModificar" title="Modificar Usuarios" >
          <label for="campo1">Nombre Jugador</label>
          <input type="text" class="form-control" id="campo1" autofocus="autofocus" required="required">
          <label for="campo2">Precio</label>
          <input type="number" class="form-control" id="campo2" required="required">
          <label for="campo3">URL IMG</label>
          <input type="text" class="form-control" id="campo3" required="required">
          <label for="campo4">Puntos</label>
          <select class="form-control" id="campo4">
            <option value="NULL" selected>---Seleciona---</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          <label for="campo5">Equipos</label>
          <select class="form-control" id="campo5">
            <option value="NULL" selected="selected">---Selecciona---</option>
      <?php
            foreach($data['equipos'] as $equipos) {
      ?>
                <option value="<?=$equipos->getCODEQUIPO()?>"><?=$equipos->getNOMBRE()?></option>
      <?php 
            }
      ?>
          </select>
          <label for="campo6">Posicion</label>
          <select class="form-control" id="campo6">
            <option value="NULL" selected="selected">---Selecciona---</option>
      <?php
            foreach($data['posiciones'] as $posiciones) {
      ?>
                <option value="<?=$posiciones->getCODPOS()?>"><?=$posiciones->getPOSICION()?></option>
      <?php 
            }
      ?>
          </select>
        </div>
      
      <!--boton añadir-->
      <button id="añadir" data-tabla="jugadores" class="btn btn-default botonAnadir">
        <span class="glyphicon glyphicon-plus"></span>
      </button>
      
      <!--Cuadro de dialogo añadir-->
      <div id="cuadroAñadir" title="Añadir Usuario" >
        <label for="campo1">Nombre Jugador</label>
          <input type="text" class="form-control" id="campo1" autofocus="autofocus" required="required">
          <label for="campo2">Precio</label>
          <input type="number" class="form-control" id="campo2" required="required">
          <label for="campo3">URL IMG</label>
          <input type="text" class="form-control" id="campo3" required="required">
          <label for="campo4">Puntos</label>
          <select class="form-control" id="campo4">
            <option value="NULL" selected>---Seleciona---</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          <label for="campo5">Equipos</label>
          <select class="form-control" id="campo5">
            <option value="NULL" selected="selected">---Selecciona---</option>
      <?php
            foreach($data['equipos'] as $equipos) {
      ?>
                <option value="<?=$equipos->getCODEQUIPO()?>"><?=$equipos->getNOMBRE()?></option>
      <?php 
            }
      ?>
          </select>
          <label for="campo6">Posicion</label>
          <select class="form-control" id="campo6">
            <option value="NULL" selected="selected">---Selecciona---</option>
      <?php
            foreach($data['posiciones'] as $posiciones) {
      ?>
                <option value="<?=$posiciones->getCODPOS()?>"><?=$posiciones->getPOSICION()?></option>
      <?php 
            }
      ?>
          </select>
      </div>
      <!--------termina cuadro de dialogo---------->
    <?php
    }else{
    ?>
      <div class="divSinLoguear">
        <h1 class="sinLoguear">LOGUEATE</h1>
      </div>
      
    <?php
    }
    ?>
  </body>
</html>
