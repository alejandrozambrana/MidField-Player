  <?php
    require_once '../../Model/ConexionBD.php';
    
    $conexion = ConexionBD::connectDB();
    
    $codigo = $_POST['codigo'];
    $tabla = $_POST['tabla'];
    $campoTabla = $_POST['campo'];

    if($tabla == usuarios){
      $borraPlantilla = "DELETE FROM plantilla WHERE ". $campoTabla ." = $codigo";
      $conexion->query($borraPlantilla);
    }
    
    $borra = "DELETE FROM ". $tabla ." WHERE ". $campoTabla ." = $codigo";
    $conexion->query($borra);
    
    
    
  ?>

