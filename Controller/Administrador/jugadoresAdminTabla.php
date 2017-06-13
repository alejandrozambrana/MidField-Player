<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  include '../../Model/Jugadores.php';
  
  //  obtener los jugadores
  $data['jugadores']= Jugadores::getJugadores();
  
  
  // Carga la vista de listado
   include '../../View/Administrador/tablas/tablaJugadores.php';
  