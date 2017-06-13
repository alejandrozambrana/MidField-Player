<?php
  include '../creaSession.php';
  include '../../Model/Liga.php';
  include '../../Model/Usuarios.php';
  require_once '../../Model/ConexionBD.php';
  
  // Obtiene todas las ligas
  $data['liga']= Liga::getLiga();
//  obtener los usuarios
  $data['usuarios']= Usuarios::getUsuarios();
 
  $conexion = ConexionBD::connectDB();
  $tablaUsuarios = 'SELECT * FROM usuarios';
  $datosUsuarios = $conexion->query($tablaUsuarios);
  
  include '../datosUsuario.php';
  
  // Carga la vista de listado
  include '../../View/Administrador/menuAdministrador.php';
  
 
  