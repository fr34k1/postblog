<?php namespace core\url;
/**
 *
 */

class UrlValidator
{
  private $url;

  function __construct($url)
  {
    $this->url = $url;
  }


  function validate(){
    if($this->url == '/'){
      return true;
    }
    if(preg_match('/^(\/*[A-Za-z0-9]\/*-*)+$/',$this->url)){
      return true;
    }

    return false;
  }


}
 ?>
