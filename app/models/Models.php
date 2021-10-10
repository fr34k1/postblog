<?php namespace app\models;

use app\components\abstractDBConsulter\ConsulterFactory;
use core\database\Database;
/**
 *
 */
class Models
{
  protected $table;
  private $Consulter;


  function __construct($table)
  {
    $this->table = $table;
    $db = Database::Instance();
    $this->consulterInstance = ConsulterFactory::getConsulterInstance($db,$table);


  }

  protected function SelectQuery($sql,$binds){
    return $this->consulterInstance->SelectQuery($sql,$binds);
  }

  protected function InsertQuery($data,$multiple=false){
    echo "Asd";
    //print_r($data);
    //$this->consulterInstance->InsertQuery($data);
    if(!$multiple){
      return $this->consulterInstance->insertOneRow($data);
    }else{
      return $this->consulterInstance->InsertMultipleRows($data);
    }


  }

  protected function UpdateQuery(){

  }


  protected function DeleteQuery(){

  }
}
 ?>
