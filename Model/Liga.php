<?php

require_once 'ConexionBD.php';

class Liga {

  private $CODLIGA;
  private $NOMBRE;
  private $PARTICIPANTES;
          
  function __construct($CODLIGA, $NOMBRE, $PARTICIPANTES) {
    $this->CODLIGA = $CODLIGA;
    $this->NOMBRE = $NOMBRE;
    $this->PARTICIPANTES = $PARTICIPANTES;
  }
  
  function getCODLIGA() {
    return $this->CODLIGA;
  }

  function getNOMBRE() {
    return $this->NOMBRE;
  }

  function getPARTICIPANTES() {
    return $this->PARTICIPANTES;
  }

  function setCODLIGA($CODLIGA) {
    $this->CODLIGA = $CODLIGA;
  }

  function setNOMBRE($NOMBRE) {
    $this->NOMBRE = $NOMBRE;
  }

  function setPARTICIPANTES($PARTICIPANTES) {
    $this->PARTICIPANTES = $PARTICIPANTES;
  }
  
  public function insert() {
    $conexion = ConexionBD::connectDB();
    $insercion = "INSERT INTO liga (NOMBRE, PARTICIPANTES) VALUES (\"".$this->NOMBRE."\", \"".$this->PARTICIPANTES."\")";
    $conexion->exec($insercion);
  }
  
  public static function getLiga() {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * from liga where PARTICIPANTES < 15";
    $consulta = $conexion->query($seleccion);
    
    $liga = [];
    
    while ($registro = $consulta->fetchObject()) {
      $liga[] = new Liga($registro->CODLIGA, $registro->NOMBRE, $registro->PARTICIPANTES);
    }

    return $liga;    
  }

  
}
