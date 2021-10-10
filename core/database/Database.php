<?php namespace core\database;

use core\database\MysqlConnection;
use core\configurator\DBConfigurator;
/**
 *
 */
class Database
{
  private $adapter;
  private static $instance;
  private  $databaseconfig;
  private $connection;


  private function __construct()
  {
    $this->databaseconfig = new DBConfigurator();

    if($this->databaseconfig->getPDO()){
      switch ($this->databaseconfig->getDriver()) {
        case 'mysql':
          $MYSQL = new MysqlConnection($this->databaseconfig);
          $this->connection = $MYSQL->getConnection();
          break;
        case 'pgsdb':
          
          break;

        default:
          // code...
          break;
      }
    }

  }


  public static function  instance(){

    if(!isset(self::$instance))
    {
      $class = __CLASS__;
      self::$instance =new $class;

    }

    return self::$instance;
  }


  public function prepare($sql)
  {
    return $this->connection->prepare($sql);
  }

  public function __clone()
  {
    trigger_error("no se puede cloonar este objeto ",E_USER_ERROR);
  }
}
  ?>
