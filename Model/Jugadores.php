<?php

require_once 'ConexionBD.php';

class Jugadores {

  private $CODJUG;
  private $NOMBRE;
  private $PRECIO;
  private $IMAGEN;
  private $CODPUNT;
  private $CODEQUIPO;
  private $CODPOS;
  
  function __construct($CODJUG, $NOMBRE, $PRECIO, $IMAGEN, $CODPUNT, $CODEQUIPO, $CODPOS) {
    $this->CODJUG = $CODJUG;
    $this->NOMBRE = $NOMBRE;
    $this->PRECIO = $PRECIO;
    $this->IMAGEN = $IMAGEN;
    $this->CODPUNT = $CODPUNT;
    $this->CODEQUIPO = $CODEQUIPO;
    $this->CODPOS = $CODPOS;
  }
  
  function getCODJUG() {
    return $this->CODJUG;
  }

  function getNOMBRE() {
    return $this->NOMBRE;
  }

  function getPRECIO() {
    return $this->PRECIO;
  }

  function getIMAGEN() {
    return $this->IMAGEN;
  }

  function getCODPUNT() {
    return $this->CODPUNT;
  }

  function getCODEQUIPO() {
    return $this->CODEQUIPO;
  }

  function getCODPOS() {
    return $this->CODPOS;
  }

  function setCODJUG($CODJUG) {
    $this->CODJUG = $CODJUG;
  }

  function setNOMBRE($NOMBRE) {
    $this->NOMBRE = $NOMBRE;
  }

  function setPRECIO($PRECIO) {
    $this->PRECIO = $PRECIO;
  }

  function setIMAGEN($IMAGEN) {
    $this->IMAGEN = $IMAGEN;
  }

  function setCODPUNT($CODPUNT) {
    $this->CODPUNT = $CODPUNT;
  }

  function setCODEQUIPO($CODEQUIPO) {
    $this->CODEQUIPO = $CODEQUIPO;
  }

  function setCODPOS($CODPOS) {
    $this->CODPOS = $CODPOS;
  }
  
  public function insert() {
    $conexion = ConexionBD::connectDB();
    $insercion = "INSERT INTO Jugadores (NOMBRE, PRECIO, IMAGEN, CODPUNT, CODEQUIPO, CODPOS) VALUES (\"".$this->NOMBRE."\", \"".$this->PRECIO."\", \"".$this->IMAGEN."\", \"".$this->CODPUNT."\", \"".$this->CODEQUIPO."\", \"".$this->CODPOS."\")";
    $conexion->exec($insercion);
  }

  public static function getJugadores() {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * from jugadores";
    $consulta = $conexion->query($seleccion);
    
    $jugadores = [];
    
    while ($registro = $consulta->fetchObject()) {
      $jugadores[] = new Jugadores($registro->CODJUG, $registro->NOMBRE, 
              $registro->PRECIO, $registro->IMAGEN, $registro->CODPUNT, 
              $registro->CODEQUIPO, $registro->CODPOS);
    }
   
    return $jugadores;    
  }

  
}
