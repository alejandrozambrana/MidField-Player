<?php

  require_once '../../Model/Usuarios.php';

  // Obtiene todas los usuarios
  $data['usuarios'] = Usuarios::getUsuarios();
  
  //Crea la session
  include './sessionUsuario.php';
  
  //comprueba si el usuario existe
  include './compruebaUsuario.php';
  
  $mensajeContraseñaIncorrecta = $_GET["error_clave"];
  $mensaje = $_GET["mensaje"];
  
  // Carga la vista de listado
  include '../../View/login.php';
 
  