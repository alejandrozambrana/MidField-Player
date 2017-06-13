<?php
  include '../creaSession.php';
  
  require_once '../../Model/ConexionBD.php';
  
  $conexion = ConexionBD::connectDB();
    
  $tablaUsuarios = 'SELECT * , u.NOMBRE as "USUNOM" FROM usuarios u left join liga l on (u.CODLIGA = l.CODLIGA)';
  $datosUsuarios = $conexion->query($tablaUsuarios);
  
  
  // Carga la vista de listado
   include '../../View/Administrador/tablas/tablaUsuarios.php';
  