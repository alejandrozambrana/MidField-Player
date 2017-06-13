<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  include '../../Model/Usuarios.php';
  include '../../Model/Equipos.php';
  include '../../Model/Posiciones.php';
  
  //  obtener los usuarios
  $data['usuarios']= Usuarios::getUsuarios();
  
  //  obtener los equipos
  $data['equipos']= Equipos::getEquipos();
  
  //  obtener las posiciones
  $data['posiciones']= Posiciones::getPosiciones();
  

  include '../datosUsuario.php';
  
  // Carga la vista de listado
  include '../../View/Administrador/jugadoresAdministrador.php';
  