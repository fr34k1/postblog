<?php namespace core\router\route;

use core\router\route\NewArrayRoute;
/**
 *
 */
class Routes
{
  private $routes;

  function __construct(String $type)
  {

    $this->routes=array();
    switch ($type) {
      case 'array':
        $this->arrayRoutes();
        break;
      case 'ini':
        // code...
        break;
      case 'yml':
        // code...
        break;

      case 'xml':
        // code...
        break;
      default:
        // code...
        break;
    }
  }

  private function arrayRoutes(){
    $route = new NewArrayRoute;
  $rutas = require 'core/router/routes.php';
    $route->new($rutas);
    $this->routes = $route->getRoutes();
  }

  public function getRoutes(){
    return $this->routes;
  }

}
 ?>
