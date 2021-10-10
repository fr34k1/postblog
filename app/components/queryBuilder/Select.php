<?php namespace app\components\querybuilder;


/**
 *
 */
class Select
{
  private static $sql = '';
  private static $instance=null;
  private static $prefix='';
  private static $where=array();
  private static $control=['',''];
  private static $order=[];
  private static $joins=array();

  public function select($table,$cols=null){

    self::$instance = new Select();

    if($cols){
      self::$prefix = 'SELECT '.$cols.' FROM '.$table;
    }else{
      self::$prefix = "SELECT * FROM ".$table;
    }
    return self::$instance;
  }

  public static function where($cond){
    self::$where[0] = ' WHERE '.$cond;
    return self::$instance;
  }

  public static function like($col,$match){

    self::$where[]= trim($col. ' LIKE '.$match);
    return self::$instance;
  }

  public static function and($cond=null){

    self::$where[] = trim(' AND '.$cond);
    return self::$instance;
  }


  public static function or($cond=null){
    self::$where[] = trim(' OR '.$cond);
    return self::$instance;
  }

  public static function in(array $in){
    self::$where[] ='IN ( '.implode(',',$in).' )';
    return self::$instance;
  }

  public static function not($cond=null){
    self::$where[] = trim(' NOT '.$cond);
    return self::$instance;
  }

  public static function limit($limit){
    self::$control[0] = 'LIMIT '.$limit;
    return self::$instance;
  }

  public static function offset($offset){
    self::$control[1] = 'OFFSET '.$offset;
    return self::$instance;
  }

  public static function orderby($cond,$state='ASC'){

    self::$order[0] ='ORDER BY '.$cond.' '.$state;
    return self::$instance;
  }

  public static function innerJoin($table,$on){
    self::$joins[] = " INNER JOIN $table ON $on ";
    return self::$instance;
  }

  public static function leftJoin($table,$on){
    self::$joins[] = " LEFT JOIN $table ON $on ";
    return self::$instance;
  }
  public static function rigthJoin($table,$on){
    self::$joins[] = " RIGTH JOIN $table ON $on ";
    return self::$instance;
  }


  public static function getQuery(){
    self::$sql = self::$prefix.
                implode(' ',self::$joins).
                implode(' ',self::$where).
                ' '.
                self::$control[0].
                ' '.
                self::$control[1];

    preg_replace('/  /',' ',self::$sql);
    return trim(self::$sql);
  }
}



 ?>
