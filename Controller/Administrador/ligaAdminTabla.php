<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  
  include '../../Model/Liga.php';
  
  //  obtener los equipos
  $data['liga']= Liga::getLiga();  

  include '../datosUsuario.php';
  
  // Carga la vista de listado
  include '../../View/Administrador/tablas/tablaLiga.php';
  