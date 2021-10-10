<?php namespace core\securator;

/**
 *
 */
class CSRFForms
{

  private $token;

  function __construct()
  {
    $this->generateToken(20);
  }

  function compareTokens(){

    if($this->token == $_SESSION['token']){
      return true;
    }
    return false;
  }

  function generateToken($longitud){

    $this->token bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
  }

  function sessionToken(){

    if(isset($_SESSION)){
      $_SESSION['form_token']=$this->token;
    }else{
      session_regenerate_id(true);
      session_start();
      $_SESSION['form_token']=$this->token;
    }
  }
}
 ?>
