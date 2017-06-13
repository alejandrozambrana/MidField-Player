<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php'; 
  
  include '../../Model/Equipos.php';
  
  //  obtener los equipos
  $data['equipos']= Equipos::getEquipos();  
  
  // Carga la vista de listado
   include '../../View/Administrador/tablas/tablaEquipo.php';
  