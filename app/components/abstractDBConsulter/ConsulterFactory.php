<?php namespace app\components\abstractDBConsulter;

use core\configurator\DBConfigurator;
use core\database\Database;
use app\components\abstractDBConsulter\mysql\MYSQLConsulter;
use app\components\abstractDBConsulter\DBConsulter;

/**
 *
 */
class ConsulterFactory
{
  private static $presistence_service;
  private static $instance;

  private function __construct()
  {

  }

  static function getConsulterInstance(Database $dbInstance,String $table)
  {

    $config = new DBConfigurator();
    self::$presistence_service = $config->getPersistenceServiceName();

    switch (self::$presistence_service) {
      case 'mysql':

        self::setMysqlInstance($dbInstance,$table);

        break;
      case 'posgre':

        $this->setPosgreInstance();
        break;

      default:
        // code...
        break;
    }

    return self::$instance;
  }


  private function setMysqlInstance(Database $dbInstance,String $table){
    $mysqlC= new MYSQLConsulter($dbInstance,$table);
    $consulter = new DBConsulter($mysqlC);
    self::$instance=$consulter->getConsulterInstance();
  }



  function __clone(){
    trigger_error("no se puede cloonar este objeto ",E_USER_ERROR);
  }

}
?>
