<?php
  require_once '../../Model/ConexionBD.php';
  require_once '../../Model/Usuarios.php';
  require_once '../../Model/Plantilla.php';
  
  $codusu = $_POST["codUsu"];
  
  $conexion = ConexionBD::connectDB();

  $borrarPlantilla = "DELETE FROM `plantilla` WHERE CODUSU = ".$codusu;
  $modificacion = $conexion->query($borrarPlantilla);
  
  $borrarUsuario = "DELETE FROM `usuarios` WHERE CODUSU = ".$codusu;
  $modificacion = $conexion->query($borrarUsuario);
  
  header("Location: ../../index.php");