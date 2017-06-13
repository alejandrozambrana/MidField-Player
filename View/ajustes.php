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
          <img src="../../View/Multimedia/imagen/logoAjustes.png" name="MidField Player" alt="MidField Player" width="480">
        </div>

        <!--Menu-->
        <nav id="menu">
          <ul>
            <?php
            while ($datos = $usuarioDatos->fetchObject()) {
              //mete en una variable los datos necesarios para los ajustes
              $nombreUsu = $datos->NOMBRE;
              $apellidosUsu = $datos->APELLIDOS;
              $nombreEquipo = $datos->NOMEQUIPO;
              $nombreDeUsuario = $datos->NOMBREUSU;
              $emailUsu = $datos->EMAIL;
              $contraseña = $datos->CONTRASEÑA;
             $codUsu = $datos->CODUSU;
              
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
            <li><a href="../plantilla/plantilla.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Plantilla</a></li>
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
                
        <div id="contenedorAjustes" >
          <form action="./modificarAjustes.php" method="post" id="formularioAjustes" enctype="multipart/form-data">
            <table id="tablaAjustes" class="table">
            <tr>
              <td>
                <span class="glyphicon glyphicon-user"></span>
                <label for="nombreId"> Nombre: </label>
                <input type="text" name="nombreUs" class="form-control" id="nombreId" autofocus required="required" value="<?=$nombreUsu?>"></br>
              </td>
              <td>
                <span class="glyphicon glyphicon-user"></span>
                <label for="apellidosId"> Apellido: </label>
                <input type="text" name="apellidos" class="form-control" id="apellidosId" required="required" value="<?=$apellidosUsu?>"></br>
              </td>
            </tr>
            <tr>
              <td>
                <span class="glyphicon glyphicon-flag"></span>
                <label for="nomEquiId"> Nombre Equipo:</label>
                <input type="text" name="nomEqui" class="form-control" id="nomEquiId" required="required" value="<?=$nombreEquipo?>"></br>
              </td>
              <td>
                <span class="glyphicon glyphicon-user"></span>
                <label for="nnombreUsu"> Nombre de Usuario:</label>
                <input type="text" name="nomUsuario" class="form-control form-mitad" id="nombreUsu" required="required" value="<?=$nombreDeUsuario?>"></br>
              </td>
            </tr>
            <tr>
              <td>
                <span class="glyphicon glyphicon-envelope"></span>
                <label for="email"> Email:</label>
                <input type="email" name="email" class="form-control" id="email" required="required" value="<?=$emailUsu?>"></br>
              </td>
              <td>
                <span class="glyphicon glyphicon-lock"></span>
                <label for="contrasena"> Contraseña:</label>
                <input type="password" name="contrasena" class="form-control center-block" id="contrasena" required="required" value="<?=$contraseña?>" ></br>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <span class="glyphicon glyphicon-picture"></span>
                <label for="escudoId"> Cambiar imagen:</label>
                <input type="file" name="escudoId" class="form-control" id="escudoId"></br>
                <div id="respuesta"><?=$_GET["mensaje"]?></div>
              </td>
            </tr>
            <tr>
            <input type="hidden" name="codUsu" value="<?=$codUsu?>">
              <td colspan="2"><button class="btn btn-default" id="botonModificarAjustes"><i class="fa fa-paper-plane" aria-hidden="true"></i> Modificar</button></td>
            </tr>
            <tr>
              <td colspan="2"><div id="botonBorrarCuenta"><i class="fa fa-frown-o" aria-hidden="true"></i> Borrar Cuenta</div></td>
            </tr>
            
            </table>
          </form>
     
        </div>
        
        <div id="dialogoBorrarCuenta" title="¿Desea borrar la cuenta?">
          <p>¿Estas seguro que quieres borrar la cuenta?</p>
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
