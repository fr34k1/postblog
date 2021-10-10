<?php namespace core\errors;

/**
 *
 */
class ErrorsLog
{
  private $logErrors;

  function __construct()
  {
    $this->logErrors =array();
    // code...
  }
  
  function newError($msg,$class,$method,$line){

    $this->logErrors[]=array_merge(array('msg'=>$msg,'class'=>$class,'method'=>$method,'line'=>$line));
  }

  function getErrorsLog(){
    return $this->ErrorsLog;
  }

  function __tostring(){

    foreach ($this->logErrors as $key ) {
      echo 'Error: '.$key['msg'].' on the class '.$key['class'].' in line '.$key['line'].'<br>';
    }
  }
}
 ?>
