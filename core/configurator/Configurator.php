<?php namespace core\configurator;

/**
 *
 */
class Configurator
{

  const CONFIG_PATH = 'core'.DIRECTORY_SEPARATOR.'configurator'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR;
  private $configFile;

  function __construct($configFile)
  {
    $this->configFile = $configFile;
  }


  protected function getConfiguration(){
    $full_db_path =self::CONFIG_PATH.$this->configFile;

    if(!file_exists($full_db_path)){
      throw new \Exception("El archivo $full_db_path no existe", 1);

    }
    return parse_ini_file($full_db_path);
  }


}
 ?>
