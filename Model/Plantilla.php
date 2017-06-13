<?php

require_once 'ConexionBD.php';

class Plantilla {
  
  private $CODUSU;
  private $CODJUG;
  private $ONCEINICIAL;
  private $posicionCampo;
          
  function __construct($CODUSU, $CODJUG, $ONCEINICIAL, $posicionCampo) {
    $this->CODUSU = $CODUSU;
    $this->CODJUG = $CODJUG;
    $this->ONCEINICIAL = $ONCEINICIAL;
    $this->posicionCampo = $posicionCampo;
  }
  
  function getCODUSU() {
    return $this->CODUSU;
  }

  function getCODJUG() {
    return $this->CODJUG;
  }
  
  function getONCEINICIAL() {
    return $this->ONCEINICIAL;
  }
  
  function getposicionCampo() {
    return $this->posicionCampo;
  }

  function setCODUSU($CODUSU) {
    $this->CODUSU = $CODUSU;
  }

  function setCODJUG($CODJUG) {
    $this->CODJUG = $CODJUG;
  }
  
  function setONCEINICIAL($ONCEINICIAL) {
    $this->ONCEINICIAL = $ONCEINICIAL;
  }
  
  function setposicionCampo($posicionCampo) {
    $this->posicionCampo = $posicionCampo;
  }

  public function insert() {
    $conexion = ConexionBD::connectDB();
    $insercion = "INSERT INTO plantilla (CODUSU, CODJUG, ONCEINICIAL, posicionCampo) VALUES ($this->CODUSU, $this->CODJUG, \"".$this->ONCEINICIAL."\", $this->posicionCampo)";
    $conexion->exec($insercion);
  }
  
  public static function getPlantilla() {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * FROM plantilla";
    $consulta = $conexion->query($seleccion);
    
    $plantilla = [];
    
    while ($registro = $consulta->fetchObject()) {
      $plantilla[] = new Plantilla($registro->CODUSU, $registro->CODJUG);
    }
   
    return $plantilla;    
  }

}
