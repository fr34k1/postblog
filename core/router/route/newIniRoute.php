<?php namespace core\router\route;

use core\router\route\interfaces\RouteInterface;
/**
*
*/

final class NewIniRoute implements RouteInterface
{
//private static $file_path_routes;
//const FILE_PATH_ROUTES = 'routes.php';
private  $rotues=[];

function __construct(){

}

public function new(array $route){
$this->routes[]=array_merge($route);
}

public function get(){
  return $this->routes;
}


}
?>
