<?php

  $conexion = ConexionBD::connectDB();
  $todosJugadores = 'SELECT j.*, e.IMGEQUIPO
                from jugadores j, equipo e
                where j.CODJUG != 16 and e.IMGEQUIPO != "NULL"';

  $fichajes = $conexion->query($todosJugadores);
