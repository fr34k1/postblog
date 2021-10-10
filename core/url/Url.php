<?php namespace core\url;


/**
 *
 */
class Url
{

  private $url;

  function __construct($url)
  {
    $this->url = $url;
  }

  protected getUrl(){
    return $this->url;
  }
}
 ?>
