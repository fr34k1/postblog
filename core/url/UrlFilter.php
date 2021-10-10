<?php namespace core\url;
defined('DOMAIN');

/**
 *
 */


class UrlFilter
{
  private $url;

  function __construct($uri)
  {
    $this->url = $uri;
  }



  function unsetDomain(){
    $this->url= str_replace(DOMAIN,'',$this->url);
  }

  function deleteFirstSlash(){
    //echo $this->url;
    if(strlen($this->url) >2){
      if($this->url{0} == '/'  ){
        $this->url = substr($this->url,1,-1);
      }
    }

  }

  function addLastSlash(){

    if($this->url != '/' and strlen($this->url) >1){

      $l = strlen($this->url);
      $slash = $this->url{($l-1)};

     if($slash == '/'){
        $this->url=substr($this->url,0,$l-1);
     }
   }


  }

  function getUrl(){
    return $this->url;
  }

  function filterToMatcher(){
    $first = $this->url{0};
    $last = $this->url{strlen($this->url)};
  }
}
 ?>
