<?php

require_once 'ConexionBD.php';

class Equipos {

  private $CODEQUIPO;
  private $NOMBRE;
  private $IMGEQUIPO;
          
  function __construct($CODEQUIPO, $NOMBRE, $IMGEQUIPO) {
    $this->CODEQUIPO = $CODEQUIPO;
    $this->NOMBRE = $NOMBRE;
    $this->IMGEQUIPO = $IMGEQUIPO;
  }
  
  function getCODEQUIPO() {
    return $this->CODEQUIPO;
  }

  function getNOMBRE() {
    return $this->NOMBRE;
  }

  function getIMGEQUIPO() {
    return $this->IMGEQUIPO;
  }

  function setCODEQUIPO($CODEQUIPO) {
    $this->CODEQUIPO = $CODEQUIPO;
  }

  function setNOMBRE($NOMBRE) {
    $this->NOMBRE = $NOMBRE;
  }

  function setIMGEQUIPO($IMGEQUIPO) {
    $this->IMGEQUIPO = $IMGEQUIPO;
  }

  public function insert() {
    $conexion = ConexionBD::connectDB();
    $insercion = "INSERT INTO equipo (NOMBRE, IMGEQUIPO) VALUES (\"".$this->NOMBRE."\", \"".$this->IMGEQUIPO."\")";
    $conexion->exec($insercion);
  }
  
  public static function getEquipos() {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * from equipo where nombre != 'NULL'";
    $consulta = $conexion->query($seleccion);
    
    $equipo = [];
    
    while ($registro = $consulta->fetchObject()) {
      $equipo[] = new Equipos($registro->CODEQUIPO, $registro->NOMBRE, $registro->IMGEQUIPO);
    }

    return $equipo;    
  }

  
}
