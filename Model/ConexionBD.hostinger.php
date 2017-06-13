<?php

abstract class ConexionBD {
  private static $server = 'mysql.hostinger.es';
  private static $db = 'u406733123_mfp';
  private static $user = 'u406733123_root';
  private static $password = 'milfieldplayer';

  public static function connectDB() {
    try {
      $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
    } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }
    
    return $connection;
  }
}