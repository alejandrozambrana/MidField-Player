<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  
  include '../../Model/Posiciones.php';
  
  //  obtener los equipos
  $data['posiciones']= Posiciones::getPosiciones();  

  include '../datosUsuario.php';
  
  // Carga la vista de listado
  include '../../View/Administrador/tablas/tablaPosiciones.php';
  