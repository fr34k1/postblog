<?php namespace app\components\access;


use core\validator\Validator;
use app\components\access\RegisterValidator;

/**
 *
 */
abstract class Access
{

  protected $username;
  //protected $email;
  protected $password;
  private $post;
  //private $validator;
  //private $errors;

  function __construct()
  {



      //print_r($this->errors =$this->validator->getErrors());


  }



  protected function setUsername(){


  }

  protected function setEmail(){

  }


  protected function setPassword(){


  }

  protected function verifyPassowrd(){

  }

  protected function getErrors(){
    return  $this->errors;
  }
}
 ?>
