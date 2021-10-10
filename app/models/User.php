<?php namespace app\models;

use app\models\interfaces\CrudInterface;
use app\models\Models;

/**
 *
 */
class User extends Models implements CrudInterface
{
  private $username;
  private $password;
  private $email;

  function __construct()
  {
    parent::__construct('user');
  }


  function insert(array $data){

      return  parent::InsertQuery($data);

  }

  function update(){


  }

  function delete(){

  }


  function select($sql,$bind){
    return parent::SelectQuery($sql,$bind);
  }

  function getTable(){
    return $this->table;
  }

}
 ?>
