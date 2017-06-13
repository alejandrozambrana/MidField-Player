<?php
  
  include '../../Model/ConexionBD.php';
  
  $conexion = ConexionBD::connectDB();
  
  $posicionOriginal = $_POST['posicionOriginal'];
  $posicionNueva = $_POST['posicionNueva'];
  $idUsuario = $_POST['idUsuario'];
  $codjug = $_POST['codjug'];
  $onceInicial = $_POST['onceInicial'];
  $codjugCambio = $_POST['codjugCambio'];
  $onceInicialCambio = $_POST['onceInicialCambio'];

  $modificacion = "UPDATE plantilla SET CODUSU=".$idUsuario.",CODJUG=".$codjug.",ONCEINICIAL='".$onceInicialCambio."',posicionCampo=".$posicionNueva." WHERE CODJUG= ".$codjug." and CODUSU=".$idUsuario."";
  $conexion->exec($modificacion);
  
  $modificacion2 = "UPDATE plantilla SET CODUSU=".$idUsuario.",CODJUG=".$codjugCambio.",ONCEINICIAL='".$onceInicial."',posicionCampo=".$posicionOriginal." WHERE CODJUG= ".$codjugCambio." and CODUSU=".$idUsuario."";
  $conexion->exec($modificacion2);