<?php namespace app\core\database;

/**
 *
 */
class PostgreConnection
{

  private $connection;

  public function __construct(){

    try {

      $connectionString = $this->getConnectionString();
      $this->connection = new \PDO($connectionString,$databaseconfig->getUser(),$databaseconfig->getPassword());

    } catch (\Exception $e) {

      echo "imposible conectar a la db";
      exit;
      }

  }


  private function getConnectionString(Config $databaseconfig){
    return  "pgsql:host=$databaseconfig->getHost();port:$databaseconfig->getPort();dbname=$databaseconfig->getDbname()";
  }

  private function getConnection(){
    return $this->connection;
  }

}
 ?>
