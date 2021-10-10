<?php


/**
 *
 */
class Autoloader
{

  private static $dirs = [];
  private static $registered = 0;
  const UNABLE_TO_LOAD = 'Cant load the file ';

  function __construct($dirs = array())
  {
    self::$dirs= $dirs;
  }

  public static function loadFiles(String $file){
    //echo $file;
    if(file_exists($file)){
      require_once($file);
      return true;
    }
    return false;
  }

  public static function autoLoad($class){
    //echo "funcion";
    $success=FALSE;
    $filename = str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';

    foreach (self::$dirs as $start) {
       $file = $start . DIRECTORY_SEPARATOR . $filename;

      if(self::loadFiles($file)){
        $success=TRUE;
        break;
      }
    }
    if(!$success){

      if(!self::loadFiles(__DIR__ . DIRECTORY_SEPARATOR . $filename)){
        throw new \Exception(self::UNABLE_TO_LOAD . ' ' . $class);
      }
    }
    return $success;
  }

  public static function addDirs($dirs){

    if(is_array($dirs)){
      self::$dirs= array_merge(self::$dirs, $dirs);
    }else{
      self::$dirs[]=$dirs;
    }
  }

  public static function init($dirs = array()){
    if($dirs){
      self::addDirs($dirs);
    }
    if(self::$registered == 0){
      spl_autoload_register(__CLASS__.'::autoLoad');
      self::$registered++;
    }
  }


}

 ?>
