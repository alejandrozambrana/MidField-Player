<?php
  $conexion = ConexionBD::connectDB();
  $seleccion = 'SELECT j.CODJUG, j.NOMBRE, j.IMAGEN, j.CODPUNT, j.CODEQUIPO, j.CODPOS, e.IMGEQUIPO, p.posicionCampo, pos.ABREVIATURA
                from plantilla p, jugadores j, equipo e, posiciones pos
                where p.CODUSU = '.$_SESSION['idUsuario'].' and j.CODJUG = p.CODJUG and p.ONCEINICIAL = "si" and e.CODEQUIPO =j.CODEQUIPO and pos.CODPOS = j.CODPOS
                ORDER by p.posicionCampo';

  $onceinicial = $conexion->query($seleccion);
  
//  Saca el banquillo
  
  $seleccion2 = 'SELECT j.CODJUG, j.NOMBRE, j.IMAGEN, j.CODPUNT, j.CODEQUIPO, j.CODPOS, e.IMGEQUIPO, p.posicionCampo, pos.ABREVIATURA
                from plantilla p, jugadores j, equipo e, posiciones pos
                where p.CODUSU = '.$_SESSION['idUsuario'].' and j.CODJUG = p.CODJUG and p.ONCEINICIAL = "no" and e.CODEQUIPO = j.CODEQUIPO and pos.CODPOS = j.CODPOS
                ORDER by p.posicionCampo';
  
  $banquillo = $conexion->query($seleccion2);
  
  // saca todos los jugadores menos los vacios
  
  $seleccion3 = 'SELECT j.CODJUG, j.NOMBRE, j.IMAGEN, j.CODEQUIPO, j.CODPOS, j.PRECIO, e.IMGEQUIPO, p.posicionCampo, p.CODUSU, pos.ABREVIATURA, pun.PUNTOS
                from plantilla p, jugadores j, equipo e, posiciones pos, puntuacion pun
                where p.CODUSU = '.$_SESSION['idUsuario'].' and j.CODJUG = p.CODJUG and e.CODEQUIPO =j.CODEQUIPO and p.CODJUG !=16 and pos.CODPOS = j.CODPOS and pun.CODPUNT = j.CODPUNT
                ORDER by p.posicionCampo';
  
  $todos= $conexion->query($seleccion3);