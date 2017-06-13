<?php

//saca la clasificacion
  $puntos = "SELECT u.CODUSU, u.NOMBREUSU, u.MONEDAS, u.NOMEQUIPO, u.ESCUDO FROM jugadores j, plantilla p, puntuacion pu, usuarios u WHERE j.CODJUG = p.CODJUG and u.CODLIGA = (SELECT CODLIGA FROM usuarios WHERE CODUSU = ".$_SESSION['idUsuario'].") and j.CODPUNT = pu.PUNTOS and j.NOMBRE != \"NULL\" GROUP by u.CODUSU";
  $informacionTabla = $conexion->query($puntos);


