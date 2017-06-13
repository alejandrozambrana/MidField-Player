  <?php
    require_once '../../Model/ConexionBD.php';
    require_once '../../Model/Usuarios.php';
    require_once '../../Model/Jugadores.php';
    require_once '../../Model/Equipos.php';
    require_once '../../Model/Liga.php';
    require_once '../../Model/Posiciones.php';
    require_once '../../Model/Plantilla.php';
    
    
    $conexion = ConexionBD::connectDB();

    $tabla = $_POST['tabla'];
    $campo1 = $_POST['campo1'];
    $campo2 = $_POST['campo2'];
    $campo3 = $_POST['campo3'];
    $campo4 = $_POST['campo4'];
    $campo5 = $_POST['campo5'];
    $campo6 = $_POST['campo6'];
    $campo7 = $_POST['campo7'];
    $campo8 = $_POST['campo8'];
    $campo10 = $_POST['campo10'];
    
    if($tabla == usuarios){

      if ($_FILES["escudoId"]["name"] != ""){
        $nombre = $_FILES["escudoId"]["name"];
    //    saca la extencion de la escudoId
        $escudoId = substr(strrchr($_FILES["escudoId"]["name"], "."), 1);
    //    genera un nombre aleatorio
        $rutaArchivo = rand() . time() . ".$escudoId";    
        $tipo = $_FILES["escudoId"]["type"];
        $ruta_provisional = $_FILES["escudoId"]["tmp_name"];
        $size = $_FILES["escudoId"]["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../../View/Multimedia/escudoId/fotoEscudos/";
        $mensaje = "";
        $src = $carpeta.$rutaArchivo;
        move_uploaded_file($ruta_provisional, $src);

        // inserta la oferta en la base de datos
        $usuarioNuevo = new Usuarios(" ", $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $campo8, $rutaArchivo, $campo10);
        $usuarioNuevo->insert();

      } else if($_FILES["escudoId"]["name"] == "") {
          // inserta la oferta en la base de datos
          $usuarioNuevo = new Usuarios(" ", $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $campo8, "", $campo10);
          $usuarioNuevo->insert();
      }
      
      //saca codigo de jugador que hemos registrado para asignarle los jugadores
        $seleccion = 'SELECT CODUSU
                      FROM usuarios 
                      where NOMBREUSU = "'.$campo1.'" and email = "'.$campo2.'"';

        $codusu = $conexion->query($seleccion);

        //mete en una variable el resultado de la consulta anterior
        while ($usu = $codusu->fetchObject()) {
          $codusuario = $usu->CODUSU;
        }

        //cuenta cuantos jugadores ahi.
        $seleccion2 = 'select * from jugadores';
        $numfilas = $conexion->query($seleccion2);
        $numJug = $numfilas->rowCount();

        //Saca numero aleatorio sin repetir ninguno
        $contador = 0;
        do{
          $aleatorio = rand(1, $numJug); //saca numero aleatorio
          $jugadoresAleatorio[$contador] = $aleatorio; //mete numero aleatorio en el array
          $contador = count(array_unique($jugadoresAleatorio)); //cuenta cuantos numeros hay en el array que no se repiten
          $jugadoresAleatorio = array_unique($jugadoresAleatorio); //quita del array los numeros repetidos
          if($aleatorio == 16){
            unset($jugadoresAleatorio[$contador]);
            $contador--;
          }
        }while($contador < 12);

        //asigna los jugadores aleatorios de campo
        $recorreArray = -1;
        for($i = 0; $i < 12; $i++){
          $campo = new Plantilla($codusuario, $jugadoresAleatorio[$recorreArray++], "si", $i);
          $campo->insert();
        }


        //asigna banquillo vacio
        for($i = 12; $i < 23; $i++){
          $banquilloVacio = new Plantilla($codusuario, 16, "no", $i);
          $banquilloVacio->insert();
        }
    }
    if($tabla == jugadores){
      $jugadorNuevo = new Jugadores(" ", $campo1, $campo2, $campo3, $campo4, $campo5, $campo6);
      $jugadorNuevo->insert();
    }
    
    if($tabla == equipo){
      $equipoNuevo = new Equipos(" ", $campo1, $campo2);
      $equipoNuevo->insert();
    }
    
    if($tabla == liga){
      $ligaNuevo = new Liga(" ", $campo1, $campo2);
      $ligaNuevo->insert();
    }
    
    if($tabla == posiciones){
      $posicionesNuevo = new Posiciones(" ", $campo1, $campo2);
      $posicionesNuevo->insert();
    }
    
  ?>