<?php
require_once '../../Model/ConexionBD.php';
require_once '../../Model/Usuarios.php';
require_once '../../Model/Plantilla.php';

  //comprueba la contraseña
  if(strlen($_POST['contrasena']) < 6){
    $error_clave = "La clave debe tener al menos 6 caracteres";
  }else if(strlen($_POST['contrasena']) > 16){
    $error_clave = "La clave no puede tener más de 16 caracteres";
  }else if (!preg_match('`[a-z]`',$_POST['contrasena'])){
    $error_clave = "La clave debe tener al menos una letra minúscula";
  }else if (!preg_match('`[A-Z]`',$_POST['contrasena'])){
    $error_clave = "La clave debe tener al menos una letra mayúscula";
  }else if (!preg_match('`[0-9]`',$_POST['contrasena'])){
    $error_clave = "La clave debe tener al menos un caracter numérico";
  }else{
    $error_clave = "";
  }
  
// sube la imagen al servidor y cambiar el nombre a la foto subida
  if ($_FILES["escudoId"]["name"] != "" && $error_clave == ""){
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
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
      $mensaje = "Error, el archivo no es una imagen"; 
    }else if ($size > 1024*1024){
      $mensaje = "Error, el tamaño máximo permitido es un 1MB";
    }else if ($width > 1300 || $height > 1000){
        $mensaje = "Error la anchura y la altura maxima permitida es 1000px";
    }else if($width < 60 || $height < 60) {
      $mensaje = "Error la anchura y la altura mínima permitida es 60px";
    } else {
      $mensaje = "";
      $src = $carpeta.$rutaArchivo;
      move_uploaded_file($ruta_provisional, $src);
      
      // inserta la oferta en la base de datos
      $conexion = ConexionBD::connectDB();
      $insertarUsuario = "INSERT INTO `usuarios`(`NOMBREUSU`, `EMAIL`, `CONTRASEÑA`, `NOMBRE`, `APELLIDOS`, `NOMEQUIPO`, `ESCUDO`) VALUES ('".$_POST['nomUsuario']."','". $_POST['email']."','". $_POST['contrasena']."','". $_POST['nombre']."','". $_POST['apellidos']."','". $_POST['nomEqui']."','". $rutaArchivo."')";
      $conexion->query($insertarUsuario); 
    }

  } else if($_FILES["escudoId"]["name"] == "" && $error_clave == "") {
      // inserta la oferta en la base de datos
      $conexion = ConexionBD::connectDB();
      $insertarUsuario = "INSERT INTO `usuarios`(`NOMBREUSU`, `EMAIL`, `CONTRASEÑA`, `NOMBRE`, `APELLIDOS`, `NOMEQUIPO`, `ESCUDO`) VALUES ('".$_POST['nomUsuario']."','". $_POST['email']."','". $_POST['contrasena']."','". $_POST['nombre']."','". $_POST['apellidos']."','". $_POST['nomEqui']."','". $_FILES["escudoId"]["name"]."')";
      $conexion->query($insertarUsuario); 
  }
  
  //saca codigo de jugador que hemos registrado para asignarle los jugadores
  $conexion = ConexionBD::connectDB();
  $seleccion = 'SELECT CODUSU
                FROM usuarios 
                where NOMBREUSU = "'.$_POST['nomUsuario'].'" and email = "'.$_POST['email'].'"';

  $codusu = $conexion->query($seleccion);

  //mete en una variable el resultado de la consulta anterior
  while ($usu = $codusu->fetchObject()) {
    $codusuario = $usu->CODUSU;
  }
  
  //cuenta cuantos jugadores ahi.
  $seleccion2 = 'select * from jugadores';
  $numfilas = $conexion->query($seleccion2);
  $numJug = $numfilas->rowCount();
  
  //Saca numero aleatorio sin repetir ninguno
  $contador = 0;
  do{
    $aleatorio = rand(1, $numJug); //saca numero aleatorio
    $jugadoresAleatorio[$contador] = $aleatorio; //mete numero aleatorio en el array
    $contador = count(array_unique($jugadoresAleatorio)); //cuenta cuantos numeros hay en el array que no se repiten
    $jugadoresAleatorio = array_unique($jugadoresAleatorio); //quita del array los numeros repetidos
    if($aleatorio == 16){
      unset($jugadoresAleatorio[$contador]);
      $contador--;
    }
  }while($contador < 12);

  //asigna los jugadores aleatorios de campo
  $recorreArray = -1;
  for($i = 0; $i < 12; $i++){
    $campo = new Plantilla($codusuario, $jugadoresAleatorio[$recorreArray++], "si", $i);
    $campo->insert();
  }
  
  
  //asigna banquillo vacio
  for($i = 12; $i < 23; $i++){
    $banquilloVacio = new Plantilla($codusuario, 16, "no", $i);
    $banquilloVacio->insert();
  }
  
  header("Location: ./index.php?error_clave=$error_clave&mensaje=$mensaje");