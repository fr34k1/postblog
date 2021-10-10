<?php namespace core\router\route;

use core\router\route\interfaces\NewRouteInterface;
use core\router\route\{Route,ValidateArrayRoutes};

/**
 *
 */

class NewArrayRoute extends Route implements newRouteInterface
{
  //private static $file_path_routes;
  //const FILE_PATH_ROUTES = 'routes.php';


  function __construct(){

  }


  public function new(array $routes){

    $validate = new ValidateArrayRoutes($routes);
    $validate->validate();

    if($validate->validate() ){

      throw new \Exception("Invalid array Route Format");
      exit;
    }

    parent::setRoutes($routes);
  }



}
 ?>
