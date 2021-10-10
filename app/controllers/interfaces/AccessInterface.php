<?php namespace app\controllers\interfaces;
/**
 *
 */
interface AccessInterface
{
  function login();
  function register();
  function logout();
  function forgotPassword();
  function emailVerify();
  
}
 ?>
