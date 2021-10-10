<?php namespace app\components\access\register;

use core\validator\Validator;
use app\models\User;
use app\components\querybuilder\Select;
/**
 *
 */
final class RegisterValidator  extends Validator
{
  private $user;
  private $email;
  private $password;
  private $captcha;
  private $post;

  function __construct($data)
  {
    $this->username=isset($data['username']) ? $data['username'] : '';
    $this->password=isset($data['password']) ? $data['password'] : '';
    $this->email =isset($data['email']) ? $data['email'] : '';
    $this->captcha =isset($data['captcha']) ? $data['captcha'] : '';

    parent::__construct();



  }

  function assignmetUsername(){
    parent::setcustomValidation('user_exists',function($item){
        $users=new User;
        Select::select('user','id')->where('username=:username')->limit(1);
        $row= $users->Select(Select::getQuery(),array('username'=>$item));
        if(is_array($row)){
          return false;
        }else{
          return true;
        }
    },'This user is already taken');

    parent::setAssignment('username',array('empty'=>null,'alphanum'=>null,'length'=>20,'user_exists'=>null));
  }
  function assignmetPassword(){
    parent::setAssignment('password',array('empty'=>null,'minlength'=>6));
  }
  function assignmetEmail(){
    parent::setcustomValidation('email_exists',function($item){
        $users=new User;
        Select::select('user','id')->where('email=:email')->limit(1);
        $row= $users->Select(Select::getQuery(),array('email'=>$item));
        if(is_array($row)){
          return false;
        }else{
          return true;
        }
    },'This email is already taken');

    parent::setAssignment('email',array('empty'=>null,'email'=>null,'email_exists'=>null));
  }

  function assignmetCaptcha(){
    parent::setcustomValidation('captcha',function($item,$match){
      return $item == $match;
    },'The captcha doesnt equal with the image');
    //echo $_SESSION['captcha'];
    parent::setAssignment('captcha',array('empty'=>null,'length'=>6,'alphanum'=>null,'captcha'=>strtolower($_SESSION['captcha'])));
  }

  function validateRegister(){

    $this->assignmetPassword();
    $this->assignmetUsername();
    $this->assignmetEmail();
    $this->assignmetCaptcha();

    parent::validate(array('username'=>$this->username,'email'=>$this->email,'password'=>$this->password,'captcha'=>$this->captcha));
  }



  function getErrors(){

    return $this->messages;

  }




}
 ?>
