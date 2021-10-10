<?php namespace core\sessions;

/**
 *
 */
class Session
{
  
  function __construct()
  {

  }

  public static function start(){
    session_start();
    session_regenerate_id();

  }

  public static function destroy(){

    session_unset();
    session_destroy();
    setcookie('PHPSESSID', 0, time() - 3600);
  }
}
 ?>
