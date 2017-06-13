<?php

  require_once '../../Model/ConexionBD.php';
  $conexion = ConexionBD::connectDB();
  
  $codLiga = $_GET['codLiga'];
  $idUsuario = $_GET['idUsuario'];
  $participantes = $_GET['participantes'];
  $nombreLiga = $_GET['nombreLiga'];

  if($nombreLiga == ""){
    $unirse = "UPDATE usuarios SET CODLIGA=".$codLiga." WHERE CODUSU=".$idUsuario."";
    $conexion->exec($unirse);

    if($participantes != "NULL"){
      $participantes++;
    }
 
    //suma participantes
    $participantes = "UPDATE liga SET PARTICIPANTES=".$participantes." WHERE CODLIGA=".$codLiga."";
    $conexion->exec($participantes);
  }
  
  if($nombreLiga != ""){
    $crearLiga = "INSERT INTO liga (CODLIGA, NOMBRE, PARTICIPANTES) VALUES (NULL, '".$nombreLiga."', '')";
    $conexion->exec($crearLiga);
  }
