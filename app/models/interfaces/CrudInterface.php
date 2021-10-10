<?php namespace app\models\interfaces;


/**
 *
 */
interface CrudInterface
{
  function insert(array $data);
  function update();
  function delete();
  function select(string $sql,array $binds);
}

 ?>
