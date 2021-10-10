<?php namespace core\url;

use core\url\ValidateUrl;

/**
 *
 */
class UrlParser
{
  private $url;
  private $url_ar;

  function __construct($url)
  {

    $this->url = $url;
  }

  function urlToArray(){
    //echo $this->url;
    if($this->url == '/' && strlen($this->url) == 1){
      return array('/');
    }

    //echo $first = $this->url{0};


    return explode('/',$this->url);
  }



}
 ?>
