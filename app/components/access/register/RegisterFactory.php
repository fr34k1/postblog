<?php namespace app\components\access\register;

use app\components\access\register\AppRegister;
//use app\components\access\RegisterValidator;
//use app\models\User;
/**
 *
 */

class RegisterFactory
{

  private static $instance;
  //private static $reg_method;
  private static $post=[];

  function __construct(){
    //print_r($data);
    //parent::__construct($data);
    //$this->validator = new RegisterValidator($post);
    //$this->validator->validateRegister();
    //$this->errors= $this->validator->getErros();
  }

  public static function setPost(array $post){
    if(is_array($post)){
      self::$post=$post;
    }

  }

  public static function getInstance(string $reg_method){

    switch ($reg_method) {
      case 'app':
        self::$instance = new AppRegister(self::$post);
        break;

      default:
        // code...
        break;
    }

    return self::$instance;
  }

}
 ?>
