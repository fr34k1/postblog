<?php namespace app\components\abstractDBConsulter\mysql;

use app\components\abstractDBConsulter\interfaces\{consulterInterface,insertInterface};
use core\database\Database;

/**
 *
 */
class MYSQLConsulter implements consulterInterface, insertInterface
{
  private $pdo;
  private $dbInstance;
  private $table;
  private $sql;
  private $query;


  const DEFAULT_FETCH = \PDO::FETCH_ASSOC;

  function __construct(Database $dbInstance,string $table)
  {
    $this->dbInstance = $dbInstance;
    $this->table = $table;
  }

  function SelectQuery($sql,$binds=array(),$options=array()){


    $sql = $this->dbInstance->prepare($sql);
    $bindsLength = count($binds);
    $resultSet=[];
    if($bindsLength>0){
      $keys = array_keys($binds);
      $values = array_values($binds);

      for ($i=0; $i < $bindsLength ; $i++) {
        $sql->bindParam(':'.$keys[$i],$values[$i]);
      }
    }

    $sql->execute();

    if($sql->rowCount()==1){
      $resultSet[]=$sql->fetch(self::DEFAULT_FETCH);
    }else if($sql->rowCount()>1){
      while ($r= $sql->fetch(self::DEFAULT_FETCH)) {
        $resultSet[]=$r;
      }
    }else{
      $resultSet = 'false';
    }

    return $resultSet;
  }


  function InsertQuery($data,$multiple=false){

    if($multiple){
      $this->InsertMultipleRows($data);
    }else{

      $this->insertOneRow($data);
    }
    //$query = "INSERT INTO {$this->table} ('user','password','email')  VALUES (:user,:password,:email)";
    //$this->sql = $this->dbInstance->prepare($query);

    echo $query;
  }



  function updateQuery(){

  }


  function DeleteQuery(){


  }

  function insertOneRow($data){
    $keys = array_keys($data);
    $values = array_values($data);
    $length = count($keys);
    $sql = 'INSERT INTO '.$this->table.' ('.implode(',',$keys).') VALUES';
    $keys[0]=':'.$keys[0];
    $sql.='('.implode(',:',$keys).')';
    echo $sql;
    $consult =$this->dbInstance->prepare($sql);

    for ($i=0; $i < $length ; $i++) {
      if($i==0){
        $consult->bindParam($keys[$i],$values[$i]);
      }else{
        $consult->bindParam(':'.$keys[$i],$values[$i]);
      }


    }

    if($consult->execute()){
      return true;
    }
    return false;
  }

  function InsertMultipleRows($data){

  }

}
 ?>
