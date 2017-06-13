<?php
  require_once '../../Model/ConexionBD.php';
  require_once '../../Model/Plantilla.php';

  $conexion = ConexionBD::connectDB();
  //Saca la posicion en la que estaba el jugador vendido
  $posicion = 'SELECT * FROM plantilla WHERE CODUSU = '.$_POST['codusu'].' and CODJUG = '.$_POST['codjug'];
  $posicionJugVendido = $conexion->query($posicion);
  
  //guarda en una variable la poscion
  while ($pos = $posicionJugVendido->fetchObject()) {
    $posicionCampoJug = $pos->posicionCampo;
  }
  
  if($posicionCampoJug > 11){
    //elimina el jugador vendido de la plantilla
    $seleccion = 'DELETE FROM plantilla WHERE CODUSU = '.$_POST['codusu'].' and CODJUG = "'.$_POST['codjug'].'"' ;

    $vender = $conexion->query($seleccion);
    
    //mete un jugador a null
    $JugadorNull = new Plantilla($_POST['codusu'], 16, "no", $posicionCampoJug);
    $JugadorNull->insert();
    
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

    $dineroTotal = $precioJugador + $dineroUsuario;

    $seleccion3 = 'UPDATE usuarios SET MONEDAS= '.$dineroTotal.' WHERE CODUSU = "'.$_POST['codusu'].'"' ;

    $sumaDinero = $conexion->query($seleccion3);
  } 
  
  
  
    
  