<?php  
 include '../creaSession.php';
  require_once '../../Model/ConexionBD.php';
  require_once '../../Model/Plantilla.php';
  
  $conexion = ConexionBD::connectDB();
  $todosJugadores = 'SELECT j.*, e.IMGEQUIPO, p.ABREVIATURA
                from jugadores j left join equipo e on j.CODEQUIPO = e.CODEQUIPO LEFT JOIN posiciones p ON p.CODPOS = j.CODPOS
                where j.CODJUG != 16 and e.IMGEQUIPO != "NULL" and j.codjug not in (select codjug from plantilla where CODUSU= '.$_SESSION['idUsuario'].')';
 
  //consulta Busqueda avanzada
  if (!empty($_GET["busqueda"])) {
    $todosJugadores .= " and UPPER(j.NOMBRE) LIKE UPPER('%".$_GET["busqueda"]."%') ";
  }
  
   //consulta Busqueda por posicion
  if (!empty($_GET["busquedaPos"])) {
    $todosJugadores .= " and j.CODPOS = ".$_GET["busquedaPos"];
  }
  
  //consulta Busqueda por equipos
  if (!empty($_GET["busquedaEqui"])) {
    $todosJugadores .= " and j.CODEQUIPO = ".$_GET["busquedaEqui"];
  }
  
  //consulta Busqueda por dinero minimo
  if (!empty($_GET["busquedaDineroMin"])) {
    $todosJugadores .= " and j.PRECIO >= ".$_GET["busquedaDineroMin"];
  }
  
  //consulta Busqueda por dinero maximo
  if (!empty($_GET["busquedaDineroMax"])) {
    $todosJugadores .= " and j.PRECIO <= ".$_GET["busquedaDineroMax"];
  }
  
//  //consulta Busqueda por dinero minimo
//  if (!empty($_GET["busquedaDineroMin"]) && !empty($_GET["busquedaDineroMax"])) {
//    $todosJugadores .= " and j.PRECIO >= ".$_GET["busquedaDineroMin"]."and j.PRECIO <= ".$_GET["busquedaDineroMax"];
//  }

  $fichajes = $conexion->query($todosJugadores);
  
  //Saca cuantos jugadores hay en el banquillo a null
  $JugadorNull = 'SELECT * FROM plantilla WHERE CODUSU = '.$_SESSION['idUsuario'].' and CODJUG= 16 order by posicionCampo asc';

  $consultaNull = $conexion->query($JugadorNull);
  $numNull = $consultaNull->rowCount();
  
  // Carga la vista de listado
  include '../../View/listaTraspasos.php';
