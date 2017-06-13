<?php

require_once 'ConexionBD.php';

class Posiciones {

  private $CODPOS;
  private $POSICION;
  private $ABREVIATURA;
  
  function __construct($CODPOS, $POSICION, $ABREVIATURA) {
    $this->CODPOS = $CODPOS;
    $this->POSICION = $POSICION;
    $this->ABREVIATURA = $ABREVIATURA;
  }
  function getCODPOS() {
    return $this->CODPOS;
  }

  function getPOSICION() {
    return $this->POSICION;
  }
  
  function getABREVIATURA() {
    return $this->ABREVIATURA;
  }

  function setCODPOS($CODPOS) {
    $this->CODPOS = $CODPOS;
  }

  function setPOSICION($POSICION) {
    $this->POSICION = $POSICION;
  }

  public function insert() {
    $conexion = ConexionBD::connectDB();
    $insercion = "INSERT INTO posiciones (POSICION, ABREVIATURA) VALUES (\"".$this->POSICION."\", \"".$this->ABREVIATURA."\")";
    $conexion->exec($insercion);
  }
  
  public static function getPosiciones() {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * from posiciones where posicion != 'NULL'";
    $consulta = $conexion->query($seleccion);
    
    $posiciones = [];
    
    while ($registro = $consulta->fetchObject()) {
      $posiciones[] = new Posiciones($registro->CODPOS, $registro->POSICION, $registro->ABREVIATURA);
    }
   
    return $posiciones;    
  }

  
}
