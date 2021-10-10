<?php



  return array(
    array('url'=>'/','controller'=>'home','method'=>'index'),
    array('url'=>'home/','controller'=>'home','method'=>'index'),
    array('url'=>'test','controller'=>'test','method'=>'test'),
    array('url'=>'posts/','controller'=>'post','method'=>'index'),
    array('url'=>'posts/{^([A-Za-z0-9]-*)+$}/{^([A-Za-z0-9]-*)+$}','controller'=>'home','method'=>'index'),
    array('url'=>'access/signUp/','controller'=>'access','method'=>'register'),
    array('url'=>'access/signIn/','controller'=>'access','method'=>'login'),

  );




 ?>
