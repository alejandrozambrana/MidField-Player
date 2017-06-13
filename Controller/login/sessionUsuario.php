<?php
//si la session esta iniciada la destruye
if(session_start() == true){
  session_destroy();
}
error_reporting(E_ALL ^ E_NOTICE); //no muestra error de variables indefinida
session_start();// Inicia la sesión

if(!isset($_SESSION['usuario']) && !isset($_SESSION['logueado'])) {//comprueba que la variable no esta iniciada.
$_SESSION['usuario'] = "";
$_SESSION['logueado'] = false;
$_SESSION['tipoUsuario'] = " ";
$_SESSION['idUsuario'] = " ";
}

?>
