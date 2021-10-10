<?php namespace core\router;

defined('DOMAIN');

use core\router\Matcher;
use core\server\Request;
use core\router\route\routes;
use core\url\{UrlValidator,UrlFilter,UrlParser};
/**
 *
 */


class Router
{
  private $controller;
  private $method;
  private $params=[];
  private $routes;


  const REDIRECT_ = DOMAIN.'/';
  const CONTROLLERS_PATH = 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR;
  const NAMESPACE_CONTROLLER = 'app\controllers\\';


  function __construct()
  {
    $context = Request::getUri();
    $routes = new Routes('array');
    $this->routes = $routes->getRoutes();
    $urlfilterContext=new UrlFilter($context);
    $urlfilterContext->unsetDomain();
    $urlValidatorContext = new UrlValidator($context);
    $urlfilterContext->deleteFirstSlash();
    $urlfilterContext->addLastSlash();
    $context = $urlfilterContext->getUrl();

    if($context =='/'){
      header('location: home/');
    }
    if(!$urlValidatorContext->validate()){

      header("location:".self::REDIRECT_);

    }
    $matcher= new Matcher($this->routes,$context);
    if(!$matcher->match()){
      echo "la url especificada no existe";
      exit;
    }

    $index = $matcher->getIndex();
    $this->setController($index);
    $this->setMethod($index);
    $this->setParams($context);
  }


  private function _init(){

  }

  private function setController($index){
    $controller_class = $this->routes[$index]['controller'].'Controller';
    $full_path_controller = self::CONTROLLERS_PATH.ucfirst($controller_class).'.php';

    if(!file_exists($full_path_controller)){
      echo "el controlador no existe";
      exit;
    }
    $namespace_controller = self::NAMESPACE_CONTROLLER.$controller_class;
    $this->controller = new $namespace_controller;


  }

  private function setMethod($index){

    if(method_exists($this->controller,$this->routes[$index]['method'])){
      $this->method = $this->routes[$index]['method'];
    }
    else{
      echo " no existe el metodoen laclase";
      exit;
    }
  }

  private function setParams($context){
    $parser = new UrlParser($context);
    $cntx = $parser->urlToArray();

    if(count($cntx)>1){
      unset($cntx[0]);
      $this->params = array_values($cntx);
    }else{
      $this->params =[];
    }
  }


  public function routing(){

    call_user_func_array([$this->controller,$this->method],$this->params);
  }
}
 ?>
