<?php namespace app\components\access\register;

//use app\components\access\Access;
use app\components\access\register\RegisterValidator;
use app\components\access\register\Register;
use app\components\access\interfaces\registerInterface;
use app\models\User;
use app\components\querybuilder\Select;
//use app\models\User;
/**
 *
 */


class AppRegister extends register implements registerInterface
{
  private $validator;
  private $errors;
  private $post;
  function __construct($data){
    //print_r($data);
    //parent::__construct($data);
    $this->validator = new RegisterValidator($data);
    $this->validator->validateRegister();
    $this->errors= $this->validator->getErrors() ?? array();
    $this->post = $data;
    //$user = new User;
    //$table = $user->getTable();
    //Select::select($table,'user.username')->where('id=:id')->limit('1');
    //$sql= Select::getQuery();
    //$result=$user->select($sql,array('id'=>1));
    //print_r($result);

  }


  function signUp(){

    if(count($this->errors)>0){
      //return json_encode($this->errors);
      echo json_encode($this->errors);
      exit;
    }

    $users =new User;
    $password = password_hash($this->post['password'],PASSWORD_ARGON2I);
    $users->insert(array('username'=>$this->post['username'],'password'=>$password,'email'=>$this->post['email']));




  }

}
 ?>
