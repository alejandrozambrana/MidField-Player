<?php

$_SESSION['usuario'] = $_POST['usuario'];
$contraseñaIntroducida = $_POST['contraseña'];

foreach($data['usuarios'] as $usuario) {
  if($usuario->getNOMBREUSU() == $_SESSION['usuario'] && $usuario->getCONTRASENA() == $contraseñaIntroducida && $usuario->getTIPOUSU() == "administrador"){ 
    $_SESSION['logueado'] = true;
    $_SESSION['tipoUsuario'] = $usuario->getTIPOUSU();
    $_SESSION['idUsuario'] = $usuario->getCODUSU();
    header("Refresh: 0; url=../Administrador/menuAdministrador.php");//esto redirecciona a otra pagina
  } else if ($usuario->getNOMBREUSU() == $_SESSION['usuario'] && $usuario->getCONTRASENA() != $contraseñaIntroducida){
    echo '<script>alert("Contraseña Incorrecta");</script>';
  } else if ($usuario->getNOMBREUSU() == $_SESSION['usuario'] && $usuario->getCONTRASENA() == $contraseñaIntroducida && $usuario->getTIPOUSU() == "usuario"){
    $_SESSION['logueado'] = true;
    $_SESSION['tipoUsuario'] = $usuario->getTIPOUSU();
    $_SESSION['idUsuario'] = $usuario->getCODUSU();
    header("Refresh: 0; url=../menu/menu.php");//esto redirecciona a otra pagina
  } 
} 

