<?php namespace core\database;

use core\database\interfaces\DBconnectionInterface;
/**
 *
 */
class MysqlConnection implements DBconnectionInterface
{
    private $connection;

    public function __construct($databaseconfig){

      try {

          $connectionString = $this->getConnectionString($databaseconfig);
          $this->connection = new \PDO($connectionString,$databaseconfig->getUser(),$databaseconfig->getPassword());
          $this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
          $this->connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
          //$this->connection->exec("SET CHARACTER SET utf8");

        } catch (\Exception $e) {

          echo "imposible conectar a la db";
          exit;
          }
        }

     function getConnectionString( $databaseconfig){
      return  "mysql:host={$databaseconfig->getHost()};dbname={$databaseconfig->getDbname()}";
    }

     function getConnection(){
      return $this->connection;
    }
  }
   ?>
