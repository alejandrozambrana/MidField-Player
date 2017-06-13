<?php
  
  $conexion = ConexionBD::connectDB();

  $usuarioDatos = "Select * from usuarios where CODUSU =".$_SESSION['idUsuario'];
  $usuarioDatos = $conexion->query($usuarioDatos);