<?php namespace core\viewer;


/**
 *
 */
class Views
{
  private static $params=[];

  const VIEWS_PATH = 'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR;


  public static function set($key,$value){
    self::$params[$key]=$value;
  }

  public static function render($view){
    $full_path_view = self::VIEWS_PATH.$view.'.php';
    if(file_exists($full_path_view)){
      ob_start('ob_gzhandler');
      if(count(self::$params)>0) extract(self::$params);
      include $full_path_view;

      $str = ob_get_contents();

      ob_end_clean();

      echo $str;

    }else{

      throw new \Exception("La vista ".$full_path_view ."no existe", 1);

    }

  }
}
 ?>
