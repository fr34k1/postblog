<?php namespace app\components\abstractDBConsulter\posgre;

use app\components\abstractDBConsulter\interfaces\consulterInterface;
/**
 *
 */
class POSGREConsulter implements consulterInterface
{
  private $pdo;

  function __construct()
  {
    $this->pdo=true;
  }

  function InsertQuery(){

  }

  function SelectQuery(){

  }

  function updateQuery(){

  }


  function DeleteQuery(){


  }
}
 ?>
