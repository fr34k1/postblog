<?php namespace core\server;

/**
 *
 */
class ServerInfo
{
private static $serverinfo=[];

  function __construct()
  {
    self::$serverinfo = $_SERVER;
  }

  public static function getRequestUri(){
    self::$serverinfo = $_SERVER['REQUEST_URI'];
    return self::$serverinfo;
  }
}
 ?>
