<?php namespace core\validator;
 /**
 *
 */


abstract class Validator
{

  protected $validator;
  protected $assignmets;
  protected $errors;
  protected $messages;


  function __construct()
  {
    $this->messege=[];
    $this->validator= [
      'empty'=>[
        'callback'=>function($item){return !empty($item);},
        'message'=>'this field cant not be empty'],
      'email' => [
        'callback' => function ($item) {return filter_var($item, FILTER_VALIDATE_EMAIL); },
        'message'  => 'Invalid email address'],

      'alpha' => [
        'callback' => function ($item) {return ctype_alpha(str_replace(' ', '', $item)); },
        'message'  => 'Data contains non-alpha characters'],

      'alphanum' => [
        'callback' => function ($item) {return ctype_alnum(str_replace(' ', '', $item)); },
        'message'  => 'Data contains characters which are '       . 'not letters or numbers'],

      'num' => [
        'callback' => function ($item) {return preg_match('/[^0-9.]/', $item); },
        'message'  => 'Data contains characters which '      . 'are not numbers'],

      'minlength'=>[
        'callback'=>function($item,$length){return strlen($item) >= $length;},
        'message'=>'this field cant not be empty'],

      'length' => [
        'callback' => function ($item, $length) {return strlen($item) <= $length; },
        'message'  => 'Item has too many characters'],

      'upper' => [
        'callback' => function ($item) {return $item == strtoupper($item); },
        'message'  => 'Item is not upper case'],

      'phone' => [
        'callback' => function ($item) {return preg_match('/[^0-9() -+]/', $item); },
        'message'  => 'Item is not a valid phone number'],

      'regex' => [
          'callback' => function ($item,$regex) {return preg_match("/$regex/", $item); },
          'message'  => 'invalid data format'],
       'match' => [
            'callback' => function ($item,$match) {return $item == $match; },
            'message'  => 'invalid data format'],
              
      ];


    $this->filters=array();
  }

  protected function validate($data){
  //  print_r($this->assignmets);
    foreach ($data as $keyitem => $item) {

      //print_r($this->assignmets);
      if(array_key_exists($keyitem ,$this->assignmets)){
        //echo $keyitem.'<br>';
        foreach ($this->assignmets[$keyitem] as $key => $option) {

          $result=$this->validator[$key]['callback']($item,$option);
        //  echo "validando el campo ".$keyitem.' function '.$key.' resutl ' .$result.' <br>';
            if($result==false){
                $this->messages[$keyitem]=$this->validator[$key]['message'];
                break;
            }

        }
      }

    }
  }


   function setAssignment($key, $validations=array()){

    if(is_array($validations)){
      foreach ($validations as $k => $value) {
        if(!array_key_exists($k,$this->validator)){
          throw new \Exception("$k no existe en el arreglo validator", 1);

          return false;
        }
      }
      $this->assignmets[$key]=$validations;
    }
  }


  protected function setcustomValidation($key,$function,$message){

    $this->validator[$key]=array('callback'=>$function,'message'=>$message);
  }

  protected function setCommonValidation($validations){
    if(is_array($validations)){
      foreach ($validations as $k => $value) {
        if(!array_key_exists($k,$this->validator)){
          throw new \Exception("$k is not a valid function", 1);

        }
      }

      $this->assignmets['*']=$validations;
    }
  }

  protected function getValFunctionAllowed(){

    return $this->validator;
  }

  protected function getMessages(){
    return $this->messages;
  }

}
 ?>
