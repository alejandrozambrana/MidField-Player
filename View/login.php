<!DOCTYPE html>
<html>
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

    <!--capa trasparente-->
    <div id="capaBloquearBotones"></div>

    <div class="tituloLogin" class="col-xs-12 col-sm-8 col-md-12">
      <img src="../../View/Multimedia/imagen/logoNombre.png" name="MidField Player" alt="MidField Player"  >
    </div>

    <!--botones de acceso-->
    <div id="acceso">
      <button type="submit" id="botonRegistro"> Regístrate</button>
      <button type="submit" id="botonIdentificate" name="action">
        <i class="fa fa-user" aria-hidden="true" style="margin-right: 2px;"></i> Identificate
      </button>
    </div>

    <!--capa trasparente-->
    <div id="capaNegra"></div>

    <!--video de fondo-->
    <div id="contenedorVideo">
      <div id="sombra">
        <video autoplay="autoplay" loop="loop" id="video_background" preload="auto" muted="muted"/>
        <source src="../../View/Multimedia/video/index.mp4" type="video/mp4" />
        </video>
      </div>
    </div>

<!--<p>MilField Player es una aplicacion online que te permite crear tu propio equipo fichando jugadores y ganando puntos todas las semanas con tu once inicial</p>-->

    <!--cuadro de login-->
    <div id="login" hidden>
      <button type="button" class="btn btn-default btn-lg cerrar">
        <span  class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </button>
      <h1>Login</h1>
      <form action="../../Controller/login/index.php" id="loginformulario" method="POST">
        <span class="glyphicon glyphicon-user"></span>
        <label for="usuarioId">Usuario</label><br>
        <input type="text" name="usuario" class="form-control center-block" id="usuarioId" autofocus placeholder="Usuario" required="required" value="<?= $_SESSION['usuario'] ?>"></br>
        <span class="glyphicon glyphicon-lock"></span>
        <label for="contrasenaId">Contraseña</label><br>
        <input type="password" class="form-control center-block" name="contraseña" id="contrasenaId" placeholder="Contraseña" required="required"></br></br>
        <button type="submit" class="btn btn-default" name="action">Acceder
          <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
        </button>
      </form>
    </div>

    <!--cuadro de reguistro-->
    <div id="registro" hidden>
      <form action="./registroUsuario.php" method="post" id="formulario" enctype="multipart/form-data">
        <table id="tablaAjustes" class="table">
          <button type="button" class="btn btn-default btn-lg cerrar">
            <span  class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
          <h1>Registrate</h1>
          <tr>
            <td>
              <span class="glyphicon glyphicon-user"></span>
              <label for="nombreId">Nombre</label><br>
              <input type="text" name="nombre" class="form-control" id="nombreId" required="required" autofocus="autofocus"></br>
            </td>
            <td>
              <span class="glyphicon glyphicon-user"></span>
              <label for="apellidosId">Apellidos</label><br>
              <input type="text" name="apellidos" class="form-control" id="apellidosId" required="required"></br>
            </td>
          </tr>
          <tr>
            <td>
              <span class="glyphicon glyphicon-flag"></span>
              <label for="nomEquiId">Nombre del equipo</label><br>
              <input type="text" name="nomEqui" class="form-control" id="nomEquiId" required="required"></br>
            </td>
            <td>
              <span class="glyphicon glyphicon-user"></span>
              <label for="nombreUsu">Nombre de usuario</label><br>
              <input type="text" name="nomUsuario" class="form-control form-mitad" id="nombreUsu" required="required"></br>
            </td>
          </tr>
          <tr>
            <td>
              <span class="glyphicon glyphicon-envelope"></span>
              <label for="email">Email</label><br>
              <input type="email" name="email" class="form-control" id="email" required="required"></br>
            </td>
            <td>
              <span class="glyphicon glyphicon-lock"></span>
              <label for="contrasena">Contraseña</label><br>
              <input type="password" name="contrasena" class="form-control center-block" id="contrasena" required="required" ></br>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div id="respuesta">
                <?php
                if($mensajeContraseñaIncorrecta != ""){
                  echo $mensajeContraseñaIncorrecta;
                }else{
                  echo "La contraseña debería tener al menos 8 caracteres, 1 dígito, 1 minúscula, 1 mayúscula, 1 caracter no alfanuméricos";
                }
                
                ?>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <span class="glyphicon glyphicon-picture"></span>
              <label for="escudoId">Escudo</label><br>
              <input type="file" name="escudoId" class="form-control" id="escudoId"></br>
              <div id="respuesta">
                <?php
                if($mensaje != ""){
                  echo $mensaje;
                }else{
                  echo "";
                }
                ?>
              </div>
            </td>
          </tr>  
          <tr>
            <td colspan="2">
              <input type="hidden" name="accion" value="crearUsuario" >
              <button type="submit" class="btn btn-default crearUsuario" name="action">Crear 
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </td>
          </tr> 
        </table>
      </form>
    </div>
    
    <div class="flex-container flex-row">
      <div class="flex-item">
        <a href="../../Documentacion/Ingles/Libre Configuracion.pdf" title="Funcionalidad">
          <i class="fa fa-question-circle fa-5x botonesFooter" aria-hidden="true"></i>
        </a>
      </div>
      <div class="flex-item">
        <a href="#" id="contacto" title="Contacto">
          <i class="fa fa-home fa-5x botonesFooter" aria-hidden="true"></i>
        </a>
      </div>
      <div class="flex-item" style="padding-top: 30px;">
        <a href="https://www.facebook.com" title="Facebook"><i class="fa fa-facebook fa-4x botonesFooter botonesFooterFacebook" aria-hidden="true" style="margin-right: 30px;"></i></a>
        <a href="https://www.twitter.com" title="Twitter"><i class="fa fa-twitter fa-4x botonesFooter botonesFooterTwitter" aria-hidden="true"></i></a>
      </div>
    </div>
    <div class="informacion" hidden>
      <button type="button" class="btn btn-default btn-lg cerrar">
        <span  class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </button>
      <p><b>Autor:</b> Alejandro Zambrana Naranjo</p>
      <a href="../../Documentacion/Curriculum.pdf" id="enlaceCV" title="Contacto">
        <img src="../../View/Multimedia/imagen/cv.png" title="Curriculun Vitae">
        <h2>Descarga</h2>
      </a>
      
    </div>
  </body>
</html>
