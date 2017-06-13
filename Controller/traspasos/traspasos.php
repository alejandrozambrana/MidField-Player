<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  
  require_once '../../Model/Posiciones.php';
  
  // Obtiene todas los Posiciones
  $data['posiciones'] = Posiciones::getPosiciones();
  
  require_once '../../Model/Equipos.php';
  
  // Obtiene todas los equipos
  $data['equipo'] = Equipos::getEquipos();
  
  include '../datosUsuario.php';
  
  // Carga la vista de listado
  include '../../View/traspasos.php';
