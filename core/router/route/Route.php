<?php namespace core\router\route;


/**
 *
 */
abstract class Route
{

protected $routes;

  function __construct($routes)
  {
    $this->routes[]=$routes;
  }

  public function getRoutes(){
    return $this->routes;
  }

  protected function setRoutes(array $route){

    $this->routes=array_merge($route);

    
  }

}



 ?>
