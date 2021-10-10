<?php namespace core\database\interfaces;

 /**
 *
 */
interface DBconnectionInterface
{
   function getConnectionString(Config $databaseconfig);
   function getConnection();
}
 ?>
