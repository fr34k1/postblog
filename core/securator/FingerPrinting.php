<?php namespace core\securator;
/**
 *
 */

class FingerPrinting
{
  private $remotePrint;
  const THUMB_PRINTS_DIR = 'core'.DIRECTORY_SEPARATOR.'securator'.DIRECTORY_SEPARATOR.'thums_prints'.DIRECTORY_SEPARATOR;

  function __construct()
  {
    $this->$remotePrint= md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_LANGUAGE']);
  }



  function createFile(){
    if(!file_exists(self::THUMB_PRINTS_DIR.$this->remotePrint)){
      file_put_contents(self::THUMB_PRINTS_DIR.$this->remotePrint,$this->remotePrint);
    }
  }
}
 ?>
