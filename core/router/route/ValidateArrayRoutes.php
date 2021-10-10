<?php namespace core\router\route;

use core\router\route\interfaces\ValidateRoutesInterface;
/**
*
 */
class ValidateArrayRoutes implements ValidateRoutesInterface
{
  private $routes=[];

  function __construct(array $routes)
  {
    $this->routes=$routes;
  }


  function validate(){

      foreach ($this->routes as $route) {

         $this->valRoute($route);
        //echo $route['url'];
      }

  }

  function getRotues(){
    print_r($this->routes);
  }

  private function valRoute(array $route){
    if($this->validateUrl($route)){
      return false;
    }
    if($this->validateController($route)){
      return false;
    }
    if($this->validateMethod($route)){
      return false;
    }

  /*if(!$this->validateParams($route)){

      return false;
    }*/

    return true;
  }


  private function validateUrl(array $route){
    return !array_key_exists('url',$route) && !isset($route['url']);
  }

  private function validateController(array $route){
    return !array_key_exists('controller',$route) && !isset($route['controller']);
  }

  private function validateMethod(array $route){
    return !array_key_exists('method',$route) && !isset($route['method']);
  }

  private function validateParams(array $route){

    if(preg_match('/{/',$route['url']) && count($route['params'])>0){

      $b=[];
      $a = explode('/',$route['url']);
      foreach ($a as $key => $value) {
        if(preg_match('/{/',$value)){
          $b[]=$value;
        }
      }

      return count($b) == count($route['params']);

    }

    return true;
  }
}
 ?>
