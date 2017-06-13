  <?php
    require_once '../../Model/ConexionBD.php';
    
    $conexion = ConexionBD::connectDB();
    
    $codigo = $_POST['codigo'];
    $tabla = $_POST['tabla'];
    $campo1 = $_POST['campo1'];
    $campo2 = $_POST['campo2'];
    $campo3 = $_POST['campo3'];
    $campo4 = $_POST['campo4'];
    $campo5 = $_POST['campo5'];
    $campo6 = $_POST['campo6'];
    $campo7 = $_POST['campo7'];
    $campo8 = $_POST['campo8'];
    $campo9 = $_POST['campo9'];
    
    if($tabla == "usuarios"){
      if(!empty($campo9)){
        $modificarUsuarios = "UPDATE ".$tabla." SET `CODUSU`=".$codigo.",`NOMBREUSU`='".$campo1."',"
                . "`EMAIL`='".$campo2."',`CONTRASEÑA`='".$campo3."',`NOMBRE`='".$campo4."',`APELLIDOS`='".$campo5."',"
                . "`MONEDAS`=".$campo6.",`TIPOUSU`='".$campo7."',`NOMEQUIPO`='".$campo8."',"
                . "`CODLIGA`=".$campo9." WHERE CODUSU = ". $codigo;
        $conexion->query($modificarUsuarios);
      }else{
        $modificarUsuarios = "UPDATE ".$tabla." SET `CODUSU`=".$codigo.",`NOMBREUSU`='".$campo1."',"
                . "`EMAIL`='".$campo2."',`CONTRASEÑA`='".$campo3."',`NOMBRE`='".$campo4."',`APELLIDOS`='".$campo5."',"
                . "`MONEDAS`=".$campo6.",`TIPOUSU`='".$campo7."',`NOMEQUIPO`='".$campo8."' WHERE CODUSU = ". $codigo;
        $conexion->query($modificarUsuarios);
      }
    }elseif ($tabla == "jugadores") {
      $modificarJug = "UPDATE ".$tabla." SET `CODJUG`=".$codigo.",`NOMBRE`='".$campo1."',"
                . "`PRECIO`='".$campo2."',`IMAGEN`='".$campo3."',`CODPUNT`='".$campo4."',`CODEQUIPO`='".$campo5."',"
                . "`CODPOS`=".$campo6." WHERE CODJUG = ". $codigo;
      $conexion->query($modificarJug);
    } elseif($tabla == "equipo"){
      $modificarEqui = "UPDATE ".$tabla." SET `CODEQUIPO`=".$codigo.",`NOMBRE`='".$campo1."',"
                . "`IMGEQUIPO`='".$campo2."' WHERE CODEQUIPO = ". $codigo;
      $conexion->query($modificarEqui);
    }elseif($tabla == "liga"){
      $modificarLiga = "UPDATE ".$tabla." SET `CODLIGA`=".$codigo.",`NOMBRE`='".$campo1."',"
                . "`PARTICIPANTES`='".$campo2."' WHERE CODLIGA = ". $codigo;
      $conexion->query($modificarLiga);
    }elseif($tabla == "posiciones"){
      $modificarLiga = "UPDATE ".$tabla." SET `CODPOS`=".$codigo.",`POSICION`='".$campo1."',"
                . "`ABREVIATURA`='".$campo2."' WHERE CODPOS = ". $codigo;
      $conexion->query($modificarLiga);
    }
    

