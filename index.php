<?php

  session_start();
  session_regenerate_id();

  define('PROJECT_PATH',__DIR__ );
  define('APP_NAME','blog');
  define('DOMAIN','/blog');

  require 'core/autoloader/Autoloader.php';
  Autoloader::init(PROJECT_PATH);


  //echo preg_match('/({+)/','asdasd/asdasd/asdasd');
  //$home = new \app\controllers\HomeController;
  //$route = new \core\router\route\NewArrayRoute;
  //$route->new(array());
  //$request = new core\server\Request;
  //$file = 'asd/asdasd/asdasd/Asdasd.php';
  //$pos= strpos($file,'.');
  //echo substr($file,$pos+1);
  // $ini = parse_ini_file('core/router/routes.ini');
  // var_Dump($ini,true);
  //array('uri'=>'home/','controller'=>'home','method'=>'index','params'=>array());

/*
  $l = strlen($url);
  $slash = $url{$l-1};
  if($slash == '/'){
  echo substr($url,0,$l-1,);
}*/


  /*use core\server\Request;
  use core\url\UrlValidator;

  $asd= Request::getUri();

  $v = new UrlValidator($asd);

  try {
      echo $v->validate();
  } catch (\Exception $e) {

    echo $e->getMessage();
    exit;
  }
*/

  /*foreach ($_SERVER as $key => $value) {
    ECHO "$key : $value <br>";
  }*/
  //echo $_SERVER['REQUEST_TIME'];

  //$time = NEW DateTime($_SERVER['REQUEST_TIME']);

  //echo preg_match('/^\/*([A-Za-z0-9]\/*-*)+$/',str_replace(DOMAIN,'',$_SERVER['REQUEST_URI']));
  //$url = "/asdasda/sdasda/";
  //$l = strlen($url);
  use core\App;
  //echo substr($url,0,$l-1).'<br><br>';
  $app=new App();
  $app->start();


 ?>
