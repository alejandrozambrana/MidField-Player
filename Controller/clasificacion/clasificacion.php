<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  
  $conexion = ConexionBD::connectDB();
  
  include '../datosUsuario.php';
  
//  saca los puntos de cada jugador
  include './sacaPuntos.php';
  
  include './sacaClasificacion.php';
  
  // Carga la vista de listado
  include '../../View/clasificacion.php';
  
