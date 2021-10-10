<?php namespace core\router;


use core\url\{UrlValidator,UrlFilter,UrlParser};
/**
 *
 */
class Matcher
{
  private $routes;

  private $context;

  private $urlfilterContext;

  private $urlfilterRoute;

  private $index;
  //private $urlValidatorContext;





  function __construct(array $routes,string $context)
  {
    $this->routes = $routes;
    $this->context = $context;

  }

  public  function match(){

    if($this->context == '/'){
      return true;
    }

    $urlContext= new UrlParser($this->context);
    $cntxArray=$urlContext->urlToArray();
    //print_r($cntxArray);

    foreach ($this->routes as $key=> $route) {
      $urlFilterRoute=new UrlFilter($route['url']);
      $urlFilterRoute->addLastSlash();
      $r=$urlFilterRoute->getUrl();

      if($this->hasParams($route['url'])){

          $urlRoute =new UrlParser($r);
          $rtArray=$urlRoute->urlToArray();

          if($this->compareLength($cntxArray,$rtArray)){
            if($cntxArray[0]==$rtArray[0]){

              if(count($rtArray)>1){
                //unset($cntxArray[0]);
                unset($rtArray[0]);
                if(!$this->Matchparams($rtArray,$cntxArray)){
                  continue;
                }else{
                  $this->index = $key;
                  return true;
                }

              }else{
                $this->index = $key;
                return true;
              }

            }else{
              continue;
            }
          }else{
            continue;
          }


      }else{
        //echo "{$route['url']} no tiene parametros<br>";

        if($this->matchNoParams($r,$this->context)){

          $this->index = $key;
          return true;

        }
      }

  }

    return false;
  }

  private function raiz(){

  }

  private function compareLength($a,$b){

    return count($a) == count($b);
  }

  private function Matchparams($rtArray, $cntxArray){

    foreach ($rtArray as $key => $value) {

      if($value{0} == '{'){

        $reg = $this->getExpReg($value);
        if(!preg_match("/$reg/",$cntxArray[$key])){

          return false;
        }
      }else{
        if($value!=$cntxArray[$key]){
          return false;
        }
      }
    }
    return true;
  }

  private function getExpReg($s){
    return str_replace(array('{','}'),'',$s);
  }


  function getIndex(){
    return $this->index;
  }


  function matchNoParams($route,$context){

    if($route==$context){
      return true;
    }

    return  false;
  }

  function hasParams($route){
    if(preg_match('/({+)/',$route)){
      return true;
    }
    return false;
  }
}

 ?>
