<?php namespace app\controllers;

use app\controllers\interfaces\AccessInterface;
use core\viewer\Views;
use core\captcha\ImageCaptcha;
use app\components\access\register\RegisterFactory;
use app\components\querybuilder\Select;

/**
 *
 */
class AccessController implements AccessInterface
{

  function __construct()
  {

  }

  function login(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){



    }else{
      $label='';
      $phrase ='';
      $img='';
      $this->setCaptcha($phrase,$img,$label);
      $_SESSON['captcha']=$phrase;

      Views::set('img_captcha',$img);
      Views::set('title','login');
      Views::render('users'.DIRECTORY_SEPARATOR.'access'.DIRECTORY_SEPARATOR.'login');
    }
  }


  function register(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //echo $_SESSION['captcha'];

      if(isset($_POST['reg_method'])){
        RegisterFactory::setPost($_POST);
        $reg_Instance= RegisterFactory::getInstance($_POST['reg_method']);
        $reg_Instance->signUp();
      }

    }else{
      $label='';
      $phrase ='';
      $img='';
      $this->setCaptcha($phrase,$img,$label);
      $_SESSION['captcha']=$phrase;


      Views::set('img_captcha',$img);
      Views::set('title','signUp');
      Views::render('users'.DIRECTORY_SEPARATOR.'access'.DIRECTORY_SEPARATOR.'register');

    }
  }


  function logout(){

  }


  function forgotPassword(){

  }

  function emailVerify(){


  }


  function setCaptcha(&$phrase, &$img, &$label){

      defined('PROJECT_PATH');
      //echo PROJECT_PATH;
      $img_dir = 'core/captcha/img';
      $font = PROJECT_PATH.'/core/captcha/font/FreeSansBold.ttf';

      $captcha = new ImageCaptcha($img_dir,$img_dir,$font);
      $img = $captcha->getImage();
      $phrase = $captcha->getPhrase();
      $label =$captcha->getLabel();
  }
}
 ?>
