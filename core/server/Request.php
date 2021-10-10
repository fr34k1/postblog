<?php namespace core\server;

use core\server\Server;
/**
 *
 */
class Request
{

  private static $requri;

  function __construct()
  {
      $this->setRqueUri();
  }


  public static function getUri(){

    return $_SERVER['REQUEST_URI'];
  }

  public  static function getAgent(){

  return self::$requri['USER_AGENT'];
  }

  public static function getMethod¡(){
    return self::$request;
  }
  private function setRqueUri(){
  //  echo $url = Server::getRequestUri();
  }


  private function validateUri(){


  }

}
 ?>
