<?php namespace app\controllers;

use core\viewer\Views;
use app\controllers\Controller;
use core\captcha\ImageCaptcha;
use app\models\User;

 /**
 *
 */

class HomeController extends Controller
{

  function __construct()
  {

  }

  function index(){
  /*  defined('PROJECT_PATH');
    echo PROJECT_PATH;
    $img_dir = 'core/captcha/img';
    $font = PROJECT_PATH.'/core/captcha/font/FreeSansBold.ttf';
    $captcha = new ImageCaptcha($img_dir,$img_dir,$font);
    $phrase= $captcha->getPhrase();*/
    Views::set('title','home');
    Views::render('users/home');
      //$mysqlConsulter = new MYSQLConsulter();
      //$consulter = new DBConsulter($mysqlConsulter);
      $users=new User;

      $users->insert(array('username'=>"asdasd",'password'=>'asdasd','email'=>'asdasd@asd.com'));

  }
}
 ?>
