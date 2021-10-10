<?php namespace core\configurator;

use core\configurator\Configurator;
use core\configurator\interfaces\ConfiguratorInterface;
/**
 *
 */
class DBConfigurator extends Configurator implements ConfiguratorInterface
{
  const DB_CONFIG_NAME = 'database.config.ini';

  private $dbConfig;


  function __construct()
  {
    parent::__construct(self::DB_CONFIG_NAME);
    $this->setConfiguration();
  }

  function setConfiguration(){

    $this->dbConfig = parent::getConfiguration();

  }
  function getPersistenceServiceName(){
    return $this->dbConfig['PRESISTENCE_SERVICE_NAME'];
  }

  function  getHost(){
    return $this->dbConfig['DB_HOST'];
  }

  function getPort(){
    return $this->dbConfig['SERVER_PORT'];
  }

  function getDriver(){
    return $this->dbConfig['DRIVER'];
  }

  function getDBname(){
    return $this->dbConfig['DB_NAME'];
  }

  function getUser(){
    return $this->dbConfig['DB_USER'];
  }

  function getPassword(){
    return $this->dbConfig['DB_PASSWORD'];
  }

  function getPDO(){
    return $this->dbConfig['pdo'] == true;
  }
}
 ?>
