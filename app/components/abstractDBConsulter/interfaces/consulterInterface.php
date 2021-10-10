<?php namespace app\components\abstractDBConsulter\interfaces;

/**
 *
 */

interface consulterInterface
{
  // code...

  function SelectQuery(string $sql,array $binds);
  function UpdateQuery();
  function InsertQuery($data);
  function DeleteQuery();
}

 ?>
