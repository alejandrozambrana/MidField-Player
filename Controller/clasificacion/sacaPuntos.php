<?php
include './sacaClasificacion.php';

$i = 0;

while($infoTabla = $informacionTabla->fetchObject()){
  
//saca los puntos
  $sumaPuntos = "SELECT SUM(pun.PUNTOS) as totalPuntos
  from plantilla p, jugadores j, equipo e, posiciones pos, puntuacion pun
  where p.CODUSU = $infoTabla->CODUSU and j.CODJUG = p.CODJUG and e.CODEQUIPO =j.CODEQUIPO and p.CODJUG !=16 and pos.CODPOS = j.CODPOS and pun.CODPUNT = j.CODPUNT";

  $puntillos = $conexion->query($sumaPuntos);
  
//  mete en un array los puntos de cada jugador
  while($puntosTodosJugadores = $puntillos->fetchObject()){
    $arrayPuntos[$i++] = $puntosTodosJugadores->totalPuntos;
  }
  
}


