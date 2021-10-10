<?php namespace core\captcha\interfaces;

interface CaptchaInterface{
  public function getLabel();
  public function getImage();
  public function getPhrase();
}

?>
