<?php
  require_once '../../Model/ConexionBD.php';
  require_once '../../Model/Usuarios.php';
  
//modifica los ajustes
  $nombre = $_POST["nombreUs"];
  $apellidos = $_POST["apellidos"];
  $nombreEqui = $_POST["nomEqui"];
  $nombreUsu = $_POST["nomUsuario"];
  $email = $_POST["email"];
  $contraseña = $_POST["contrasena"];
  $codusu = $_POST["codUsu"];
  
  $conexion = ConexionBD::connectDB();

  $modificar = "UPDATE usuarios SET NOMBREUSU = '".$nombreUsu."', EMAIL= '".$email."', CONTRASEÑA = '".$contraseña."', NOMBRE = '".$nombre."', APELLIDOS = '".$apellidos."', NOMEQUIPO = '".$nombreEqui."' WHERE CODUSU = ".$codusu;
  $modificacion = $conexion->query($modificar);
  
  //si cambia la foto aqui hace la operacion de cambiar la foto y cambiar el nombre a la foto subida
  if (isset($_FILES["escudoId"])){
    $nombre = $_FILES["escudoId"]["name"];
//    saca la extencion de la imagen
    $imagen = substr(strrchr($_FILES["escudoId"]["name"], "."), 1);
//    genera un nombre aleatorio
    $rutaArchivo = rand() . time() . ".$imagen";    
    $tipo = $_FILES["escudoId"]["type"];
    $ruta_provisional = $_FILES["escudoId"]["tmp_name"];
    $size = $_FILES["escudoId"]["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../View/Multimedia/imagen/fotoEscudos/";
    
    if($tipo == ""){
      $mensaje = "";
    }else if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      $mensaje = "Error, el archivo no es una imagen"; 
    }
    else if ($size > 1024*1024)
    {
      $mensaje = "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 1300 || $height > 1000)
    {
        $mensaje = "Error la anchura y la altura maxima permitida es 1300px";
    }
    else if($width < 60 || $height < 60)
    {
        $mensaje = "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {
      $mensaje = "";
      $src = $carpeta.$rutaArchivo;
      move_uploaded_file($ruta_provisional, $src);

      $modificarFoto = "UPDATE usuarios SET ESCUDO = '".$rutaArchivo."' WHERE CODUSU = ".$codusu;
      $modificacion = $conexion->query($modificarFoto);
    }
  }
  header("Location: ./ajustes.php?mensaje=$mensaje");