<?php namespace core;

use core\router\Router;
/**
 *
 */
class App
{

  function __construct()
  {
    // code...
  }

  function start(){

    $router = new Router();
    $router->routing();
  }
}
 ?>
