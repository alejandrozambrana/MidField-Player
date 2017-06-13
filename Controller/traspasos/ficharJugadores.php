<?php  
  require_once '../../Model/ConexionBD.php';
  require_once '../../Model/Plantilla.php';
  
  $conexion = ConexionBD::connectDB();
  //Saca cuantos jugadores hay en el banquillo a null
  $JugadorNull = 'SELECT * FROM plantilla WHERE CODUSU = '.$_POST['codusu'].' and CODJUG= 16 order by posicionCampo asc';

  $consultaNull = $conexion->query($JugadorNull);
  //cuentas cuantos jugadores nullos hay en el banquillo
  $numNull = $consultaNull->rowCount();
  
  
  //obtiene lo que vale el jugador vendido
  $seleccion2 = 'SELECT j.PRECIO FROM jugadores j, usuarios u  WHERE CODUSU = '.$_POST['codusu'].' and CODJUG = "'.$_POST['codjug'].'"' ;

  $precio = $conexion->query($seleccion2);

  while ($monedas = $precio->fetchObject()) {
    $precioJugador = $monedas->PRECIO;
  }

  //obtiene el dinero del usuario
  require_once '../../Model/Usuarios.php';

  // Obtiene las monedas
  $data['usuarios'] = Usuarios::getUsuarios();

  foreach ($data['usuarios'] as $usuario) {

    if($usuario->getCODUSU() == $_POST['codusu']){
      $dineroUsuario = $usuario->getMONEDAS();
    }
  }
  
  //obtiene el dinero del usuario
  require_once '../../Model/Usuarios.php';

  // Obtiene las monedas
  $data['usuarios'] = Usuarios::getUsuarios();

  foreach ($data['usuarios'] as $usuario) {

    if($usuario->getCODUSU() == $_POST['codusu']){
      $dineroUsuario = $usuario->getMONEDAS();
    }
  }
  
  //si la cantidad de jugadores nulos es mayor de 0 borra uno.
  if($numNull >= 1 && $dineroUsuario > $precioJugador){
    $i =-1;
    //mete en un array la posicion del jugador nulo para poder borrar uno y no borrar todos los jugadores nulos
    while ($null = $consultaNull->fetchObject()) {
      $i++;
      $arrayNull[$i] = $null->posicionCampo;
    }
    //borra el primer jugador nulo sin borrar los demas
    $borraJugadorNull = 'DELETE FROM plantilla WHERE CODUSU = '.$_POST['codusu'].' and CODJUG = 16 and posicionCampo = '.$arrayNull[0] .'';
    $borraNull = $conexion->query($borraJugadorNull);
    
    //añade el jugador fichado
    $fichado = new Plantilla($_POST['codusu'], $_POST['codjug'], "no", $arrayNull[0]);
    $fichado->insert();

    $dineroTotal = $dineroUsuario - $precioJugador;

    $seleccion3 = 'UPDATE usuarios SET MONEDAS= '.$dineroTotal.' WHERE CODUSU = "'.$_POST['codusu'].'"' ;

    $sumaDinero = $conexion->query($seleccion3);
  
  }else if ($numNull == 0 && $dineroUsuario < $precioJugador){
   
    
    
  }