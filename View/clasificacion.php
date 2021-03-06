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

        <div class="tituloLogin" class="col-xs-12 col-sm-8 col-md-12" style="margin-top: 4%;">
          <img src="../../View/Multimedia/imagen/logoClasificacion.png" name="MidField Player" alt="MidField Player" width="480">
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
            <li><a href="../menu/menu.php"><i class="fa fa-home" style="font-size: 18px;" aria-hidden="true"></i>&nbsp; Home</a></li>
            <li><a href="../plantilla/plantilla.php" id="seleccionado"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Plantilla</a></li>
            <li><a href="../traspasos/traspasos.php"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Traspasos</a></li>
            <li><a href="./clasificacion.php"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Liga</a></li>
            <li><a href="../ajustes/ajustes.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Ajustes</a></li>
            <li><a href="../../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Salir</a></li>
          </ul>
        </nav>

        <!--Boton de cierre de menu-->
        <div id="cierreMenu">
          <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
        </div>
                
        <div class="contenedorLiga">
      <?php
        if($liga == "nulo"){
      ?>
          <div class="botonLiga UnirteLiga">
            <img src="../../View/Multimedia/imagen/unirteLiga.png" name="MidField Player" alt="MidField Player" width="150" >
          </div>
          <div class="botonLiga crearLiga">
            <img src="../../View/Multimedia/imagen/crearLiga.png" name="MidField Player" alt="MidField Player" width="180" style="margin-top: 22px;" >
          </div>
          
      <?php
        } else{
          
      ?>
          <div id="contenedorClasificacion" class="table-responsive">
            <table id="clasificacion" class="table table-striped">
              <tr>
                <th></th>
                <th>Usuario</th>
                <th>Equipo</th>
                <th>Monedas</th>
                <th>Puntos</th>
              </tr>
        <?php
//        variable para el array puntos
            $puntosFinal=-1;
            while ($tabla = $informacionTabla->fetchObject()) {
              $puntosFinal++;
        ?>
              <tr>
              <?php
                    if($tabla->ESCUDO === NULL || $tabla->ESCUDO === "" ){
              ?>
                    <td><div class="contenedorEscudo"><img class="escudoNull" src="../../View/Multimedia/imagen/fotoEscudos/escudoNull.png"></div></td>
              <?php
                    }else{
              ?>
                    <td><div class="contenedorEscudo"><img class="escudo" src="../../View/Multimedia/imagen/fotoEscudos/<?=$tabla->ESCUDO?>"></div></td>
              <?php
                    }
              ?>
                <td><?=$tabla->NOMBREUSU?></td>
                <td><?=$tabla->NOMEQUIPO?></td>
                <td><?=$tabla->MONEDAS?></td>
                <td><?=$arrayPuntos[$puntosFinal];?>
                </td>
              </tr>
        <?php
            }
        ?>
            </table>
          </div>
      <?php  
        }
      ?>
       </div>
        
        <div id="mensaje">
          
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
