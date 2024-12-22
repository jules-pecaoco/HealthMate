<?php
class Database {
  //USING PDO
  public function getConnection() {
    try {
      $config = parse_ini_file('config.ini');
      $HOST = $config['HOST'];
      $DB = $config['DATABASE'];
      $USER = $config['USER'];
      $PASSWORD = $config['PASSWORD'];
      $PORT = $config['PORT'];
      $link = new PDO("mysql:host=$HOST;dbname=$DB;port=$PORT", $USER, $PASSWORD); 
      // $link = new PDO("mysql:host=localhost;dbname=healthmate;port=3307", "root", "");

      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $link;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
