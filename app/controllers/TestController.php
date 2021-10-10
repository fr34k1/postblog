<?php namespace app\controllers;

use core\viewer\Views;

 /**
 *
 */
use core\database\Database;

class TestController
{

  function __construct()
  {

  }

  function test(){

    $db = Database::instance();

    $sql = $db->prepare("SELECT * FROM  user");
    $sql->execute();

    echo $sql->rowCount();
  }

}
 ?>
