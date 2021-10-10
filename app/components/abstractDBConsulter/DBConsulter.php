<?php namespace app\components\abstractDBConsulter;

use app\components\abstractDBConsulter\interfaces\consulterInterface;

/**
 *
 */


class DBConsulter
{
  private $consulter;

  function __construct(consulterInterface $consulter)
  {
    $this->consulter = $consulter;
  }

  function getConsulterInstance(){
    return $this->consulter;
  }


}
 ?>
