<?php

require_once 'ConexionBD.php';

class Usuarios {

  private $CODUSU;
  private $NOMBREUSU;
  private $EMAIL;
  private $CONTRASENA;
  private $NOMBRE;
  private $APELLIDOS;
  private $MONEDAS;
  private $TIPOUSU;
  private $NOMEQUIPO;
  private $ESCUDO;
  private $CODLIGA;

  function __construct($CODUSU, $NOMBREUSU, $EMAIL, $CONTRASENA, $NOMBRE, $APELLIDOS, $MONEDAS, $TIPOUSU, $NOMEQUIPO, $ESCUDO, $CODLIGA) {
    $this->CODUSU = $CODUSU;
    $this->NOMBREUSU = $NOMBREUSU;
    $this->EMAIL = $EMAIL;
    $this->CONTRASENA = $CONTRASENA;
    $this->NOMBRE = $NOMBRE;
    $this->APELLIDOS = $APELLIDOS;
    $this->MONEDAS = $MONEDAS;
    $this->TIPOUSU = $TIPOUSU;
    $this->NOMEQUIPO = $NOMEQUIPO;
    $this->ESCUDO = $ESCUDO;
    $this->CODLIGA = $CODLIGA;
  }
  
  function getCODUSU() {
    return $this->CODUSU;
  }

  function getNOMBREUSU() {
    return $this->NOMBREUSU;
  }

  function getEMAIL() {
    return $this->EMAIL;
  }

  function getCONTRASENA() {
    return $this->CONTRASENA;
  }

  function getNOMBRE() {
    return $this->NOMBRE;
  }

  function getAPELLIDOS() {
    return $this->APELLIDOS;
  }

  function getMONEDAS() {
    return $this->MONEDAS;
  }

  function getTIPOUSU() {
    return $this->TIPOUSU;
  }

  function getNOMEQUIPO() {
    return $this->NOMEQUIPO;
  }

  function getESCUDO() {
    return $this->ESCUDO;
  }

  function getCODLIGA() {
    return $this->CODLIGA;
  }

  function setCODUSU($CODUSU) {
    $this->CODUSU = $CODUSU;
  }

  function setNOMBREUSU($NOMBREUSU) {
    $this->NOMBREUSU = $NOMBREUSU;
  }

  function setEMAIL($EMAIL) {
    $this->EMAIL = $EMAIL;
  }

  function setCONTRASENA($CONTRASENA) {
    $this->CONTRASENA = $CONTRASENA;
  }

  function setNOMBRE($NOMBRE) {
    $this->NOMBRE = $NOMBRE;
  }

  function setAPELLIDOS($APELLIDOS) {
    $this->APELLIDOS = $APELLIDOS;
  }

  function setMONEDAS($MONEDAS) {
    $this->MONEDAS = $MONEDAS;
  }

  function setTIPOUSU($TIPOUSU) {
    $this->TIPOUSU = $TIPOUSU;
  }

  function setNOMEQUIPO($NOMEQUIPO) {
    $this->NOMEQUIPO = $NOMEQUIPO;
  }

  function setESCUDO($ESCUDO) {
    $this->ESCUDO = $ESCUDO;
  }

  function setCODLIGA($CODLIGA) {
    $this->CODLIGA = $CODLIGA;
  }
  
  public function insert() {
    $conexion = ConexionBD::connectDB();
    $insercion = "INSERT INTO usuarios (NOMBREUSU, EMAIL, CONTRASEÑA, NOMBRE, APELLIDOS, MONEDAS, TIPOUSU, NOMEQUIPO, ESCUDO, CODLIGA) VALUES (\"".$this->NOMBREUSU."\", \"".$this->EMAIL."\", \"".$this->CONTRASENA."\", \"".$this->NOMBRE."\", \"".$this->APELLIDOS."\", \"1500\", \"usuario\", \"".$this->NOMEQUIPO."\", \"".$this->ESCUDO."\", \"".$this->CODLIGA."\")";
    $conexion->exec($insercion);
  }
  
  public static function getUsuarios() {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * from usuarios";
    $consulta = $conexion->query($seleccion);
    
    $usuarios = [];
    
    while ($registro = $consulta->fetchObject()) {
      $usuarios[] = new Usuarios($registro->CODUSU, $registro->NOMBREUSU, 
              $registro->EMAIL, $registro->CONTRASEÑA, $registro->NOMBRE, 
              $registro->APELLIDOS, $registro->MONEDAS, $registro->TIPOUSU, 
              $registro->NOMEQUIPO, $registro->ESCUDO, $registro->CODLIGA);
    }
   
    return $usuarios;    
  }
  
  public static function getUsuarioModificar($codUsu) {
    $conexion = ConexionBD::connectDB();
    $seleccion = "SELECT * from usuarios Where =". $codUsu;
    $consulta = $conexion->query($seleccion);
    
    $usuariosModificar = [];
    
    while ($registro = $consulta->fetchObject()) {
      $usuariosModificar[] = new Usuarios($registro->CODUSU, $registro->NOMBREUSU, 
              $registro->EMAIL, $registro->CONTRASEÑA, $registro->NOMBRE, 
              $registro->APELLIDOS, $registro->MONEDAS, $registro->TIPOUSU, 
              $registro->NOMEQUIPO, $registro->ESCUDO, $registro->CODLIGA);
    }
   
    return $usuariosModificar;    
  }


}
  