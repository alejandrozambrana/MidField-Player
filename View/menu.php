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
      <div class="fondo sinScroll" name="<?=$_SESSION['idUsuario']?>">

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
            <li><a href="./menu.php"><i class="fa fa-home" style="font-size: 18px;" aria-hidden="true"></i>&nbsp; Home</a></li>
            <li><a href="../Plantilla/plantilla.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Plantilla</a></li>
            <li><a href="../traspasos/traspasos.php"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Traspasos</a></li>
            <li><a href="../clasificacion/clasificacion.php"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Liga</a></li>
            <li><a href="../ajustes/ajustes.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Ajustes</a></li>
            <li><a href="../../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Salir</a></li>
          </ul>
        </nav>

        <!--Boton de cierre de menu-->
        <div id="cierreMenu">
          <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
        </div>
        <div id="campoResposive"></div>
        <div id="contenedorCampo">
          <div id="parteAltaCampo"></div>
          <div id="parteBajaCampo"></div>
        </div>
        <div id="contenedorJugadores">
          <?php
          include './jugadoresCampoController.php';
          ?>
        </div>
        <button id="btnMostrarJugadores">
          <i class="fa fa-chevron-up fa-2x" aria-hidden="true"></i>
        </button>
        <div id="mostrarJugadores">
          <div class="contenedorBanquillo">
    <?php
          include './banquilloController.php';
    ?>
          </div>
        </div>
        
        <!--advertencia liga-->
        <div class="advertenciaSinLiga">
          <a href="../clasificacion/clasificacion.php">
            <i class="fa fa-exclamation-triangle fa-4x iconoAdvertencia" aria-hidden="true" style="color:#333333"></i>
            <div class="textoAdvertencia">
              No estas en ninguna liga. </br>
              Ve a el apartado liga y unete a una.
            </div>
          </a>
          <div id="cerrarAdvertencia" data-liga="<?=$liga?>">
            <span  class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </div>
        </div> 
        
        <!--Banner del balon botando-->
        <div class="contenedorBanner">
          <img src="../../View/Multimedia/imagen/bannerBall.png" id="balonBanner">
        </div>
        
      </div>
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
